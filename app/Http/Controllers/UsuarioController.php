<?php

namespace App\Http\Controllers;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class UsuarioController extends Controller
{
    public function home(){
        return view('welcome');
    }
    public function login(){
        return view('usuarioc.login');
    }
    public function registro(){
        return view('usuarioc.registrar');
    }

    function loginPost(Request $request){
        $request->validate([
            'usuarios'=>'required',
            'password'=>'required'
        ]);

        $credentials=$request->only('usuarios', 'password');
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('home'));
        }
        return redirect(route('login'))->with('error', 'No se ha registrado con nosotros');

    }

    function registroPost(Request $request){
        $request->validate([
            'usuarios'=>'required|unique:usuarios,usuarios',
            'password'=>'required'
        ]);

        $data['usuarios']=$request->usuarios;
        $data['password']=Hash::make($request->password);
        $user=Usuario::create($data);
        if(!$user){
            return redirect(route('registrar'))->with('error', 'No se ha registrado correctamente');
        }
        return redirect()->route('login')->with('success', 'Registro correcto !!!!');
    }

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect()->route('login');

    }
}
