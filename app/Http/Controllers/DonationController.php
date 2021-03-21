<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Exception;
use DateTime;
use DateInterval;
use PayPal\Api\Agreement;
use PayPal\Api\Amount;
use PayPal\Api\Currency;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\MerchantPreferences;
use PayPal\Api\Patch;
use PayPal\Api\PatchRequest;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentDefinition;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Plan;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Common\PayPalModel;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;
use App\Models\Donation;

class DonationController extends Controller
{
    private $apiContext;
    private $paypalConfig;
    
    public $approvalUrl;
    public $error;

    public $amount;
    public $amountType;
    public $project;
    public $isInOtherName;
    public $dedicationType;
    public $dedicationFirstName;
    public $dedicationLastName;
    public $receiverEmail;
    public $receiverFirstName;
    public $receiverLastName;
    public $firstName;
    public $lastName;
    public $email;
    public $phone;
    public $gender;
    public $birthday;
    public $birthday_year;
    public $birthday_month;
    public $birthday_day;
    public $isAnonymous;
    public $canBeContacted;
    public function __construct(){

        $this->paypalConfig = Config::get('paypal');
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                $this->paypalConfig['client_id'],
                $this->paypalConfig['secret'],
            )
        );
        $this->apiContext->setConfig([
            'mode' => $this->paypalConfig['mode']
        ]);
    }



    public function donacion(Request $request){

        $request->validate([
            'firstName' => 'string',
            'lastName' => 'string',
            'email' => 'required|email',
            'phone' => 'string',
            'gender' => 'string',
            'birthday_day' => 'string',
            'birthday_month' => 'string',
            'birthday_year' => 'string',
            'canBeContacted' => 'boolean',
            'amountType' => 'required',
            'amount' => 'required|integer',
            'project' => 'required|string',
            'dedicationType' => 'required_if:isInOtherName,1',
            'dedicationFirstName' => 'required_if:isInOtherName,1',
            'dedicationLastName' => 'required_if:isInOtherName,1',
            'receiverEmail' => 'sometimes|nullable|required_if:isInOtherName,1|email',
            'receiverFirstName' => 'required_if:isInOtherName,1',
            'receiverLastName' => 'required_if:isInOtherName,1',
            'isAnonymous' => 'boolean',
        ]);

        $this->amount = $request->amount;
        $this->amountType = $request->amountType;
        $this->project = $request->project;
        $this->isInOtherName = $request->isInOtherName;
        $this->dedicationType = $request->dedicationType;
        $this->dedicationFirstName = $request->dedicationFirstName;
        $this->dedicationLastName = $request->dedicationLastName;
        $this->receiverEmail = $request->receiverEmail;
        $this->receiverFirstName = $request->receiverFirstName;
        $this->receiverLastName = $request->receiverLastName;
        $this->firstName = $request->firstName;
        $this->lastName = $request->lastName;
        $this->email= $request->email;
        $this->phone = $request->phone;
        $this->gender = $request->gender;
        $this->birthday = $request->birthday_year.'-'.$request->birthday_month.'-'.$request->birthday_day;
        $this->isAnonymous = $request->isAnonymous;
        $this->canBeContacted = $request->canBeContacted;


        if ($this->donate()) {
            return redirect()->to($this->approvalUrl);
        } else {
            return redirect()->route('home.donativos')->with('error', 'No fue posible realizar la donación.');
        }
    }

    public function donate() {
        switch ($this->amountType) {
            case 'U':
                $this->uniqueDonation();
                break;
            case 'M':
                $this->periodicDonation('MONTH');
                break;
            case 'A':
                $this->periodicDonation('YEAR');
                break;
        }
        if ($this->approvalUrl) {
            return true;
        } else {
            return false;
        }
    }
    
    public function executePayment($paymentId, $payerId, $token) {
        if (isset($token)) {
            $this->executePeriodic($token);
        } else if (isset($paymentId) && isset($payerId)) {
            $this->executeUnique($paymentId, $payerId);
        }
    }

    private function executePeriodic($token) {
        $agreementObj = new Agreement();
        try {
            $result = $agreementObj->execute($token, $this->apiContext);
            $donationObj = Donation::find()->where(['donationId' => $result->getId()])->one();
            $donationObj->donationStatus = $donationObj::STATUS_CONFIRMED;
            $donationObj->update();
        } catch (PayPalConnectionException $ex) {
            $this->error = $ex->getCode() . ' - ' . $ex->getData();
        } catch (Exception $ex) {
            $this->error = $ex->getCode() . ' - ' . $ex->getMessage();
        }
    }

    private function executeUnique($paymentId, $payerId) {
        $paymentObj = Payment::get($paymentId, $this->apiContext);
        $executionObj = new PaymentExecution();
        $executionObj->setPayerId($payerId);
        try {
            $result = $paymentObj->execute($executionObj, $this->apiContext);
            $donationObj = Donation::find()->where(['donationId' => $result->getId()])->one();
            $donationObj->donationStatus = $donationObj::STATUS_CONFIRMED;
            $donationObj->update();
        } catch (PayPalConnectionException $ex) {
            $this->error = $ex->getCode() . ' - ' . $ex->getData();
        } catch (Exception $ex) {
            $this->error = $ex->getCode() . ' - ' . $ex->getMessage();
        }
    }

    private function uniqueDonation() {
        $payer = $this->buildPayer();
        $amount = $this->buildAmount($this->getCurrency(), $this->amount);
        $transaction = $this->buildTransaction($amount);
        $redirectUrls = $this->buildRedirectUrls(route('donaciones.confirmed'), route('donaciones.cancelled'));
        $payment = $this->buildPayment($payer, $transaction, $redirectUrls);
        try {
            $payment->create($this->apiContext);
            $this->approvalUrl = $payment->getApprovalLink();
            $parts = parse_url($this->approvalUrl);
            parse_str($parts['query'], $query);
            $this->saveInfoToDB($query['token']);
        } catch (PayPalConnectionException $ex) {
            $this->error = $ex->getCode() . ' - ' . $ex->getData();
        } catch (Exception $ex) {
            $this->error = $ex->getCode() . ' - ' . $ex->getMessage();
        }
    }

    private function periodicDonation($donationFrequency) {
        $plan = $this->buildPlan();
        $paymentDefinition = $this->buildPaymentDefinition($donationFrequency, $this->amount, $this->getCurrency());
        $merchantPreferences = $this->buildMerchantPreferences(route('donaciones.confirmed'), route('donaciones.cancelled'), $this->getCurrency());
        $plan->setPaymentDefinitions([$paymentDefinition]);
        $plan->setMerchantPreferences($merchantPreferences);
        try {
            $createdPlan = $plan->create($this->apiContext);
            try {
                $plan = $this->activatePlan($createdPlan);
                $agreement = $this->createBillingAgreement($plan);
                try {
                    $agreement = $agreement->create($this->apiContext);
                    $this->approvalUrl = $agreement->getApprovalLink();
                    $parts = parse_url($this->approvalUrl);
                    parse_str($parts['query'], $query);
                    $this->saveInfoToDB($query['token']);
                } catch (PayPalConnectionException $ex) {
                    $this->error = $ex->getCode() . ' - ' . $ex->getData();
                } catch (Exception $ex) {
                    $this->error = $ex->getCode() . ' - ' .$ex->getMessage();
                    var_dump($ex->getMessage());exit;
                }
            } catch (PayPalConnectionException $ex) {
                $this->error = $ex->getCode() . ' - ' . $ex->getData();
            } catch (Exception $ex) {
                $this->error = $ex->getCode() . ' - ' . $ex->getMessage();
            }
        } catch (PayPalConnectionException $ex) {
            $this->error = $ex->getCode() . ' - ' . $ex->getData();
        } catch (Exception $ex) {
            $this->error = $ex->getCode() . ' - ' . $ex->getMessage();
        }
    }

    private function buildPayer() {
        $payerObj = new Payer();
        $payerObj->setPaymentMethod('paypal');
        return $payerObj;
    }

    private function buildAmount($currency, $amount) {
        $amountObj = new Amount();
        $amountObj->setTotal((float) $amount)
            ->setCurrency($currency);
        return $amountObj;
    }

    private function buildTransaction($amount) {
        $transactionObj = new Transaction();
        $transactionObj->setAmount($amount)
            ->setDescription('Donation to Xala-Laravel')
            ->setItemList($this->buildItemList($amount));
        return $transactionObj;
    }

    private function buildItemList() {
        $itemObj = new Item();
        $itemObj->setName('Donacion')
            ->setQuantity('1')
            ->setPrice((float) $this->amount)
            ->setCurrency($this->getCurrency());
        $itemListObj = new ItemList();
        $itemListObj->setItems([$itemObj]);
        return $itemListObj;
    }

    private function buildRedirectUrls($return_url, $cancel_url) {
        $redirectUrlsObj = new RedirectUrls();
        $redirectUrlsObj->setReturnUrl($return_url)
            ->setCancelUrl($cancel_url);
        return $redirectUrlsObj;
    }

    private function buildPayment($payer, $transaction, $redirectUrls) {
        $paymentObj = new Payment();
        $paymentObj->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions([$transaction])
            ->setRedirectUrls($redirectUrls);
        return $paymentObj;
    }

    private function buildPlan($id = null) {
        if ($id) {
            $planObj = new Plan();
            $planObj->setId($id);
        } else {
            $planObj = new Plan();
            $planObj->setName('Xala-Laravel')
                ->setDescription('Donacion Periodica')
                ->setType('infinite');
        }
        return $planObj;
    }

    private function buildPaymentDefinition($frequency, $amount, $currency) {
        $paymentDefinitionObj = new PaymentDefinition();
        $paymentDefinitionObj->setName("Donacion")
            ->setType('REGULAR')
            ->setFrequency($frequency)
            ->setFrequencyInterval('1')
            ->setCycles('0')
            ->setAmount(new Currency(['value' => (float) $amount, 'currency' => $currency]));
         return $paymentDefinitionObj;
    }

    private function buildMerchantPreferences($return_url, $cancel_url, $currency) {
        $merchantPreferencesObj = new MerchantPreferences();
        $merchantPreferencesObj->setReturnUrl($return_url)
            ->setCancelUrl($cancel_url)
            ->setAutoBillAmount('yes')
            ->setInitialFailAmountAction('CONTINUE')
            ->setMaxFailAttempts('3')
            ->setSetupFee(new Currency(['value' => $currency == "USD" ? '1' : '20', 'currency' => $currency]));
        return $merchantPreferencesObj;
    }

    private function buildAgreement() {
        $agreementObj = new Agreement();
        $currentTime = new DateTime();
        $currentTime->add(new DateInterval('P1D'));
        $agreementObj->setName('Donacion Xala-Laravel')
            ->setDescription('Donacion periodica a Xala-Laravel')
            ->setStartDate(date_format($currentTime, DATE_ATOM));
        return $agreementObj;
    }

    private function activatePlan($createdPlan) {
        $patch = new Patch();
        $value = new PayPalModel('{"state":"ACTIVE"}');
        $patch->setOp('replace')
            ->setPath('/')
            ->setValue($value);
        $patchRequest = new PatchRequest();
        $patchRequest->addPatch($patch);
        $createdPlan->update($patchRequest, $this->apiContext);
        $plan = Plan::get($createdPlan->getId(), $this->apiContext);
        return $plan;
    }

    private function createBillingAgreement($plan) {
        $agreementObj = $this->buildAgreement();
        $payerObj = $this->buildPayer();
        $planObj = $this->buildPlan($plan->getId());
        $agreementObj->setPlan($planObj);
        $agreementObj->setPayer($payerObj);
        return $agreementObj;
    }

    private function getCurrency() {
        return "MXN";
    }

    private function saveInfoToDB($donationId) {

        $donation = new Donation();
        if (!$this->isAnonymous) {
            $donation->firstName = $this->firstName;
            $donation->lastName = $this->lastName;
            $donation->phone = $this->phone;
            $donation->gender = $this->gender;
            $donation->birthday = $this->birthday;
        }
        if ($this->isInOtherName) {
            $donation->isDedication = 1;
            $donation->dedicationType = $this->dedicationType;
            $donation->dedicationFirstName = $this->dedicationFirstName;
            $donation->dedicationLastName = $this->dedicationLastName;
            $donation->receiverEmail = $this->receiverEmail;
            $donation->receiverFirstName = $this->receiverFirstName;
            $donation->receiverLastName = $this->receiverLastName;
        } else {
            $donation->isDedication = 0;
        }
        $donation->donationType = $this->amountType;
        $donation->donationAmount = $this->amount;
        $donation->donationCurrency = $this->getCurrency();
        switch ($this->project) {
            case 'E':
                $donation->donationProject = 'E';
                break;
            case 'A':
                $donation->donationProject = 'A';
                break;
            case 'I':
                $donation->donationProject = 'I';
                break;
        }
        $donation->email = $this->email;
        $donation->canBeContacted = $this->canBeContacted;
        $donation->donationId = $donationId;
        $donation->donationStatus = 'PENDING';
        if (!$donation->save()) {
            throw new Exception('Error al guardar los datos', 1);
        }
    }

    public function confirmed(Request $request){
        $donation = Donation::where('donationId', $request->token)->first();
        return view('donations.confirmed', [
            'donation' => $donation,
        ]);
    }

    public function cancelled(){
        return view('donations.cancelled');
    }
}
