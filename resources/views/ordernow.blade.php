@extends('master')
@section('content')
<div class="custom-product">
<div class="col-sm-6">
  <table class="table">
 
  <tbody>
    <tr>
      <th scope="row">Price</th>
      <td>{{$total}}</td>
    </tr>
    <tr>
      <th scope="row">Tax</th>
      <td>0</td>
    </tr>
    <tr>
      <th scope="row">Delivery Charges</th>
      <td>100</td>
    </tr>
    <tr>
      <th scope="row">Total</th>
      <td>{{$total+100}}</td>
    </tr>
  </tbody>
   
</table>
    
  <form>
    <div class="form-group">
      <label for="address">Address:</label>
      <textarea class="form-control"></textarea>
    </div>
    <div class="form-group">
      <label for="pwd">Payment Method:</label>
      <p><input type="radio" class="" name="payment"> <span>Online Payment</span></p>
      <p><input type="radio" class="" name="payment"> <span>EMI Payment</span></p>
      <p><input type="radio" class="" name="payment"> <span>Payment on Delivery</span></p>
          
    </div>
    
    <button type="submit" class="btn btn-default">Order Now</button>
    </form>
 </div>
</div>

 @endsection
