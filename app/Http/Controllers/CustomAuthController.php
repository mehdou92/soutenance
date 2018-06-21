<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Utilisateur;
use Illuminate\Support\Facades\Auth;

//use Illuminate\Auth;
//use Auth;
use Illuminate\Support\Facades\Hash;

class CustomAuthController extends Controller
{
    public function showRegisterForm()
    {

        return view('custom.register');
    }

    public function register(Request $request)
    {

        $this->validation($request);
        //$request['password'] = bcrypt($request->password);
        $request['password'] = Hash::make($request->password);
        Utilisateur::create($request->all());
        return redirect('/')->with('Status', 'You are registed');
        //return $request->all();
    }

    public function showLoginForm()
    {

        return view('custom.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required|max:255',
        ]);
        if (Auth::attempt(array('email' => $request->email, 'password' => $request->password))) {
            return 'logged in sucessfully';
        } else {
            $hashedPassword = '$2y$10$0Cyb89bQH3PVq.T0ahU5fO07lYW5wfZOgD5i/B/IB5I2u3mg3D7Lm';
            if (Hash::check($request->password, $hashedPassword)) {
                echo 'The passwords match...';

            }
            return 'Oups something wrong happens';

        }
        /*
        $hashedPassword = '$2y$10$FxfFJu33/6e2kZBhlXTUMOsRgsnFHdBTmu6rwVisfb93xTDUmwKqG';
        if (Hash::check($request->password, $hashedPassword))
        {
            echo'The passwords match...';
        }
*/

    }

    public function validation($request)
    {

        return $this->validate($request, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:utilisateurs|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
}
