<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class loginController extends Controller
{
    function register(Request $request){
        $infos = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);
        $user = User::create([
            'name' => $infos['name'],
            'email' => $infos['email'],
            'password' => bcrypt($infos['password']),
        ]);
        return "dakhlo lma3lomat mzyan";
    }
        function login(Request $request){
            $infos = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
            if(!Auth::attempt($infos)){
                return "ma kaynch had l user";
            }
            return "tsajlti mzyan mzyan";
        }
  
        function logout(Request $request){
            Auth::logout();
            return "khrjti mzyan";
        }
    }

