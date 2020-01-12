<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log;
use App\Pessoa;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $logs = Log::orderBy('created_at', 'desc')->paginate(3);

        $aniversarios = Pessoa::where([
            'status' => 'Ativo'
        ])->whereMonth('data_nascimento', '=', date('m'))->orderBy('name', 'asc')->get();
        
        $totalIrmas = Pessoa::where([
            'status' => 'Ativo'
        ])->count();

        return view('home', compact('logs','aniversarios','totalIrmas'));
    }
}
