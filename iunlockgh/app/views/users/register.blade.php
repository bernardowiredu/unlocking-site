@extends('layout.holder')




@section('content')

<div class="nav">
<br><br>

<div class="col-sm-7 col-md-6 push hidden-xs">
<img src="img/sa.png" class="img-responsive" width="300" height="270">
<div class="animatedParent" data-sequence="500">
<h2 class="animated bounceIn txt-shadow" data-id="1">You are few seconds away from unlocking your device!</h2>
<h4>Create account to start unlocking devices </h4>

<ul class="nav big">
	<li><i class="glyphicon glyphicon-ok green animated bounceInLeft" data-id='2'></i> We offer our services at the cheapest rates</li><p></p>
	<li><i class="glyphicon glyphicon-ok green animated bounceInLeft" data-id='3'></i> We offer 100% Money back guarantee.</li><p></p>
	<li><i class="glyphicon glyphicon-ok green animated bounceInLeft" data-id='4'></i> We unlock almost all phone brands worldwide.</li><p></p>
	<!-- <li><i class="glyphicon glyphicon-ok green"></i> We provide technical support after unlocking your iPhone</li><p></p>
	<li><i class="glyphicon glyphicon-ok green"></i> After using our service, your device can use any sim</li><p></p> -->
	<br>

</ul>
<a href="{{URL::to('login')}}"><button class="btn btn-primary push animated bounceInUp findMe" data-id="5">Already registered sign in</button></a>
</div>
</div>
<div class="hidden-xs">
<br>
</div>

<div class="col-sm-6 col-md-5 me"> 
<div class="visible-xs">
<h3 class="form-signin-heading text-primary">Register account</h3>
</div>

{{ Form::open(array('url' => 'user', 'method'=>'POST', 'class' => 'form-signin')) }}

@include('common.notification')


<div class="form-group">


    {{ Form::token() }}

    <label class="whyt" for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control"  name="username" id="username" placeholder="Enter username" required>
  </div>
  <div class="form-group">

     
    <label  class="whyt" for="exampleInputPassword1">Email address</label>
    <input type="email" class="form-control" name="email"  title="please enter a valid email address" id="email" placeholder="Enter email address" required>
  </div>
   <div class="form-group">
    <label  class="whyt" for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Enter your password"  title="Enter your password" id="password"  required data-toggle="popover" title="Password Strength" data-content="Enter Password...">
      <div class="pwstrength_viewport_progress"></div>
  </div>
   <div class="form-group">
    <label class="whyt" for="exampleInputPassword1">Confirm Password</label>
    <input type="password" class="form-control" name="password_confirmation"  title="Confrim your password"  placeholder="Confirm Password">
  </div>
   <div class="form-group">
    <label class="whyt" for="exampleInputPassword1">Phone number</label>
    <input type="text" class="form-control"  name="telephone"  title="please enter a valid phone number"  placeholder="Enter a valid phone number" required>
  </div>
  <p>
      <div class="g-recaptcha" data-sitekey="6LfglQETAAAAAAGgaO1mPmDXsozxLnE_nnSrUU05"></div>
  </p>
  <div class="checkbox">
    <label>
      <input type="checkbox" required><span class="whyt">I have agreed to the</span>  <a href="terms and conditions">terms and conditions </a>
    </label>
  </div>
  <button type="submit" class="btn btn-lg btn-success btn-block">Create account</button>

 {{Form::close()}}

<br>
<div class="visible-xs">
<a class="btn btn-primary btn-block" href="{{URL::to('signin')}}"> already registered sign in</a>
</div>
</div>
</div>




@stop

<script src="../public/js/bootstrap-tooltip.js"></script>
<script src="../public/js/jquery-1.8.2.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="../public/js/css3-animate.js"></script>

<!-- <script src="../public/js/strength.js"></script> -->
<script type="text/javascript">
 $('#exampleInputEmail1').tooltip( 'please enter your username' );
 $('#email').tooltip( 'please enter a valid email address' );
  $('#username').tooltip( 'please enter a valid email address' );
 </script>

