<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorecourRequest;
use App\Http\Requests\UpdatecourRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
     public function index()
    {
        return User::all(); 
}
public function store(Request $request)
    {
        $infos = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|max:255',
        ]);
        $user = User::create([
            'name' => $infos['name'],
            'email' => $infos['email'],
            'password' => bcrypt($infos['password']),
            'role' => $infos['role'],
        ]);
        return "dakhlo lma3lomat mzyan";
    }
    public function update(Request $request, User $user)
    {
        $infos = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'sometimes|min:6',
            'role' => 'required|max:255',
        ]);
        if(isset($infos['password'])){
            $infos['password'] = bcrypt($infos['password']);
        }else{
            unset($infos['password']);
        }
        $user->update($infos);
        return "tbdlt lma3lomat mzyan";
    }
    public function destroy(User $user)
    {
        $user->delete();
        return "tms7t lma3lomat mzyan";
    }
}
