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
            <button class="btn btn-success">Add to Cart</button>
            <br><br>
            <button class="btn btn-primary">Buy Now</button>
            <br><br>
        </div>
    </div>
 </div>
@endsection

