@extends('layout.product')


@section('header')
<h1 class="text-center blck">MAKE ORDER PAYMENT</h1>
@stop


@section('content')

<br>
<div class="nav">
  <a class="blck2" href="{{URL::to('make-payment')}}"><div class="col-xs-5 col-md-4 line-solid "><span class="badge"> 1</span > FILL TO UNLOCK PHONE</div></a>
   <a class="blck2" href="{{URL::to('confirm-order')}}"><div class="col-xs-5 col-md-4 line-solid "><span class="badge"> 2</span> CONFIRM ORDER</div></a>
   <a class="ff" href="{{URL::to('make-payment')}}"><div class="col-xs-5 col-md-4 line-solid activated"><span class="badge"> 3</span> PAY FOR ORDER</div></a>
</div>
<br>

<h2>Make Payment for unlocking your {{$order->product_name}}</h2>
<!-- <div class="panel panel-default">
  <div class="panel-body blck">
   Pay and Unlock your {{$order->product_name}}
  </div>
  <div class="panel-footer me yellow"> <h4>Pay and Unlock your {{$order->product_name}}</h4></div>
</div> -->
<!-- <div class="nav">
<h2><img src="../img/shopping_cart.png" class="responsive">Pay and Unlock your {{$order->product_name}}</h2>
</div> -->

<p><font color="red"><b>NB: </font>note your IMEI for checking order status</b></p>



<br>

<div class="panel panel-inverse ">
  <div class="panel-heading ny">
    <h3 class="panel-title whyt"><font color="#fff">Payment Details <span><i class="glyphicon glyphicon-credit-card pull-right"></i></span></h3>
  </div>
  <div class="panel-body mf">
   

     @include('common.notification')

  {{Form::open(array('url'=>'payment', 'method'=>'POST'))}}
<p>
      <label class="blck"><b>Your order contact number</b><i class="text-danger"> **</i></label></label>
     <input type="text" class="form-control" value="{{$order->order_contact}}"  name="telephone" >
     <strong class="red">Enter a valid mobile number to recieve order notifications</strong>
   </p>
  <p>
      <label class="blck"><b>Your order imei</b><i class="text-danger"> **</i></label></label>
     <input type="text" class="form-control" value="{{$order->imei}}" name="imei">
   </p>
    <input type="hidden" class="form-control" value="{{$order->price}}" name="price">
    <input type="hidden" class="form-control" value="{{$order->order_code}}" name="generated_code">
    <input type="hidden" class="form-control" value="{{$order->delivery}}" name="delivery_time">
    <input type="hidden" class="form-control" value="{{$order->id}}" name="id">
    <input type="hidden" class="form-control" value="{{$order->product_name}}" name="product_model">
    <input type="hidden" class="form-control" value="{{$order->network_name}}" name="network_name">
    <input type="hidden" class="form-control" value="{{$order->p_id}}" name="p_id">
     <input type="hidden" class="form-control" value="{{$order->image2}}" name="image">
  <p>
    
      <div class="input-group">
      <div class="col-md-12">
      <div class="col-md-4">
      <img src="../img/Old-Mobile-icon.png" width="128" height="128">
      </div>
      <div class="col-md-8">
        <br><p></p>
        <div class="form-group">
        <input type="text" minlength="5" maxlength="5" class="form-control" placeholder="Enter Pay Code" name="verified_code" required>
        <button class="btn btn-success"><i class=" glyphicon glyphicon-credit-card"></i><B> PAY FOR ODRER <span class="">GH₵{{$order->price}}</span></B></button>
        </div>
      </div>
      </div>
    </div>
   </p>

<p class="text-center blck">Didn't get your code? Sometimes it can take up to 15 minutes. If it's been longer than that, <span class="red">call 0503214360</span>. </p>
{{Form::close()}}
<p class="text-center blck"> -OR-</p>

<div class="col-md-offset-4">
<p><a href="{{URL::to('bitcoin_payment/' .$order->id)}}"><button class="btn btn-warning">Pay with Bitcoin</button></a> &emsp; <a href="{{URL::to('pay/' .$order->id)}}"><button class="btn btn-primary">Pay with your account</button></a></p>
</div>
</div>
</div>

<div class="well well-sm mb ">
<h4 class="blue"><i class=" glyphicon glyphicon-credit-card"></i> PAYMENT GUIDE</h4>
</div>
<div class="well well-sm me">
<p class="blue">Send mobile money to</p> 
<p><img src="../img/mtn.jpg" width="70" height="50"><span class="blue"> =  <b>024072639</b></span></p>
<p><img src="../img/Tigo-Cash-Logo.jpg" width="70" height="50"><span class="blue"> = <b>xxxxxxxxx</b></span></p>

<h4><b class="blue">STEPS TO MAKE PAYMENT</b></h4>
<ul class="nav blck">
<li>1. Send Mobile money to any of the numbers above either <b>Tigo Cash or MTN Moblie Money</b>.</li>
<li>2. Once we recieve the money you sent us, a <b>PAY CODE eg.326578890</b> will sent to your Phone.</li>
<li>3. Enter this code in the pay code form and click <b>PAY FOR ORDER</b> to make make payment and unlock your phone.</li>
<li>4. Once payment is completed your phone unlocking process begins.</li>
</ul>
<br>
<p class="blck">For any difficulties call <i class="glyphicon glyphicon-earphone"></i> <b>0503214360</b> for assistance</p>
</div>

@stop
<script src="../js/jquery-1.8.2.min.js"></script>
<script src="../js/jquery.inputmask.js"></script>
<script type="text/javascript">

$(document).ready(function(){
    $("#code").inputmask();
});

</script>
