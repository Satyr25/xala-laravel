<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index(){
        return view('home.index');
    }

    public function nosotros(){
        return view('home.nosotros');
    }

    public function contacto(){
        return view ('home.contacto');
    }

    public function privacidad(){
        return view('home.privacidad');
    }
    public function donativos(){
        $years = array();
        for($i = date('Y'); $i > 1920; $i--){
            $years[$i] = $i;
        }

        $months = array();
        $months['01'] = 'Enero'; 
        $months['02'] = 'Febrero'; 
        $months['03'] = 'Marzo'; 
        $months['04'] = 'Abril'; 
        $months['05'] = 'Mayo'; 
        $months['06'] = 'Junio'; 
        $months['07'] = 'Julio'; 
        $months['08'] = 'Agosto'; 
        $months['09'] = 'Septiembre'; 
        $months['10'] = 'Octubre'; 
        $months['11'] = 'Noviembre'; 
        $months['12'] = 'Diciembre'; 
        
        $days = array();
        for($i = 1; $i < 31; $i++){
            $days[$i] = $i;
        }

        return view('home.donar', [
            'years' => $years,
            'months' => $months,
            'days' => $days
        ]);
    }

    public function sendEmail(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'comments' => 'required',
        ]);

        Mail::to($request->email)->send(new SendMail($request));
        if(Mail::failures()){
            return redirect()->route('home.contacto')->with('error', 'No fue posible enviar el correo.');
        }
        return redirect()->route('home.contacto')->with('success', 'Su correo se ha enviado correctamente.');
    }

}
