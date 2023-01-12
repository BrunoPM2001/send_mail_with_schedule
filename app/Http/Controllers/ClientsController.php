<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function getAllClients()
    {
        $clientes = Client::all();
        return view('sample', ['clientes' => $clientes]);
    }
}
