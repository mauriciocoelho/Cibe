<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;
use App\User;

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
        return view('users.register');
    }    

    public function store(Request $request)
    {        
        // Define o valor default para a variável que contém o nome da imagem 
        $nameFile = null;
 
        // Verifica se informou o arquivo e se é válido
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) 
        {
            
            // Define um aleatório para o arquivo baseado no timestamps atual
            $name = uniqid(date('HisYmd'));
    
            // Recupera a extensão do arquivo
            $extension = $request->avatar->extension();
    
            // Define finalmente o nome
            $nameFile = "{$name}.{$extension}";
    
            // Faz o upload:
            $upload = $request->avatar->storeAs('public/users', $nameFile);
            // Se tiver funcionado o arquivo foi armazenado em storage/app/public/pessoas/nomedinamicoarquivo.extensao
    
            $register = new User;    
            $register->name             = $request->name;
            $register->email            = $request->email;
            $register->password         = bcrypt($request->password);
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
            $register->password         = bcrypt($request->password);
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

    public function profile()
    {
        return view('profile');
    }

    public function profileupdate(Request $request)
    {
        if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('/storage/users/' . $filename ) );

    		$user = Auth::user();
    		$user->avatar = $filename;
    		$user->save();
    	}

        return back();

    }
}
