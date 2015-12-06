@extends('layout.product')


@section('header')

<h1 class="text-center uptest blck">{{$phones->product_name}} UNLOCKING</h1>


@stop

@section('content')
<br>
<div class="nav">
  <a class="ff" href="{{URL::to('product/' .$phones->id)}}"><div class="col-xs-5 col-md-4 line-solid activated"><span class="badge"> 1</span > FILL TO UNLOCK PHONE</div></a>
   <a class="blck2" href="{{URL::to('confirm-order')}}"><div class="col-xs-5 col-md-4 line-solid "><span class="badge"> 2</span> CONFIRM ORDER</div></a>
   <a class="blck2" href="{{URL::to('make-payment')}}"><div class="col-xs-5 col-md-4 line-solid"><span class="badge"> 3</span> PAY FOR ORDER</div></a>
</div>
<br>
<div class="nav">
<div class="col-xs-4 col-md-3 hidden-xs">
<img src="{{$phones->image}}" alt="" class="img-responsive curvy"  width="140" height="110">
<!-- <div class="caption me2"> -->
      <p class="text-center">
        <div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>{{$phones->product_name}}</strong> 
        </div>
      <!-- <a class="whyt" href=""><span>{{$phones->product_name}}</span></a></p> -->
<!-- </div> -->
<br>
<img src="../img/mobile_phone.png">
<p class="txt-shadow">You can call <span class="blue"><b>0504214360</b></span> for order support
before proceeding if not certain about order</p>
</div>
<div class="col-xs-9 col-md-9">

<div class="panel panel-inverse">
  <div class="panel-heading ny">
    <h3 class="panel-title whyt"> <font color="#fff">Start Unlocking <span><i class="glyphicon glyphicon-phone pull-right"></i></span></font></h3>
  </div>
  <div class="panel-body">


 
  @include('common.notification')

   
  {{Form::open(array('url'=>'order', 'method'=>'POST'))}}
  <p>
      <label class="blck"><b>Select network</b><i class="text-danger"> **</i></label></label>
    
     <select class="form-control" name="network_name" id="network_name">
      
     <option>Select your network</option>
      @foreach($countrys as $country)
      <optgroup 
      label="{{$country->country_name}}">
    </optgroup>
      @foreach($country->networks as $network)
      <option value="{{$network->network_name}}" data-price="{{$network->price}}" data-delivery="{{$network->delivery_time}}">{{$network->network_name}}</option>
      @endforeach
      @endforeach
      </select>
     
   </p>

   
    <div class="col-md-6 move mg">
    <h4  name="price"><span>Price: GH₵ </span><span id="money"></span></h4>
    </div>
    <div class="col-md-6 move mg">
      <h4 name="price"><span>Days to Unlock: </span><span id="days"></span></h4> 
    </div>

    <p>
    <input type="hidden"  id="price" class="form-control"   name="price" >
    </p>
    <p>
    
    <input type="hidden"  id="delivery" class="form-control"  name="delivery">
   </p>
   
      <br><br>
   <p>
      <label class="blck"><b>IMEI number</b><span class="text-danger red"><b>*15 digits*</b></span></label>
      <input type="hidden" name="on1" value="IMEI" />
     <input type="text" class="form-control" id="input_imei" maxlength="15" minilenghth="15" placeholder="Enter Phone IMEI dial *#06#" name="imei">
      <p class="error" id="imei_error"></p>
      <span class="text-danger red">Please ensure you have entered correct imei before proceeding* <a href=""  data-toggle="modal" data-target="#ssModal">Click here to read more</a></span>
   </p>
   <p> 
      <label class="blck"><b>Phone number</b><i class="text-danger"> <b>**</b></i></label></label>
     <input type="text" class="form-control"  id="order_contact" placeholder="Enter Phone number" name="order_contact">
   </p>
   <p>
      <label class="blck"><b>Email</b><i class="text-danger"> <b>**</b></i></label></label>
     <input type="text" class="form-control"  id="email" placeholder="Enter Email address" name="email">
   </p>
   <p><button id="btn_id" class="btn btn-danger"><span class="badge"> 1</span> CONTIUNE UNLOCKING YOUR {{$phones->product_name}} &raquo;</button></p>

    <input type="hidden"  id="product_name" class="form-control" value="{{$phones->product_name}}" name="product_name">
    <input type="hidden"  id="p_id" class="form-control" value="0" name="p_id">
    <input type="hidden"  id="p_id" class="form-control" value="{{$phones->reasons}}" name="image">
      <input type="hidden"  id="p_id" class="form-control" value="{{$phones->image}}" name="image2">


{{Form::close()}}
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="../js/sol.js"></script> 
 -->


  </div>
</div>


<div class="modal fade" id="ssModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">IMEI UNLOCKING SERVICE</h4>
      </div>
      <div class="modal-body">
       To find the IMEI number of your device, turn your phone on and press *#06#, otherwise look behind the battery of the phone.
        Check and enter the correct IMEI number before proceeding with order. When unlocking process fails due to invalid imei submitted 
        only <span class="red">80%</span> of the money used for the order will be refunded back to you. Thank you.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

