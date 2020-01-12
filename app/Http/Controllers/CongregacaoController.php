<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Congregacao;
use App\Log;
use App\Pessoa;

class CongregacaoController extends Controller
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
        
        $registers = Congregacao::where([
            'status' => 'Ativo'
        ])->paginate(10);
        
        return view('congregacoes.index', compact('registers','logs','aniversarios'));
    }

    public function store(Request $request)
    {
        $register = new Congregacao;  
        $register->user_id          = Auth::user()->id;
        $register->name             = $request->name;
        $register->status           = 'Ativo';

        $register->save();

        $register = new Log;  
        $register->user_id          = Auth::user()->id;
        $register->acao             = 'Cadastro';
        $register->descricao        = 'criou o cadastro de ' .$request->name;

        $register->save();

        if ($register->save()) {
            $request->session()->flash('success', 'Congregação cadastrada com sucesso!');
        } else {
            $request->session()->flash('error', 'Erro cadastrar a congregação');
        }

        return back();
    }

    public function update(Request $request, $id)
    {
        $update = Congregacao::findOrFail($request->id);  
        $update->user_id          = Auth::user()->id;      
        $update->name             = $request->name;
        $update->save();

        $register = new Log;  
        $register->user_id          = Auth::user()->id;
        $register->acao             = 'Editar';
        $register->descricao        = 'mudou o cadastro para ' .$request->name;

        $register->save();

        if ($update->save()) {
            $request->session()->flash('success', 'Congregação alterada com sucesso!');
        } else {
            $request->session()->flash('error', 'Erro ao editar a congregação');
        }

        return back();
    }

    public function inativar(Request $request, $id)
    {
        $register = Congregacao::findOrFail($request->id);
        $register->status    = 'Inativo';
        $register->save();

        $register = new Log;  
        $register->user_id          = Auth::user()->id;
        $register->acao             = 'Deletar';
        $register->descricao        = 'apagou um registro';

        $register->save();

        if ($register->save()) {
            $request->session()->flash('success', 'Congregação deletada com sucesso!');
        } else {
            $request->session()->flash('error', 'Erro ao deletar a congregação');
        }

        return back();
    }
}
