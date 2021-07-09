@extends('master')
@section('content')
<div class="custom-product">

  
    <div class="col-sm-10">
        <div class="trending-wrapper">
        <h2>Cart Products</h2>
      
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
                        <button class="btn btn-warning">Remove from Cart</button>
                    </div>
                </div>
            @endforeach
    </div>
    </div>
 </div>

 @endsection

