@extends('layout.products')


@section('header')

<h1 class="text-center blck">CONFIRM YOUR ORDER</h1>

@stop

@section('content')

<br>
<div class="nav">
  <a class="blck2" href="{{URL::to('confirm-order')}}"><div class="col-xs-5 col-md-4 line-solid "><span class="badge"> 1</span > FILL TO UNLOCK PHONE</div></a>
   <a class="ff" href="{{URL::to('confirm-order')}}"><div class="col-xs-5 col-md-4 line-solid activated"><span class="badge"> 2</span> CONFIRM ORDER</div></a>
   <a class="blck2" href="{{URL::to('confirm-order')}}"><div class="col-xs-5 col-md-4 line-solid"><span class="badge"> 3</span> PAY FOR ORDER</div></a>
</div>

<br>
<div class="nav">
<div class="col-xs-4 col-md-3 ">
@foreach($orders as $order)
<img src="{{$order->image}}" alt="" class="img-responsive hidden-xs curvy"  width="140" height="110">
<br>
 <div class="alert alert-success alert-dismissible" role="alert">
 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>{{$order->product_name}} <i class="glyphicon glyphicon-ok-sign"></i></strong> 
</div>
@endforeach
</div>
<div class="col-xs-10 col-md-9">

<h4 class="yellow cover cnta ny"><img src="../public/img/folder_modified.png"><b>CONFIRM YOUR ORDER DETAILS</b></h4>

<div class="panel panel-inverse">
  <!-- <div class="panel-heading">
    <h3 class="panel-title blck">Panel title</h3>
  </div> -->

  @include('common.notification')

  <div class="panel-body  f5 text-center blck">
   

@foreach($orders as $order)
<h4>
<p>Network Locked To: <b>{{$order->network_name}}</b></p><br>
<p>Price: <b>GH₵ {{$order->price}}</b></p><br>
<p>Unlocking Time: <b class="blue">{{$order->delivery}}</b></p><br>
<p>Phone Model: <span class="red"><b>{{$order->product_name}}</b></span></p><br>
<!-- <p>Network Locked: {{$order->network_name}}</p> -->
<p>IMEI Number: <b>{{$order->imei}}</b></p><br>
<!-- p>Price:<span class="yellow"><b> GH₵ {{$order->price}}</b></span> </p> -->
<p>Delivery Method: <span class="blue"><i class="glyphicon glyphicon-phone"></i><b> {{$order->order_contact}}</b></span></p><br>

</h4>

<p></p>
<div class="inline">
<a href="{{URL::to('delete/' .$order->id)}}"><button class="btn btn-danger"> &laquo; CANCEL ORDER </button></a>
<a href="{{URL::to('make-payment/' .$order->id)}}"><button class="btn btn-success ny"> CONFIRM AND PAY &raquo;</button>
</a>
<br><br>
</div>
@endforeach

  </div>
</div>


</div>
</div>

<br><br>

<div class="well well-sm mb">
<h4 class="blue"><b>Terms and conditions of making an order</b></h4>
</div>

<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. 
Nullam id dolor id nibh ultricies vehicula ut id elit.Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. 
Nullam id dolor id nibh ultricies vehicula ut id elit.Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. 
Nullam id dolor id nibh ultricies vehicula ut id elit.Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. 
Nullam id dolor id nibh ultricies vehicula ut id elit Nullam id dolor id nibh ultricies vehicula ut id elit.Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. 
Nullam id dolor id nibh ultricies vehicula ut id elit.Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. 
Nullam id dolor id nibh ultricies vehicula ut id elit.Nullam id dolor id nibh ultricies vehicula ut id elit.Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. 
</p>


@stop