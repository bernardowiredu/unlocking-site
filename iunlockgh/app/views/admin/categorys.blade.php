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
            <li class="active"><a href="{{URL::to('admin/categorys')}}"><i class="  glyphicon glyphicon-pencil blue"></i> Add products</a></li>
            <li><a href="{{URL::to('admin/phones')}}"><i class=" glyphicon glyphicon-phone blue"></i> Phones</a></li>
            <li ><a href="{{URL::to('admin/networks')}}"><i class=" glyphicon glyphicon-signal blue"></i> Networks</a></li>
            <li><a href="{{URL::to('report')}}"><i class=" glyphicon glyphicon-send blue"></i> Inbox</a></li>
            <li><a href="{{URL::to('FAQs')}}"><i class="glyphicon glyphicon-question-sign blue"></i> FAQs</a></li>
            <li><a href="{{URL::to('news')}}"><i class="glyphicon glyphicon-question-sign blue"></i> News</a></li>
            <li><a href="{{URL::to('FAQs')}}"><i class="glyphicon glyphicon-question-sign blue"></i> Unlocking sites</a></li>
          </ul>
          <br>
          </div>
@stop

@section('header')

<i class="glyphicon glyphicon-folder-open yellow"></i> Add Products

@stop



@section('content')

@include('common.notification')
<h3>Create Category</h3>
{{Form::open(array('url'=>'category', 'method'=>'POST'))}}
<input type="text" class="form-control" placeholder="create category" name="name"><br>
<button class="btn btn-success"> create category</button>
{{Form::close()}}
<br>

<h3>Add Products</h3>
{{Form::open(array('url'=>'product', 'method'=>'POST'))}}
<select class="form-control" name="category_id">
@foreach($categorys as $category)
<option value="{{$category->id}}">{{$category->name}}</option>
@endforeach
</select>
<input type="text" class="form-control" placeholder="Enter product name" name="product_name">
<textarea col="10" rows="4" class="form-control" placeholder="Enter Product description" name="description"></textarea>
<br>
<!-- <input type="text" class="form-control" placeholder="create category" name="name"><input type="text" class="form-control" placeholder="create category" name="name"> -->
<button class="btn btn-success"> Create Product</button>
{{Form::close()}}
<br>

<h3>Add Country</h3>
{{Form::open(array('url'=>'country', 'method'=>'POST'))}}
<select class="form-control" name="category_id">
@foreach($categorys as $category)
<option value="{{$category->id}}">{{$category->name}}</option>
@endforeach
</select>
<select class="form-control" name="category_name">
@foreach($categorys as $category)
<option value="{{$category->name}}">{{$category->name}}</option>
@endforeach
</select>
<input type='text' class="form-control" placeholder="Enter country" name="country_name"><br>

<button class="btn btn-success">Save country</button>
{{Form::close()}}

<h3>Add Networks</h3>
{{Form::open(array('url'=>'network', 'method'=>'POST'))}}
<select class="form-control" name="category_id">
@foreach($categorys as $category)
<option value="{{$category->id}}">{{$category->name}}</option>
@endforeach
</select>
<select class="form-control" name="country_id">
@foreach($countrys as $country)
<option value="{{$country->id}}">{{$country->country_name}} ------------------- <b>{{$country->category_name}}</b></option>
@endforeach
</select>
<input type="text" class="form-control" placeholder="Enter network name" name="network_name">
<input type="text" class="form-control" placeholder="Enter product price" name="price">
<input type="text" class="form-control" placeholder="Enter delivery time" name="delivery_time">
<!-- <textarea col="10" rows="5" class="form-control" placeholder="Enter Product description" name="description"></textarea> -->
<br>
<!-- <input type="text" class="form-control" placeholder="create category" name="name"><input type="text" class="form-control" placeholder="create category" name="name"> -->
<button class="btn btn-success"> Create Product</button>
{{Form::close()}}
@stop


