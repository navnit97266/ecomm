@extends('master')
@section('content')
<div class="custom-product">

  
    <div class="col-sm-10">
        <div class="trending-wrapper">
        <h2>Ordered Products</h2>
  
        <br>
        <br>
      
            @foreach($orders as $item)  
                <div class="row searched-items cart-list-divider">
                    <div class="col-sm-3">
                        <a href="detail/{{$item->id}}">
                        <img class="trending-img" src="{{$item->gallery}}">
                        </a>
                    </div>
                    <div class="col-sm-3">
                                         
                            <h3>{{$item->name}}</h3>
                            <h5><strong>Address:</strong> {{$item->address}}</h5>
                            <h5><strong>Payment Status:</strong> {{$item->payment_status}}</h5>
                            <h5><strong>Payment Method:</strong> {{$item->payment_method}}</h5>
                        
                        </a>
                    </div>
                    <div class="col-sm-3">
                    
                    </div>
                </div>
            @endforeach
            
    </div>
        
    </div>
 </div>

 @endsection

