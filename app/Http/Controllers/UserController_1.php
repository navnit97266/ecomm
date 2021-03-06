<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $req)
    {
        
         $req->validate([
            'email'=>'required | max:100',
            'password'=>'required | min:5'
        ]); 
        $user = User::where(['email'=>$req->email])->first();
      
      
        if(!$user || !Hash::check($req->password,$user->password))
        {
            echo "User name or password is not correct";
        }
        else
        {
            $req->session()->put('user',$user);
            return redirect('/');   
        }
        

    }
    
}
