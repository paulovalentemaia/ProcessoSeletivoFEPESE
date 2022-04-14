<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    public function index(){
        $estados = Estado::get();

        return view('estado.index', ['estados' => $estados]);
    }
}
