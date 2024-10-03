<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;

class NewAuthorManager extends Controller
{
function login(){
    return view('login');

}

function registrasi(){
    return view('registrasi');
}

}

function loginPost(Request $request){
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);
    

    $credentials = $request->only('email', 'password');
    if(auth()->attempt($credentials)){
        return redirect()->intended(route(name: 'home'));
    }
return redirect(route(name: 'login'))->with('error', 'login details are not valid');

} 

function registrasiPost(Request $request){
    $request->validate([
        'name' => 'required|email',Unique ('users'),
        'email' => 'required',
        'password' => 'required'
    ]);

    $data['name'] = $request->name;
    $data['email'] = $request->email;
    $data['password'] = Hash::make($request->password);
    $user = User::create($data);
    if($user){
        return redirect(route(name: 'registrasi'))->with('error', 'registrasi failed try again');  
    }
    return redirect(route(name: 'login'))->with('success', 'registrasi success');

}

function logout(){
    session()->flush();
    auth()->logout();
    return redirect(route(name: 'login'));
}




