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
            <li><a href="{{URL::to('news')}}"><i class="glyphicon glyphicon-question-sign blue"></i> News</a></li>
            <li><a href="{{URL::to('FAQs')}}"><i class="glyphicon glyphicon-question-sign blue"></i> FAQs</a></li>
          </ul>
          <br>
          </div>
@stop


@section('header')

<img src="../img/mobile_">

@stop


@section('content')

 @include('common.notification')

  <div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs nav-justified well well-sm" role="tablist">

    <li role="presentation" class="active"><a class="yellow"  href="#home" aria-controls="home" role="tab" data-toggle="tab">iPhone</a></li>
    <li role="presentation"><a class="yellow" href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Samsung</li>
    <li role="presentation"><a class="yellow" href="#messages" aria-controls="messages" role="tab" data-toggle="tab">HTC</a></li>
    <li role="presentation" class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
      Others <span class="caret"></span>
    </a>
    <ul class="dropdown-menu" role="menu">
    <li role="presentation"><a class="yellow" href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Blackberry</a></li>
    <li role="presentation"><a class="yellow" href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Nokia</a></li>
    <li role="presentation"><a class="yellow" href="#messages" aria-controls="messages" role="tab" data-toggle="tab">LG</a></li>
    <li role="presentation"><a class="yellow" href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Huawei</a></li>
    <li role="presentation"><a class="yellow" href="#messages" aria-controls="messages" role="tab" data-toggle="tab">ZTE</a></li>
    <li role="presentation"><a class="yellow" href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Sony</a></li>
    <li role="presentation"><a class="yellow" href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Motorola</a></li>
    </ul>
  </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
   
    <h4 class="jbt" >Completed orders</h4>
   
	<div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr class="panel panel-success green">
                  <th>#</th>
                  <th>Product Name</th>
                  <th>description</th>
                  <th>Reasons</th>
                  <!-- <th>Header</th>
                  <th>Header</th> -->
                  <th><i class="glyphicon glyphicon-cog jbt"></i> Action</th>
                </tr>
              </thead>
              @foreach($products as $product)
              <tbody>
                <tr>
                  <td>{{$product->id}}</td>
                  <td>{{$product->product_name}}</td>
                  <td>{{$product->description}}</td>
                  <td>{{$product->availiability}}</td>
                  <!-- <td>dolor</td>
				  <td>dolor</td> -->
                  <td><button class="btn btn-small btn-default" onclick=" return ConfirmDelete('yes', 'no')"><i class=" glyphicon glyphicon-trash"></i></button></td>
                </tr>
                </tbody>
                @endforeach
              <tfoot>
              	
              </tfoot>
            </table>
          </div>	
    </div>
    <div role="tabpanel" class="tab-pane" id="profile">
   	<br>
    No history yet
     <br><br>
    </div>
    <div role="tabpanel" class="tab-pane" id="messages">
    	
    </div>
    <div role="tabpanel" class="tab-pane" id="settings">
    	
    </div>
  </div>

</div>
<br>

@stop