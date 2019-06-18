<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegistarController extends Controller
{
     /**
     * Where to redirect users after registration.
     * */




    
    protected function validator(array $data)
    {

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function store(Request $request)
    {

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

       $user = new User;
       $user->name = $request->name;
       $user->password = Hash::make($request->password);
       $user->email = $request->email;
       $user->save();
       return redirect('/home');
    }

    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
                
            ]);
        $user = User::findOrFail($request->idUser);
        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();
        return redirect('/home');

        
        
    }
}