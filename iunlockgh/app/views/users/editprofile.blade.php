@extends('layout.dashboard')

@section('sidebar')

<div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
          <br>
            <li><a href="{{URL::to('dashboard')}}"><i class="glyphicon glyphicon-dashboard blue"></i> Dashboard <span class="sr-only">(current)</span></a></li>
            <li class="active"><a href="{{URL::to('editprofile')}}"><i class="glyphicon glyphicon-user blue"></i> Edit profile</a></li>
            <li><a href="{{URL::to('messages')}}"><i class="glyphicon glyphicon-comment blue"></i> Messages <sup><span class="badge"> 3</span></sup></a></li>
            <li><a href="{{URL::to('order-history')}}"><i class="glyphicon glyphicon-folder-open blue"></i> Order history</a></li>
            <li><a href="{{URL::to('payments')}}"><i class="glyphicon glyphicon-credit-card blue"></i> Add funds</a></li>
            <li><a href="{{URL::to('unlock-request')}}"><i class="glyphicon glyphicon-phone blue"></i> Unlock request</a></li>
            <li><a href="{{URL::to('track-order')}}"><i class=" glyphicon glyphicon-search blue"></i> Track order</a></li>
            <li><a href="{{URL::to('report')}}"><i class=" glyphicon glyphicon-send blue"></i> Reports</a></li>
            <li><a href="{{URL::to('FAQs')}}"><i class="glyphicon glyphicon-question-sign blue"></i> FAQs</a></li>
          </ul>
          <br>
        </div>

@stop


@section('header')

<img src="../public/img/edit_profile.png" > Profile

@stop




@section('content')
<div class="">
<form class="form-horizontal">

@include('common.notification')

 <h4 class="yellow move movedown">Change Profile</h4>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label blck">Email</label>
    <div class="col-sm-9">
      <input type="email" class="form-control" id="inputEmail3" value="bernardkissi18@gmail.com" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label blck">Username</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="inputPassword3" value="Testing" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label blck">Phone</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="inputPassword3" value="0503214360" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label blck">Country</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="inputPassword3" value="Ghana" placeholder="Password" disabled>
    </div>
  </div>
 

  <h4 class="yellow move">Change Password</h4>
  <div class="form-group">

    <label for="inputPassword3" class="col-sm-2 control-label blck">Old Password</label>
    <div class="col-sm-9">
      <input type="password" class="form-control" id="inputPassword3"  value="" placeholder="old Password">
    </div>
  </div>
   <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label blck"> Password</label>
    <div class="col-sm-9">
      <input type="password" class="form-control" id="inputPassword3" value="" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label blck"> Password</label>
    <div class="col-sm-9">
      <input type="password" class="form-control" id="inputPassword3" value="" placeholder="Password"><br>
 </div>
  	<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-user"></i> Update profile</button>
    </div>
  </div>
  <br>
</form>
</div>
@stop