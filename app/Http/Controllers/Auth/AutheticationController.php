<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AutheticationController extends Controller
{
    public function showFormLogin(){
        return view('Fontend.auth.login');
    }

    public function showFormRegister(){
        return view('Fontend.auth.register');
    }

    public function register(Request $request){

        // dd($request->all());
        $register = $request->validate([
            'email'    => ['required', 'email', 'max:255', 'unique:users'],
            'name'     => ['required', 'string', 'max:255'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);
        $user = User::create($request->all());

        Auth::login($user);
        $request->session()->regenerate();

        return redirect('client');
    }

    public function login(Request $request){
        $login = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($login)){
            $request->session()->regenerate();

            /**
             * @var User $user
             */
            $user = Auth::user();
            if($user->isAdmin()){
                return redirect()->route('client.');
            } return redirect()->route('client.');
        }
        return redirect('client');
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return back();
    }
}
