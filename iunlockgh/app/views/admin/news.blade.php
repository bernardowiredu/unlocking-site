@extends('layout.admin')



@section('sidebar')

<div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
          <br>
            <li ><a href="{{URL::to('admin/dashboard')}}"><i class="glyphicon glyphicon-dashboard blue"></i> Dashboard <span class="sr-only">(current)</span></a></li>
            <li><a href="{{URL::to('admin/users')}}"><i class="glyphicon glyphicon-user blue"></i> Registered users</a></li>
            <li><a href="{{URL::to('admin/messages')}}"><i class="glyphicon glyphicon-comment blue"></i> Send Messages</a></li>
            <li><a href="{{URL::to('admin/order')}}"><i class="glyphicon glyphicon-folder-open blue"></i> Order history</a></li>
            <li><a href="{{URL::to('admin/payments')}}"><i class="glyphicon glyphicon-credit-card blue"></i> Payments</a></li>
            <li><a href="{{URL::to('admin/unlock')}}"><i class=" glyphicon glyphicon-question-sign blue"></i> Unlock request</a></li>
            <li><a href="{{URL::to('admin/categorys')}}"><i class="  glyphicon glyphicon-pencil blue"></i> Add products</a></li>
            <li><a href="{{URL::to('admin/phones')}}"><i class=" glyphicon glyphicon-phone blue"></i> Phones</a></li>
            <li><a href="{{URL::to('admin/networks')}}"><i class=" glyphicon glyphicon-signal blue"></i> Networks</a></li>
            <li><a href="{{URL::to('report')}}"><i class=" glyphicon glyphicon-send blue"></i> Inbox</a></li>
            <li class="active"><a href="{{URL::to('admin/news')}}"><i class="glyphicon glyphicon-question-sign blue"></i> News</a></li>
            <li><a href="{{URL::to('FAQs')}}"><i class="glyphicon glyphicon-question-sign blue"></i> FAQs</a></li>
          </ul>blue
          	<br>
          	</div>
@stop


			@section('content')

			@include('common.notification')


			{{Form::open(array('url'=>'admin/news', 'method'=>'POST'))}}

			<label>Enter News Update<i class="text-danger"> **</i></label>
			<textarea cols="10" rows="15" class="form-control" name="message" placeholder="Enter news update" required></textarea>
			  <input type="hidden" class="form-control" name="date" id="date" value="{{date("Y-m-d")}}">
			<p></p>

			<button class="btn btn-primary">Post News Update</button>

			{{Form::close()}}
			


			@stop