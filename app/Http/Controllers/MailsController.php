<?php

namespace App\Http\Controllers;

use App\Mail\EnviarDespuesMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailsController extends Controller
{
    public function sendMails(Request $request)
    {
        $correos = $request->correos;
        $asunto = $request->asunto;
        $contenido = $request->contenido;

        foreach ($correos as $correo){
            Mail::to($correo)->send(new EnviarDespuesMailable($asunto, $contenido));
            print_r("Un mensaje enviado correctamente");
        }
    }
}
