@if(Session::has('success'))

<div class="notice notice-success">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong><i class="glyphicon glyphicon-ok-sign"></i><b> Success!</b></strong><span class="blck"> {{ Session::get('success') }}</span> 
</div>

 @elseif(Session::has('error'))

 <div class="notice notice-danger">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong><i class="glyphicon glyphicon-remove-sign"></i><b> Failed!</b></strong> {{ Session::get('error') }}
</div>

@elseif(Session::has('message'))

<div class="notice notice-info">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong><i class="glyphicon glyphicon-info-sign"></i> Note Carefully!</strong>  {{ Session::get('message') }}
</div>

@elseif(Session::has('warning'))

<div class="notice notice-warning">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong><i class="glyphicon glyphicon-info-sign"></i> Note Carefully!</strong>  <span class="blck">{{ Session::get('warning') }}</span> <a href="{{URL::to('confirm-order')}}">Click here to complete order!</a>
</div>


@elseif(Session::has('eror'))

<div class="notice notice-danger">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong><i class="glyphicon glyphicon-warning-sign"></i> Registration failed!!!</strong>  
	@if($errors->has())
		<div id="form-errors2">
			<p>The following errors have occurred:</p>

			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div><!-- end form-errors -->
		@endif
	</div>
@elseif(Session::has('complete'))


 <div class="notice notice-success blck">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<strong class="text-center"><h1><b> Success! Payment complete</b></h1></strong> </strong> <br>
    <img src="../public/img/ok.png" class=" img-responsive col-md-offset-3">
    <h4 class="text-center blck"> {{ Session::get('complete') }}
    </h4>
    <p class="text-center blck"> We'll send you a confirmation email once your phone has been unlocked. </p>
  	<p class="text-center blck">For checking your order status, please use IMEI used for the order.</p>
  	<p class="text-center blck"><a href="{{URL::to('/')}}">Return home </a>  or <a href="{{URL::to('order-status')}}">check order status</a></p>
    </div>


@endif
