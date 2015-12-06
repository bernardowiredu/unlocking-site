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
            <li class="active"><a href="{{URL::to('order-history')}}"><i class="glyphicon glyphicon-folder-open blue"></i> Order history</a></li>
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

<img src="../public/img/folder_modified.png"></i> Order history

@stop



@section('content')

 @include('common.notification')

  <div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs well well-sm mh" role="tablist">
    <li role="presentation" class="active"><a class="yellow"  href="#home" aria-controls="home" role="tab" data-toggle="tab">Completed orders <span class="label label-success"> 23</span></a></li>
    <li role="presentation"><a class="yellow" href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Cancelled orders <span class="label label-danger"> 8 </span></a></li>
    <li role="presentation"><a class="yellow" href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Pending Orders <span class="label label-info"> 5 </span></a></a></li>
    <!-- <li role="presentation"><a class="yellow" href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
  --> </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
   
    <h4 class="jbt">Completed orders</h4>
   
	<div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr class="panel panel-success green">
                  <th>#</th>
                  <th>Header</th>
                  <th>Header</th>
                  <th>Header</th>
                  <th>Header</th>
                  <th>Header</th>
                  <th>Header</th>
                  <th><i class="glyphicon glyphicon-cog jbt"></i> Action</th>
                </tr>
              </thead>
              @foreach($payment as $payment)
              <tbody>
                <tr>
                  <td>{{$payment->product_model}}</td>
                  <td>{{$payment->network_name}}</td>
                  <td>{{$payment->price}}</td>
                  <td>{{$payment->imei}}</td>
                  <td>{{$payment->delivery_time}}</td>
				          <td>{{$payment->telephone}}</td>
                  
                   <td><div class="label label-warning">{{$payment->status}}</div></td>
                
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