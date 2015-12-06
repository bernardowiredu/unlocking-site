@extends('layout.product')


@section('header')

<h1 class="text-center uptest blck">{{$category->name}} UNLOCKING</h1>
@stop


@section('content')
<br>

<div class="nav">
<div class="well well-sm ">
<img src="{{$category->image}}" class="img-responsive"></div>

<div class="well well-sm mg">
<!-- <label class="push"><h4 class="yellow txt-shadow"><b><i>Select your {{$category->name}} model</i></b></h4></label> -->
<div class="form-horizontal">
<select class="form-control2" onchange="location = this.options[this.selectedIndex].value;">
<option>Select your {{$category->name}} models here</option>
@foreach($phone as $phone)  
<option value="{{URL::to('product/' .$phone->id)}}">{{$phone->product_name}}</option>
@endforeach
</select>
</div>
</div>
<br>

@foreach($product as $product)
 <div class="col-xs-6 col-md-3">
 <a href="#" class="thumbnail mf">
      <img src="{{$product->image}}" alt="product" width="100" height="70">
    </a>
    <div class="caption ny">
   	<p class="text-center"><a class="whyt" href="{{URL::to('product/' .$product->id)}}"><span>{{$product->product_name}}</span></a></p>
   </div>
   <p></p> 
 </div>

@endforeach
 </div>
 <br>
<div class="well well-sm">
<h4 class="blue"><b>Before you starting unlocking your phone</b></h4>
</div>
<p>
	<p> <b>  Make sure the new network you are trying to use is GSM</b><br> 
     &raquo; Contact us for clarification</p>
	<p><b>You have to know your IMEI number</b><br>
     &raquo; To find the IMEI number of your device, turn your phone on and press <b>*#06#</b>, 
    otherwise look behind the battery of the phone. 
     &raquo;In most cases the number starts by a 0,3 or 9 and is usually at least 15 digits.</p>  
    </p>
    <b> Phone brand is listed among phone's list</b><br>
     &raquo; If your phone is not listed above, please try again in a week, as our database is updated weekly. Please don’t hesitate to contact us if you have any question or special request
	<p></p>
<div class="well well-sm">
<h4><i class="glyphicon glyphicon-question-sign blue"></i> <b class="blue">Any questions before you proceed?</b></font></h4>
</div>
<p>Any questions? Then <a href=""> contact us right away</a> or call 0545343660 or 0244072639</p>
@stop


