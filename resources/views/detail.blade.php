@extends('master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <img class="detail-img" src="{{$products['gallery']}}">
        </div>
        <div class="col-lg-6">
            <a href="/">Go back</a>
            <h2>{{$products['name']}}</h2>
            <h3>Price:₹ {{$products['price']}}</h3>
            <h4>Details: {{$products['description']}}</h4>
            <br><br>
            <br><br>
            <form action="/addtocart" method="post">
                @csrf
                <input type="hidden" name="product_id" value="{{$products['id']}}"> 
                <button class="btn btn-success">Add to Cart</button>
            </form>
            <br><br>
            <button class="btn btn-primary">Buy Now</button>
            <br><br>
        </div>
    </div>
 </div>
@endsection

