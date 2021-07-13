<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Support\Facades\DB;

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
    
    function register(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5'
        ]);
        
        if(!$validator->passes())
        {
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        }
        else{
            $values = [
                'name'=>$req->name,
                'email'=>$req->email,
                'password'=>Hash::make($req->password)
            ];
            
            $query = DB::table('users')->insert($values);
            
            if($query){
                return response()->json(['status'=>1,'msg'=>'data has been updated successfully']);
            }
            else{
                return response()->json(['status'=>1,'msg'=>'data has not been updated successfully']);
            }
            
        }
        
    }
//    public function index()
//    {
//        return view('signup');
//    }
}

