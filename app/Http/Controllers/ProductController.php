<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
       public function index()
       {
           return redirect('home');
           //return "welcome to product page";
       }
}
