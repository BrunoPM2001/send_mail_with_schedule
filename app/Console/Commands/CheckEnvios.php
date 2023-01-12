<?php

namespace App\Console\Commands;


use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CheckEnvios extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:enviocorreos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Revisión de correos pendientes y envío de pendientes';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //  Revisar la tabla de future_mails y obtener el correo de otra tabla usando joins
        $mails = DB::table('future_mails')
            ->where('estado_envio', '=', 0)
            ->join('clients', 'future_mails.client_id', '=', 'clients.id')
            ->select('future_mails.id', 'clients.correo', 'future_mails.asunto', 'future_mails.contenido', 'future_mails.fecha_envio')
            ->get();
        
        //  Para todos los correos no enviados
        foreach ($mails as $mail) {
            if ($mail->fecha_envio <= date('Y-m-d') && $mail->hora_envio <= date('H:i:s')) {
                //Mail::to($mail->correo)->send(new EnviarDespuesMailable($mail->asunto, $mail->contenido)); 
                Storage::append("registro.txt", "Correo enviado a " . $mail->correo . " con el asunto de " . $mail->asunto);
            } else {
                Storage::append("registro.txt", "No coincide la fecha del correo" . $mail->id);
            }
        }
    }
}
