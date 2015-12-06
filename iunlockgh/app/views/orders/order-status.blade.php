@extends('layout.main')


@section('header')

<h1 class="text-center">CHECK ORDER STATUS</h1>


@stop




@section('content')
<bR>
<img src="img/folder_modified.png" class="img-responsive">
<h4 class="well mb"><b class="yellow">SEARCH AND RECIEVE ORDER STATUS</b></h4>

You can track the status of your order on real-time filling the form on the left.

If your order has been pending for an unusually long period of time or if you have any questions please don't hesitate to contact us.

*If you have just placed your order, please do not call or email us but click HERE for turnaround times.

*If your order is not found in the system, PLEASE DO NOT WORRY, as your order may have not been added to our system yet. Just contact us at contact@unlockcode4u.com and we will take care of the issue ASAP for you.

<br><br>
<div class="panel panel-inverse">
  <div class="panel-heading ny">
    <h3 class="panel-title blck"><font color="#fff">Search order<span class="pull-right"><i class="glyphicon glyphicon-search"></i></span></h3>
  </div>
  <div class="panel-body mf">
   <h4><b>To check your order status, fill the form below now:</b></h4>

	{{Form::open(array('url'=>'order-status', 'method'=>'GET'))}}

<label class="blck">Enter a valid IMEI number<i class="text-danger"> **</i></label>
<input type="text" class="form-control" placeholder="Enter your IMEI" name="keyword" required>
<p></p>

<!-- <p><input type="checkbox" required> I have read and accepted terms and conditions</p> -->
<br>
<p><button class="btn btn-warning"><i class="glyphicon glyphicon-search"></i> Check your order status</button></p>
<br>
{{Form::close()}}
  </div>
</div>


<div class="well mf ">
@if($read > 0)
@foreach($payments as $payment)

<h3 class="yellow text-center"><b>Your order IMEI {{$payment->imei}} </b></h3>
<table class="table table-bordered mf">
      <tbody>
        <tr>
          <td>
            Phone Model
          </td>
          <td>
        <!--   <img src="../img/iphone6-plus.jpg" width="90" height="170"> -->
              {{$payment->product_model}}
            </td>
        </tr>
        <tr>
          <td>
           Network Locked To
          </td>
          <td>
           {{$payment->network_name}}
            </td>
        </tr>
        <tr>
          <td>
           Unlocking Price
          </td>
          <td>
           GH₵ {{$payment->price}}
            </td>
        </tr>
        <tr>
          <td>
           Phone IMEI
          </td>
          <td>
            {{$payment->imei}}
            </td>
        </tr>
       <!--  <tr>
          <td>
            Order Contact
          </td>

          <td>
           {{$payment->telephone}}
            </td>
        </tr> -->
        <tr>
          <td>
            Delivery Time
          </td>
          <td>
             {{$payment->delivery_time}}
            </td>
        </tr>
       <!--  <tr>
          <td>
           Created At
          </td>
          <td>
           {{$payment->date}} {{$payment->time}}
            </td>
        </tr> -->
        <tr>
          <td>
           Order Status
          </td>
          <td class="rd text-center">
            Unlocked
            </td>
        </tr>
       <!--  <tr>
          <td>
            Phone Model: BlackberryZ10
          </td>
          <td>
            <button class="btn btn-success"><i class="glyphicon glyphicon-share-alt"></i> Return Home</button>
            </td>
        </tr> -->
        <p class="text-center"><a href="{{URL::to('order-details/'. $payment->id)}}"> Click here to view full details</a></p>
        @endforeach
    </tbody>
    </table>
    @else

    No Order is found with such IMEI? Please enter the correct IMEI Number
    @endif
</div>



<!-- <div class="well line3 text-center ">
@foreach($payments as $payment)
<h3 class="yellow text-center"><b>Your order IMEI {{$payment->imei}} </b></h3>
<h3><b>Your Order status is </b></h3>
<p>Product name: {{$payment->product_model}} </p>
<p>Network locked to: {{$payment->network_name}}</p>
<p>Delivery Time: {{$payment->delivery_time}}</p>
<p>Order at: {{$payment->created_at}}</p>
<p>Delivery Status: <i class="fa fa-exclamation-triangle red"></i> Processing</p>
<p>Delivery Method: <i class="glyphicon glyphicon-envelope blue"></i> Email </p><br>
 
<h4 class="yellow">NB: You will be automatically notified when your phone has been unlocked</h4>
@endforeach
</div> -->
@stop