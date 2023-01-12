<?php

namespace App\Console\Commands;

use App\Mail\EnviarDespuesMailable;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
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
        Mail::to("sample@gmail.com")->send(new EnviarDespuesMailable("Envío automático", "Asunto cualquiera"));
        $data = "Correo enviado en la fecha de ". date("Y-m-d H:i:s");
        Storage::append("registro.txt", $data);
    }
}
