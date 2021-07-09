<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
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
       
       function order(Request $req)
       {
         //  return $req->input();
           
          $userID = session()->get('user')['id'];
          $products = Cart::where('cart.user_id',$userID)->get();
          foreach ($products as $item) 
          {
              $order = new Order();
              $order->user_id = $item['user_id'];
              $order->product_id = $item['product_id'];
              $order->address = $req->address;
              $order->status = "pending";
              $order->payment_method = $req->payment;
              $order->payment_status = "pending";
              $order->save();
          }
          Cart::where('cart.user_id',$userID)->delete();
          return redirect('/');
       }
}
