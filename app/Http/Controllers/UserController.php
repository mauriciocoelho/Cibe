<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Log;
use App\Pessoa;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $registers = User::where([
            'status' => 'Ativo'
        ])->paginate(10);

        return view('users.index', compact('registers'));
    }
    
    public function create()
    {
        $logs = Log::orderBy('created_at', 'desc')->paginate(3);

        $aniversarios = Pessoa::where([
            'status' => 'Ativo'
        ])->whereMonth('data_nascimento', '=', date('m'))->orderBy('name', 'asc')->get();

        return view('users.register',compact('logs','aniversarios'));
    }    

    public function store(Request $request)
    {
        if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('app-assets/images/uploads/users/' . $filename ) );
    
            $register = new User;    
            $register->name             = $request->name;
            $register->email            = $request->email;
            $register->password         = Hash::make($request->password);
            $register->avatar           = $nameFile;
            $register->status           = 'Ativo';

            $register->save();

            if ($register->save()) {
                $request->session()->flash('success', 'Usuário cadastrado com sucesso!');
            } else {
                $request->session()->flash('error', 'Erro cadastrar o usuário');
            }
    
        } else {
            $register = new User;    
            $register->name             = $request->name;
            $register->email            = $request->email;
            $register->password         = Hash::make($request->password);
            $register->status           = 'Ativo';

            $register->save();

            if ($register->save()) {
                $request->session()->flash('success', 'Usuário cadastrado com sucesso!');
            } else {
                $request->session()->flash('error', 'Erro cadastrar o usuário');
            }
        }

        return redirect()->route('usuarios.index');
    }

    public function editar($id)
    {
        $registers = User::where([
            'status' => 'Ativo',
            'id' => $id
        ])->get();
        
        return view('users.edit', compact('registers'));
    }

    public function edit(Request $request, $id)
    {
        if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('app-assets/images/uploads/users/' . $filename ) );
    
            $register = User::findOrFail($request->id);  
            $register->name             = $request->name;
            $register->email            = $request->email;
            $register->password         = Hash::make($request->password);
            $register->avatar           = $nameFile;
            $register->status           = 'Ativo';

            $register->save();

            if ($register->save()) {
                $request->session()->flash('success', 'Usuário alterado com sucesso!');
            } else {
                $request->session()->flash('error', 'Erro alterar o usuário');
            }
    
        } else {
            $register = User::findOrFail($request->id);  
            $register->name             = $request->name;
            $register->email            = $request->email;
            $register->password         = Hash::make($request->password);
            $register->status           = 'Ativo';

            $register->save();

            if ($register->save()) {
                $request->session()->flash('success', 'Usuário alterado com sucesso!');
            } else {
                $request->session()->flash('error', 'Erro alterar o usuário');
            }
        }

        return redirect()->route('usuarios.index');
    }

    public function profile()
    {
        return view('profile');
    }

    public function profileupdate(Request $request)
    {
        if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('app-assets/images/uploads/users/' . $filename ) );

    		$user = Auth::user();
    		$user->avatar = $filename;
    		$user->save();
    	}

        return back();

    }
}