<div class="hidden-xs">
<!-- <h3 class=" blue txt-shadow" ><b> How to unlock {{$phones->product_name}}</b></h3>
<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. 
Nullam id dolor id nibh ultricies vehicula ut id elit.Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. 
Nullam id dolor id nibh ultricies vehicula ut id elit.Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. 
Nullam id dolor id nibh ultricies vehicula ut id elit.Cras justo odio.Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. 
Nullam id dolor id nibh ultricies vehicula ut id elit.Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. 
Nullam id dolor id nibh ultricies vehicula ut id elit.Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. 
Nullam id dolor id nibh ultricies vehicula ut id elit.Cras justo odio,</p> -->
<h4 class="blue txt-shadow"><b>Terms and conditions for unlocking {{$phones->product_name}}</b></h4>

<p><span>1. </span> I understand orders which have already been sent in for processing cannot be cancelled while in transit. Your order may only be cancelled upon OUR approval.</p>
<p><span>2. </span> I understand that video proof may be required if there is a claim the unlock solution provided does not unlock the device. Although this may rarely occur, it may be a requirement from the manufacturer to retrieve a new code or a refund as a last resort</p>
<p><span>3. </span> I understand that UnlockCode4U.com Guarantees 100% to fully and permanently unlock my phone's network. It will be my responsibility to verify the phone which I am unlocking will be compatible with the network I wish to use it on. If a custom ROM has been <!-- installed or there are software issues that does not allow the unlock solution to work on the device, it may be required to restore the original ROM or to upgrade it in order to successfully use the Unlock Code. --></p>
</div>
</div>
<div class="visible-xs">
<!-- <h3 class=" well well-sm  txt-shadow yellow"><b> How to unlock {{$phones->product_name}}</b></h3>
<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. 
Nullam id dolor id nibh ultricies vehicula ut id elit.Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. 
Nullam id dolor id nibh ultricies vehicula ut id elit.Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. 
Nullam id dolor id nibh ultricies vehicula ut id elit.Cras justo odio.Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. 
Nullam id dolor id nibh ultricies vehicula ut id elit.Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. 
Nullam id dolor id nibh ultricies vehicula ut id elit.Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. 
Nullam id dolor id nibh ultricies vehicula ut id elit.Cras justo odio,</p> -->
<h4 class="yellow"><b>Terms and conditions for unlocking {{$phones->product_name}}</b></h4>

<p><span>1. </span> I understand orders which have already been sent in for processing cannot be cancelled while in transit. Your order may only be cancelled upon OUR approval.</p>
<p><span>2. </span> I understand that video proof may be required if there is a claim the unlock solution provided does not unlock the device. Although this may rarely occur, it may be a requirement from the manufacturer to retrieve a new code or a refund as a last resort</p>
<p><span>3. </span> I understand that UnlockCode4U.com Guarantees 100% to fully and permanently unlock my phone's network. It will be my responsibility to verify the phone which I am unlocking will be compatible with the network I wish to use it on. If a custom ROM has been <!-- installed or there are software issues that does not allow the unlock solution to work on the device, it may be required to restore the original ROM or to upgrade it in order to successfully use the Unlock Code.</p>
 --></div>
</div>
<br>
<div class="nav">
<div class="well well-sm mb txt-shadow">
<h4 class="yellow"><i class="glyphicon glyphicon-phone"></i> Begin unlocking your {{$phones->product_name}}</h4>
</div>






<div class="well cover me">
<h4 class="yellow"><b>Reasons to unlock {{$phones->product_name}} from Us</b></h4>
<ul class="text-left">
<li>Unlock your phone from the comfort of your own home.</li>
<li>Never send your phone to anybody.</li>
<li>If you travel you will save roaming fees by being able to use a local SIM Cards</li>
<li>The resell value of your device will increase significantly as it is available to more networks</li>
<li>Easily switch between simcard, using the same phone.</li>
<li>Very easy, no technical experience necessary.</li>
<li>The phone is permanently unlocked, even after updates.</li>
<li>100% Guaranteed, if we cannot get you, your unlock code we will refund you</li>
</ul>
<p><font color="#5AB3FC"><i class="glyphicon glyphicon-alert"></i> If you have not registered on the system please enter your mail or mobile number before continuing with order</font></p>
</div>
</div>

<script src="http//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script src="../js/jQuery.js"></script>
<script src="../js/jquery-2.1.4.min.js"></script>
<script src="../js/jquery.validate.min.js"></script>
<script src="../js/jquery.validate.imei.js"></script>
<script src="../js/waitMe.js"></script>
<script src="../js/jquery-1.11.1.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="../js/jquery-customselect.js"></script>

<script type="text/javascript">

$('#network_name').change(function() {
    selectedOption = $('option:selected', this);
    $('input[name=delivery]').val( selectedOption.data('delivery') );
    $('input[name=price]').val( selectedOption.data('price') );
     $('#money').html( selectedOption.data('price'));
     $('#days').html( selectedOption.data('delivery') );
});

   
    

</script>

<script type="text/javascript">
$(function() {
$("#demo").customselect();
});
</script>



@stop



