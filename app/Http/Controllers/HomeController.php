<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pessoa;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {           
        $totalIrmas = Pessoa::where([
            'status' => 'Ativo'
        ])->count();

        return view('home', compact('totalIrmas'));
    }
}
