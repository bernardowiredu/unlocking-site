@extends('layout.dashboard')


@section('sidebar')

<div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
          <br>
            <li><a href="{{URL::to('dashboard')}}"><i class="glyphicon glyphicon-dashboard blue"></i> Dashboard <span class="sr-only">(current)</span></a></li>
            <li><a href="{{URL::to('editprofile')}}"><i class="glyphicon glyphicon-user blue"></i> Edit profile</a></li>
            <li><a href="{{URL::to('messages')}}"><i class="glyphicon glyphicon-comment blue"></i> Messages <sup><span class="badge"> 3</span></sup></a></li>
            <li><a href="{{URL::to('order-history')}}"><i class="glyphicon glyphicon-folder-open blue"></i> Order history</a></li>
            <li><a href="{{URL::to('payments')}}"><i class="glyphicon glyphicon-credit-card blue"></i> Add funds</a></li>
            <li><a href="{{URL::to('unlock-request')}}"><i class="glyphicon glyphicon-phone blue"></i> Unlock request</a></li>
            <li><a href="{{URL::to('track-order')}}"><i class=" glyphicon glyphicon-search blue"></i> Track order</a></li>
            <li class="active"><a href="{{URL::to('report')}}"><i class=" glyphicon glyphicon-send blue"></i> Reports</a></li>
            <li><a href="{{URL::to('FAQs')}}"><i class="glyphicon glyphicon-question-sign blue"></i> FAQs</a></li>
          </ul>
          <br>
        </div>

@stop


@section('header')

<img src="../public/img/support.png"><span class=""> Support</span> 


@stop



@section('content')
<div class="col-sm-5 col-md-5 well well-sm away mc">
<div class="page-header">
<h3 class="txt-shadow">Contact us</h3>
</div>
<p>For customer service please call us: <b>0501366026</b>,
<b>0244072639</b></p>
<br>
<p>Alternatively, you can contact customer service by email.</p>
<hr>
<p> For order related inquiries, please call our helpline <b>0503214360</b> for assistance .</p>
</div>
<p></p>
<div class="col-sm-7 col-md-6 well well-lg ny blck">

@include('common.notification')


<h4 class=""><b>Send a report to our customer service</b></h4>
{{Form::open(array('url'=>'contact', 'method'=>'POST'))}}
<label class="blck">Enter your email address</label>
<input type="text" class="form-control" name="email_address" placeholder="eg. james@gmail.com" required>
<p></p>

<input type="hidden" name="name" value="{{Auth::user()->username}}">

<label class="blck">Enter report title</label>
<input type="text" class="form-control"  name="title" placeholder="eg. I have not recieved my unlocking code" required>
<p></p>
<label class="blck">Select Report Type</label>
<select class="form-control" name="type">
   <option>Delay in unlock code</option>
   <option>Cant unlock my phone </option>
   <option>Unlocking time exceeded</option>
   <option>Cant find my order</option>
   <option>Need help on unlocking phone</option>
   <option>Cant make payment</option>
   <option>other(Explain in detail)</option>
  
</select>
<p></p>

<label class="blck">Enter report description<i class="text-danger"> **</i></label>
<textarea class="form-control" cols="3" rows="10" name="description" placeholder="Write Report details"></textarea>
<p></p>

<p><button class="btn btn-warning"><i class="glyphicon glyphicon-send"></i> Send Report</button></p>
{{Form::close()}}
<br><br>
</div>


@stop