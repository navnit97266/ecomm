<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Session;

class ProductController extends Controller
{
       public function index()
       {
           $data = Product::all();
           return view('product',['products'=>$data]);
//           return redirect('home');
           //return "welcome to product page";
       }
       
       public function detail($id)
       {
           $data = Product::find($id);
           return view('detail',['products'=>$data]);
       }
       
       public function search(Request $req)
       {
           //return $req->input();
           $data = Product::where('name','like','%'.$req->input('query').'%')->get();
           return view('search',['products'=>$data]);
       }
       
       function addtocart(Request $req)
       {
           if($req->session()->has('user'))
           {
               $cart = new Cart();
               $cart->user_id = $req->session()->get('user')['id'];
               $cart->product_id = $req->product_id;
               $cart->save();
               return redirect('/');       
           }
           else
           {
               return redirect('/login');
           }
           
       }
       
       static function cartitem()
       {
           $userID = session()->get('user')['id'];
           return Cart::where('user_id',$userID)->count();
       }
}
