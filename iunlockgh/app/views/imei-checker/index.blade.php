@extends('layout.main')


@section('header')

<h1 class="text-center blck">IMEI CHECK SERVICES</h1>
@stop




@section('content')

<br>
<div class="well well-lg mg">
<div class="col-md-offset-1">
<img src="../public/img/steps.png" class="img-responsive">
<div class="col-md-3 col-md-offset-0 hidden-xs">
   Dial *#06# to for IMEI
</div>
<div class="col-md-4 text-center blck hidden-xs">
	Fill form correctly below with IMEI
</div>
<div class="col-md-4 col-md-offset-0 hidden-xs">
	Get Phone information from IMEI
</div>
</div>
<br>
 <ul class="text-left visible-xs">
	<li> Dial *#06# to for IMEI</li>
	<li>Fill form correctly below</li>
	<li>Get Phone information</li>
</ul>

</div>

<h4 class="well well-sm"><b class="blue">IMEI Checker – Check Carrier, Lock Status and Firmware, Model name....</b></h4>

IMEI checking service is to check info like carrier name, lock status, model name, Serial, iOS firmware, ICCID, Activation status and some other details. 

Details will be sent to you via Email. Delivery Time 1-30 minutes .
<p></p>
<p>How to Find iPhone IMEI Number?
You can find it by typing <b class="blue">*#06#</b> on Keypad. Alternatively, you can check it on SIM tray. </p>

<br>

<div class="panel panel-primary">
  <div class="panel-heading blck">IMEI CHECKER<span class="pull-right"><i class="glyphicon glyphicon-phone"></i></span></div>
  <div class="panel-body mf">

  @include('common.notification')


  	<h4><b>To check your phone status, fill the form below now:</b></h4>

	{{Form::open(array('url'=>'imei', 'method'=>'POST'))}}
	<label class="blck2">Select IMEI-CHECKER Service<i class="text-danger"> **</i></label>
	<select class="form-control" name="network_name" id="network_name" >
		<option>Select IMEI-CHECKER Service</option>
		<option value="1" data-price="10" data-delivery="1-30 minutes" >NETWORK LOCK CHECK</option>
		<option value="2" data-price="15" data-delivery="30-45 minutes">BLACKLISTED/BARRED/CLEAN CHECK</option>
		<option value="3" data-price="free" data-delivery="1-15 minutes">FREE ICLOUD STATUS CHECK</option>
		<option value="4" data-price="30" data-delivery="10-20 miuntes">SPRINT USA - ALL IPHONE ELIGIBILITY TEST CLEAN/BLACKLISTED/UNPAID BILL</option>

	</select>
	
	 <div class="col-md-6 move mg">
    <h4  name="price"><span>Price: GH₵ </span><span id="money"></span></h4>
    </div>
    <div class="col-md-6 move mg">
      <h4 name="price"><span>Time: </span><span id="days"></span></h4> 
    </div>
	<br>
	<label class="blck2">Enter a valid IMEI number<i class="text-danger"> **</i></label>
	<input type="text" class="form-control" placeholder="Enter your IMEI" maxlength="15" minlength="15" name="imei">
	 <span class="red">Please make sure you've entered the correct Imei<a href="" data-toggle="modal" data-target="#sModal"> Click here to read more</a></span>
	<br>
	<div class="modal fade" id="sModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  	<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">IMEI UNLOCKING SERVICE</h4>
      </div>
      <div class="modal-body">
       To find the IMEI number of your device, turn your phone on and press *#06#, otherwise look behind the battery of the phone.
        Check and enter the correct IMEI number before proceeding with order. Thank you.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
	<label class="blck2">Telephone</label>
	<p><input type="text" class="form-control" placeholder="Enter your telephone number" value="" name="order_contact"></p>
	<input type="hidden" class="form-control"  value="IMEI CHECKER" name="product_name">
	<input type="hidden" class="form-control" value="" name="email">
	<input type="hidden"  id="price" class="form-control"   name="price" >
	<input type="hidden"  id="delivery" class="form-control"  name="delivery">
    <input type="hidden" class="form-control" value="1" name="p_id">
	<input type="hidden" class="form-control" value="15-20 minutes" name="delivery">
	
	<label class="blck2">Email address</label>
	<p><input type="text" class="form-control" name="email" placeholder="example@gmail.com"></p>
	
	<p></p>


	<!-- <b class="blue"><h3 name="price"><span>Price: GH₵ </span><span id="money"></span></h3></b>
	<b class="blue"><h3 name="price"><span>Delivery Time:</span><span id="days"></span></h3></b> -->
	<p>Delivery Method: <i class="glyphicon glyphicon-envelope blue"></i> Email </p>
	<p></p>


	<p><button class="btn btn-warning"><i class="glyphicon glyphicon-phone"></i> Check Phone Status</button></p>

	<p></p>
	{{Form::close()}}
	   
	  </div>
	</div>

 <h4 class=" well mb"><b class="yellow">Product Description</b></h4>

