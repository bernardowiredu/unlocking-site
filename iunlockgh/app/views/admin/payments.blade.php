@extends('layout.admin')


@section('sidebar')

<div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
          <br>
            <li ><a href="{{URL::to('admin/dashboard')}}"><i class="glyphicon glyphicon-dashboard blue"></i> Dashboard <span class="sr-only">(current)</span></a></li>
            <li><a href="{{URL::to('admin/users')}}"><i class="glyphicon glyphicon-user blue"></i> Registered users</a></li>
            <li><a href="{{URL::to('admin/messages')}}"><i class="glyphicon glyphicon-comment blue"></i> Send Messages</a></li>
            <li><a href="{{URL::to('admin/order')}}"><i class="glyphicon glyphicon-folder-open blue"></i> Order history</a></li>
            <li class="active"><a href="{{URL::to('admin/payments')}}"><i class="glyphicon glyphicon-credit-card blue"></i> Payments</a></li>
            <li><a href="{{URL::to('admin/unlock')}}"><i class=" glyphicon glyphicon-question-sign blue"></i> Unlock request</a></li>
            <li><a href="{{URL::to('admin/categorys')}}"><i class="  glyphicon glyphicon-pencil blue"></i> Add products</a></li>
            <li><a href="{{URL::to('admin/phones')}}"><i class=" glyphicon glyphicon-phone blue"></i> Phones</a></li>
            <li><a href="{{URL::to('admin/networks')}}"><i class=" glyphicon glyphicon-signal blue"></i> Networks</a></li>
            <li><a href="{{URL::to('report')}}"><i class=" glyphicon glyphicon-send blue"></i> Inbox</a></li>
            <li><a href="{{URL::to('news')}}"><i class="glyphicon glyphicon-question-sign blue"></i> News</a></li>
            <li><a href="{{URL::to('FAQs')}}"><i class="glyphicon glyphicon-question-sign blue"></i> FAQs</a></li>
          </ul>
          <br>
          </div>
@stop

@section('header')

<img src="../img/pounds.png"> Payments

@stop



@section('content')

 @include('common.notification')

  <div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs nav-justified well well-sm" role="tablist">
    <li role="presentation" class="active"><a class="yellow"  href="#home" aria-controls="home" role="tab" data-toggle="tab">Completed orders <span class="label label-success"> 23</span></a></li>
    <li role="presentation"><a class="yellow" href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Cancelled orders <span class="label label-danger"> 8 </span></a></li>
    <li role="presentation"><a class="yellow" href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Pending Orders <span class="label label-info"> 5 </span></a></a></li>
    <li role="presentation"><a class="yellow" href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
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
                  <th>Header</th>
                  <th>Header</th>
                  <th>Header</th>
                  <th>Header</th>
                  <th>Header</th>
                  <th>Header</th>
                  <th>Header</th>
                  <th><i class="glyphicon glyphicon-cog jbt"></i> Action</th>
                </tr>
              </thead>
              @foreach($payments as $payment)
              <tbody>
                <tr>
                  <td>{{$payment->phone_model}}</td>
                  <td>{{$payment->network_name}}</td>
                  <td>{{$payment->price}}</td>
                  <td>{{$payment->imei}}</td>
                  <td>{{$payment->telephone}}</td>
				          <td>{{$payment->delivery_time}}</td>
                  <td class="text-info"><b>processing<b></td>
                  <td>

                  @if($payment->generated_code != $payment->verified_code)

                  <span class="text-danger"><b>Not Verified</b></span>

                  @else

                  <span class="text-success"><b>Verified</b></span>


                  @endif


                  </td>
                  <td><button class="btn btn-small btn-default" onclick=" return ConfirmDelete('yes', 'no')"><i class=" glyphicon glyphicon-trash"></i></button></td>
                </tr>
               @endforeach
              </tbody>
              <tfoot>
              	
              </tfoot>
            </table>
          </div>
           <div class="pagination pull-right">
          <ul>
            <li>{{ $payments->links()}}</li>
          </ul>
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