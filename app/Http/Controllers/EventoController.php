<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EventoExport;
use Carbon\Carbon;
use App\Evento;
use App\EventoDetails;
use App\Pessoa;

class EventoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $registers = Evento::where([
            'status' => 'Ativo'
        ])->paginate(10);

        return view('eventos.index', compact('registers'));
    }

    public function store(Request $request)
    {
        $register = new Evento;  
        $register->user_id          = Auth::user()->id; 
        $register->name             = $request->name;     
        $register->local            = $request->local;
        $register->data_evento      = $request->data_evento;
        $register->status           = 'Ativo';

        $register->save();

        if ($register->save()) {
            $request->session()->flash('success', 'Evento cadastrado com sucesso!');
        } else {
            $request->session()->flash('error', 'Erro cadastrar o evento');
        }

        return back();
          
    }

    public function show($id)
    {
        $registers = EventoDetails::where([
            'status' => 'Ativo',
            'evento_id' => $id
        ])->paginate(10);

        $pessoas = Pessoa::where([
            'status' => 'Ativo'
        ])->get();

        $evento_id = $id;

        return view('eventos.lancamento', compact('registers','pessoas','evento_id'));
    }

    public function lancar(Request $request)
    {
        $register = new EventoDetails;  
        $register->user_id          = Auth::user()->id;
        $register->evento_id        = $request->evento_id;  
        $register->pessoa_id        = $request->pessoa_id;
        $register->tipo             = $request->tipo;
        $register->status_evento    = $request->status_evento;
        $register->status           = 'Ativo';

        $register->save();

        if ($register->save()) {
            $request->session()->flash('success', 'Evento cadastrado com sucesso!');
        } else {
            $request->session()->flash('error', 'Erro cadastrar o evento');
        }

        return back();
    }

    public function pagar(Request $request, $id)
    {
        $register = EventoDetails::findOrFail($request->id);
        $register->status_evento   = 'Pago';
        $register->save();

        if ($register->save()) {
            $request->session()->flash('success', 'foi pago com sucesso!');
        } else {
            $request->session()->flash('error', 'Erro ao paga conta');
        }

        return back();
    }

    public function inativarLance(Request $request, $id)
    {
        $register = EventoDetails::findOrFail($request->id);
        $register->status    = 'Inativo';
        $register->save();

        if ($register->save()) {
            $request->session()->flash('success', 'A irmã foi removida com sucesso!');
        } else {
            $request->session()->flash('error', 'Erro ao remover a irmã');
        }

        return back();
    }

    public function update(Request $request, $id)
    {
        $update = Evento::findOrFail($request->id);  
        $update->user_id          = Auth::user()->id; 
        $update->name             = $request->name;     
        $update->local            = $request->local;
        $update->data_evento      = $request->data_evento;

        $update->save();

        if ($update->save()) {
            $request->session()->flash('success', 'Evento alterado com sucesso!');
        } else {
            $request->session()->flash('error', 'Erro ao alterar o evento');
        }

        return back();
    }

    public function inativar(Request $request, $id)
    {
        $register = Evento::findOrFail($request->id);
        $register->status    = 'Inativo';
        $register->save();

        if ($register->save()) {
            $request->session()->flash('success', 'Evento apagado com sucesso!');
        } else {
            $request->session()->flash('error', 'Erro ao deletar o evento');
        }

        return back();
    }

    public function export()
    {
        return Excel::download(new EventoExport(), 'RelatorioEvento.xlsx');
    }

    public function pdf(Request $request)
    {
        $geral       = $request->geral;
        $pago        = $request->pago;
        $apagar      = $request->apagar;
        
        $gerals = EventoDetails::where([
            'status' => 'Ativo',
            'evento_id' => $request->evento_id
        ])->get();

        $countRegister = EventoDetails::where([
            'status' => 'Ativo',
            'evento_id' => $request->evento_id
        ])->count();

        $pagos = EventoDetails::where([
            'status' => 'Ativo',
            'status_evento' => 'Pago',
            'evento_id' => $request->evento_id
        ])->get();

        $countPago = EventoDetails::where([
            'status' => 'Ativo',
            'status_evento' => 'Pago',
            'evento_id' => $request->evento_id
        ])->count();

        $apagars = EventoDetails::where([
            'status' => 'Ativo',
            'status_evento' => 'á Pagar',
            'evento_id' => $request->evento_id
        ])->get();

        $countApagars = EventoDetails::where([
            'status' => 'Ativo',
            'status_evento' => 'á Pagar',
            'evento_id' => $request->evento_id
        ])->count();        
       
        
        if ($geral)
        {
            return \PDF::loadView('eventos.reports.geral', compact('gerals','countRegister'))
                        // Se quiser que fique no formato a4 retrato: 
                            ->setPaper('A4', 'portrait')
                            ->stream('RelatorioEventoGeral.pdf');
                    // ->download('RelatorioEvento.pdf');
        } elseif ($pago) {
            return \PDF::loadView('eventos.reports.pago', compact('pagos','countPago'))
                        // Se quiser que fique no formato a4 retrato: 
                            ->setPaper('A4', 'portrait')
                            ->stream('RelatorioEventoPago.pdf');
                    // ->download('RelatorioEvento.pdf');
        } else {
            return \PDF::loadView('eventos.reports.apagar', compact('apagars','countApagars'))
                        // Se quiser que fique no formato a4 retrato: 
                            ->setPaper('A4', 'portrait')
                            ->stream('RelatorioEventoAPagar.pdf');
                    // ->download('RelatorioEvento.pdf');
        }
            
    }
}