This service is also extremely helpful if you intend to use our IMEI based iPhone factory unlocking service but before ordering you would want to make sure that your phone is locked to a carrier.

After buying our service, we’ll send you detailed info about your device via Email. Here’s an example.
<ul class="nav">

<li>1. MODEL: iPhone 4S 16GB BLACK</li> 
<li>2. IMEI: 0130XXXXXXXXXXX</li> 
<li>3. SERIAL: DNQGQXXXXXXX</li>
<li>4. iOS: 5.0.1 </li>
<li>5. MAC Address: 3CD0F8XXXXXX </li>
<li>6. ICCID:8901410225551XXXXXX</li>
<li>7. Last Restored: 2012-12-18 </li>
<li>8. Network Unlocked: False </li>
<li>9. Activation Status: Yes</li>
<li>10. Activation Date: 2011-11-26 </li>
<li>11. Activated Carrier: AT&T – United States USA </li>
<li>12. Original Carrier: AT&T USA<li>
<li>13. Applied Policy Id: 23 – AT&T USA <li>
<li>14. Next Policy Id: 23 – AT&T USA(PH) <li>
<li>15. Telephone Technical Support: No phone support (Expired)(HW)</li>
<li>16. Repairs & Service Coverage: Out of Warranty (Expired) <li>
</ul>

<!-- <p>How to Find iPhone IMEI Number?
You can find it by typing <b class="yellow">*#06#</b> on Keypad. Alternatively, you can check it on SIM tray. </p>

<br>
<div class="col-sm-6 col-md-7 line3 cover mg">
<h4 class="yellow"><b>To check your IMEI, fill the form below now:</b></h4>

{{Form::open(array('url'=>'order', 'method'=>'POST'))}}
<label>Enter a valid IMEI number<i class="text-danger"> **</i></label>
<input type="text" class="form-control" placeholder="Enter your IMEI" name="imei">
<br>
<label>Telephone</label>
<p><input type="text" class="form-control" placeholder="Enter your telephone number" value="" name="order_contact"></p>
<input type="hidden" class="form-control"  value="IMEI CHECKER" name="product_name">
<input type="hidden" class="form-control" value="" name="email">
<input type="hidden" class="form-control" value="15" name="price">
<input type="hidden" class="form-control" value="1" name="p_id">
<input type="hidden" class="form-control" value="15-20 minutes" name="delivery">
<input type="hidden" class="form-control" value="IMEI" name="network_name">
<p></p>


<p>Price:<b class="red"> GH₵15.00</h4></b>
<p>Delivery Time: 1-20 minutes  </p>
<p>Delivery Method: <i class="glyphicon glyphicon-envelope blue"></i> Email </p>
<p></p>


<p><button class="btn btn-warning"><i class="glyphicon glyphicon-phone"></i> Check Phone Status</button></p>
</div>
<p></p>
{{Form::close()}} -->
<!-- <div class="col-sm-3 col-md-3 ">
<p><b class="yellow">Price: GH₵15.00</h4></b>
<p>Delivery Time: 1-20 minutes  </p>
<p>Delivery Method: <i class="glyphicon glyphicon-envelope blue"></i> Email </p>
<br>


</div> -->
<br>

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
@stop

