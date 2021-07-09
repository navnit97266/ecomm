@extends('master')
@section('content')
<div class="custom-product">

  
    <div class="col-sm-10">
        <div class="trending-wrapper">
        <h2>Cart Products</h2>
        <a href="/ordernow" class="btn btn-success">Order Now</a>
        <br>
        <br>
      
            @foreach($products as $item)  
                <div class="row searched-items cart-list-divider">
                    <div class="col-sm-3">
                        <a href="detail/{{$item->id}}">
                        <img class="trending-img" src="{{$item->gallery}}">
                        </a>
                    </div>
                    <div class="col-sm-3">
                       
                       
                            <h3>{{$item->name}}</h3>
                            <h5>{{$item->description}}</h5>
                        
                        </a>
                    </div>
                    <div class="col-sm-3">
                        <a href="/removecart/{{$item->cart_id}}" class="btn btn-warning">Remove from Cart</a>
                    </div>
                </div>
            @endforeach
            <a href="/ordernow" class="btn btn-success">Order Now</a>
    </div>
        
    </div>
 </div>

 @endsection

