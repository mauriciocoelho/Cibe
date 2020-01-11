<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PessoaExport;
use App\Pessoa;
use App\Congregacao;

class PessoaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $registers = Pessoa::where([
            'status' => 'Ativo'
        ])->paginate(10);

        $congregacoes = Congregacao::where([
            'status' => 'Ativo'
        ])->get();
        
        return view('pessoas.index', compact('registers','congregacoes'));
    }

    public function create()
    {
        $congregacoes = Congregacao::where([
            'status' => 'Ativo'
        ])->get();
        
        return view('pessoas.form', compact('congregacoes'));
    }

    public function store(Request $request)
    {
        
        // Define o valor default para a variável que contém o nome da imagem 
        $nameFile = null;
 
        // Verifica se informou o arquivo e se é válido
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            
            // Define um aleatório para o arquivo baseado no timestamps atual
            $name = uniqid(date('HisYmd'));
    
            // Recupera a extensão do arquivo
            $extension = $request->avatar->extension();
    
            // Define finalmente o nome
            $nameFile = "{$name}.{$extension}";
    
            // Faz o upload:
            $upload = $request->avatar->storeAs('public/pessoas', $nameFile);
            // Se tiver funcionado o arquivo foi armazenado em storage/app/public/pessoas/nomedinamicoarquivo.extensao
    
            $register = new Pessoa;  
            $register->user_id          = Auth::user()->id; 
            $register->congregacao_id   = $request->congregacao_id;     
            $register->name             = $request->name;
            $register->cpf              = $request->cpf;
            $register->rg               = $request->rg;
            $register->matricula        = $request->matricula;
            $register->logradouro       = $request->logradouro;     
            $register->numero           = $request->numero;
            $register->bairro           = $request->bairro;
            $register->cidade           = $request->cidade;
            $register->uf               = $request->uf;
            $register->cep              = $request->cep;
            $register->email            = $request->email;     
            $register->fone             = $request->fone;
            $register->celular          = $request->celular;
            $register->data_nascimento  = $request->data_nascimento;
            $register->situacao         = $request->situacao;
            $register->avatar           = $nameFile;
            $register->status           = 'Ativo';

            $register->save();

            if ($register->save()) {
                $request->session()->flash('success', 'Irmã cadastrada com sucesso!');
            } else {
                $request->session()->flash('error', 'Erro cadastrar a irmã');
            }
    
        } else {
            $register = new Pessoa;  
            $register->user_id          = Auth::user()->id; 
            $register->congregacao_id   = $request->congregacao_id;     
            $register->name             = $request->name;
            $register->cpf              = $request->cpf;
            $register->rg               = $request->rg;
            $register->matricula        = $request->matricula;
            $register->logradouro       = $request->logradouro;     
            $register->numero           = $request->numero;
            $register->bairro           = $request->bairro;
            $register->cidade           = $request->cidade;
            $register->uf               = $request->uf;
            $register->cep              = $request->cep;
            $register->email            = $request->email;     
            $register->fone             = $request->fone;
            $register->celular          = $request->celular;
            $register->data_nascimento  = $request->data_nascimento;
            $register->situacao         = $request->situacao;
            $register->status           = 'Ativo';

            $register->save();

            if ($register->save()) {
                $request->session()->flash('success', 'Irmã cadastrada com sucesso!');
            } else {
                $request->session()->flash('error', 'Erro cadastrar a irmã');
            }
        }

        return redirect()->route('irmas.index');
    }

    public function edit($id)
    {
        $congregacoes = Congregacao::where([
            'status' => 'Ativo'
        ])->get();

        $registers = Pessoa::where([
            'status' => 'Ativo'
        ])->get();
        
        return view('pessoas.edit', compact('congregacoes','registers'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function inativar(Request $request, $id)
    {
        $register = Pessoa::findOrFail($request->id);
        $register->status    = 'Inativo';
        $register->save();

        if ($register->save()) {
            $request->session()->flash('success', 'A Irmã deletada com sucesso!');
        } else {
            $request->session()->flash('error', 'Erro ao deletar a irmã');
        }

        return back();
    }

    public function export()
    {
        return Excel::download(new PessoaExport(), 'ListaIrmas.xlsx');
    }

    public function pdf(Request $request)
    {
        $geral       = $request->geral;
        $aniversario = $request->aniversario;
        $congregacao = $request->congregacao;
        
        $gerals = Pessoa::where([
            'status' => 'Ativo'
        ])->orderBy('name', 'asc')->get();

        $aniversarios = Pessoa::where([
            'status' => 'Ativo'
        ])->whereMonth('data_nascimento', '=', date('m'))->orderBy('name', 'asc')->get();

        $congregacoes = Pessoa::where([
            'status' => 'Ativo',
            'congregacao_id' => $request->congregacao_id
        ])->orderBy('name', 'asc')->get();

        $countCongregacoes = Pessoa::where([
            'status' => 'Ativo',
            'congregacao_id' => $request->congregacao_id
        ])->count();

        $countRegister = Pessoa::where([
            'status' => 'Ativo'
        ])->count();
        
        if ($geral)
        {
            return \PDF::loadView('pessoas.reports.geral', compact('gerals','countRegister'))
                        // Se quiser que fique no formato a4 retrato: 
                            ->setPaper('A4', 'portrait')
                            ->stream('ListaIrmasGeral.pdf');
                    // ->download('ListaIrmas.pdf');
        } elseif ($aniversario) {
            return \PDF::loadView('pessoas.reports.aniversario', compact('aniversarios','countRegister'))
                        // Se quiser que fique no formato a4 retrato: 
                            ->setPaper('A4', 'portrait')
                            ->stream('ListaIrmasAniversario.pdf');
                    // ->download('ListaIrmas.pdf');
        } else {
            return \PDF::loadView('pessoas.reports.congregacao', compact('congregacoes','countCongregacoes'))
                        // Se quiser que fique no formato a4 retrato: 
                            ->setPaper('A4', 'portrait')
                            ->stream('ListaIrmasCongregacao.pdf');
                    // ->download('ListaIrmas.pdf');
        }
            
    }

    public function cadastropdf(Request $request, $id)
    {
        $registers = Pessoa::where([
            'id' => $id
        ])->get();

        return \PDF::loadView('pessoas.reports.cadastro', compact('registers'))
                        // Se quiser que fique no formato a4 retrato: 
                            ->setPaper('A4', 'portrait')
                            ->stream('CadastroIrma.pdf');
    }
}
