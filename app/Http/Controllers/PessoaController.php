<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use App\Exports\PessoaExport;
use App\Pessoa;
use App\Congregacao;

class PessoaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $congregacoes = Congregacao::where([
            'status' => 'Ativo'
        ])->get();

        if ($request->search == ""){
            $registers = Pessoa::where([
                'status' => 'Ativo'
            ])->orderBy('name', 'asc')->paginate(10);            
            return view('pessoas.index',compact('registers','congregacoes'));
        }else{
            $registers = Pessoa::where(['status' => 'Ativo'])
            ->where('name', 'LIKE', '%' .$request->search . '%')
            ->orderBy('name', 'asc')->paginate(10);
            $registers->appends($request->only('pessoas.index'));
            return view('pessoas.index',compact('registers','congregacoes'));
        }
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
        if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('app-assets/images/uploads/pessoas/' . $filename ) );

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
            $register->avatar           = $filename;
            $register->status           = 'Ativo';

            $register->save();

            if ($register->save()) {
                $request->session()->flash('success', 'Irmã cadastrada com sucesso!');
            } else {
                $request->session()->flash('error', 'Erro cadastrar a irmã');
            }
    	}else{
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

    public function editar($id)
    {
        $congregacoes = Congregacao::where([
            'status' => 'Ativo'
        ])->get();

        $registers = Pessoa::where([
            'status' => 'Ativo',
            'id' => $id
        ])->get();
        
        return view('pessoas.edit', compact('congregacoes','registers'));
    }

    public function edit(Request $request, $id)
    {
        if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('app-assets/images/uploads/pessoas/' . $filename ) );

    		$register = Pessoa::findOrFail($request->id);  
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
            $register->avatar           = $filename;
            $register->status           = 'Ativo';

            $register->save();

            if ($register->save()) {
                $request->session()->flash('success', 'Irmã alterada com sucesso!');
            } else {
                $request->session()->flash('error', 'Erro alterar o cadastro da irmã');
            }
    	}else{
            $register = Pessoa::findOrFail($request->id);  
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
                $request->session()->flash('success', 'Irmã alterada com sucesso!');
            } else {
                $request->session()->flash('error', 'Erro alterar o cadastro da irmã');
            }
        }


        return redirect()->route('irmas.index');
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
