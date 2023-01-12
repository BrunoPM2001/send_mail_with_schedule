<?php

namespace App\Http\Controllers;

use App\Mail\EnviarDespuesMailable;
use App\Models\FutureMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailsController extends Controller
{
    public function sendMails(Request $request)
    {
        if ($request->fecha == null) {
            //  Cuando se hace el envío al instante
            $correos = $request->correos;
            $asunto = $request->asunto;
            $contenido = $request->contenido;
    
            foreach ($correos as $correo){
                Mail::to($correo)->send(new EnviarDespuesMailable($asunto, $contenido));
                print_r("Un mensaje enviado correctamente");
            }
            
        } else {
            //  Cuando se programa el envío
            $ids = array_keys($request->correos);
            $asunto = $request->asuntoF;
            $contenido = $request->contenidoF;
            $fecha = $request->fecha;
        
            foreach ($ids as $id){
                $futureMail = new FutureMail;
                $futureMail->client_id = $id;
                $futureMail->asunto = $asunto;
                $futureMail->contenido = $contenido;
                $futureMail->fecha_envio = $fecha;
                $futureMail->save();
                print_r("Un mensaje programado correctamente");
            }
        }
    }
}
