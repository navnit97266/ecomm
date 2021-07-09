<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Session;
use Illuminate\Support\Facades\DB;

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
       
       function cartlist()
       {    
           $userID = session()->get('user')['id'];
           $data = DB::table('cart')
                   ->join('products','products.id','cart.product_id')
                   ->select('products.*','cart.id as cart_id')
                   ->where('cart.user_id',$userID)
                   ->get();
           return view('cartlist',['products'=>$data]);
       }
       
       function removeCart($id)
       {
           Cart::destroy($id);
           return redirect('cartlist');
       }
       
       function orderNow()
       {
           $userID = session()->get('user')['id'];
           $total = DB::table('cart')
                   ->join('products','products.id','cart.product_id')
                   ->where('cart.user_id',$userID)
                   ->sum('price');
           return view('ordernow',['total'=>$total]);
       }
}
