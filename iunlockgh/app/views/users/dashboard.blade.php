@extends('layout.dashboard')

@section('sidebar')

<div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
          <br>
            <li class="active"><a href="{{URL::to('dashboard')}}"><i class="glyphicon glyphicon-dashboard blue"></i> Dashboard <span class="sr-only">(current)</span></a></li>
            <li><a href="{{URL::to('editprofile')}}"><i class="glyphicon glyphicon-user blue"></i> Edit profile</a></li>
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

<img src="../public/img/home.png"><span class="">{{Auth::user()->username}} Dashboard</span> 

@stop


@section('content')


		<div class="row placeholders">
      <div class="animatedParent" data-sequence="500">
            <div class="col-xs-6 col-sm-3 placeholder animated bounceInup" data-id="1">
              <div class="plate blu2">
              <span><i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i> ORDERS</span>
              <h4>30</h4>
              </div>
              <div class="hole blu">
              <!-- <i class="glyphicon glyphicon-chevron-down" aria-hidden="true"></i> -->
              </div>
              <h4><a href="">View</a></h4>
              <span class="text-muted">orders</span>
            </div>

            <div class="col-xs-6 col-sm-3 placeholder animated bounceInup" data-id="1">
                <div class="plate green2">
             <span><i class="glyphicon glyphicon-credit-card" aria-hidden="true"></i> PAYMENTS</span>
             <h4>9</h4>
              </div>
               <div class="hole green">
             <!--  <i class="glyphicon glyphicon-chevron-down" aria-hidden="true"></i> -->
              </div>
              <h4><a href="">View</a></h4>
              <span class="text-muted">payments</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder animated bounceInup" data-id="1">
               <div class="plate rou2">
              <span><i class="glyphicon glyphicon-phone"></i> UNLOCK REQUEST</span>
               <h4>12</h4>
              </div>
               <div class="hole rou">
              <!-- <i class="glyphicon glyphicon-chevron-down" aria-hidden="true"></i> -->
              </div>
              <h4><a href="">View</a></h4>
              <span class="text-muted">requests</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder animated bounceInup" data-id="1">
               <div class="plate voi2">
             <span><i class="glyphicon glyphicon-comment"></i> MESSAGES</span>
              <h4>30</h4>
              </div>
               <div class="hole voi">
              <!-- <i class="glyphicon glyphicon-chevron-down" aria-hidden="true"></i> -->
              </div>
              <h4><a href="">View</a></h4>
              <span class="text-muted">messages</span>
            </div>
          </div>
        </div>

          <h2 class="sub-header">Recent unlocking orders</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Header</th>
                  <th>Header</th>
                  <th>Header</th>
                  <th>Header</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1,001</td>
                  <td>Lorem</td>
                  <td>ipsum</td>
                  <td>dolor</td>
                  <td>sit</td>
                </tr>
                <tr>
                  <td>1,002</td>
                  <td>amet</td>
                  <td>consectetur</td>
                  <td>adipiscing</td>
                  <td>elit</td>
                </tr>
                <tr>
                  <td>1,003</td>
                  <td>Integer</td>
                  <td>nec</td>
                  <td>odio</td>
                  <td>Praesent</td>
                </tr>
                <tr>
                  <td>1,003</td>
                  <td>libero</td>
                  <td>Sed</td>
                  <td>cursus</td>
                  <td>ante</td>
                </tr>
                <tr>
                  <td>1,004</td>
                  <td>dapibus</td>
                  <td>diam</td>
                  <td>Sed</td>
                  <td>nisi</td>
                </tr>
                <tr>
                  <td>1,005</td>
                  <td>Nulla</td>
                  <td>quis</td>
                  <td>sem</td>
                  <td>at</td>
                </tr>
                <tr>
                  <td>1,006</td>
                  <td>nibh</td>
                  <td>elementum</td>
                  <td>imperdiet</td>
                  <td>Duis</td>
                </tr>
                <tr>
                  <td>1,007</td>
                  <td>sagittis</td>
                  <td>ipsum</td>
                  <td>Praesent</td>
                  <td>mauris</td>
                </tr>
                <tr>
                  <td>1,008</td>
                  <td>Fusce</td>
                  <td>nec</td>
                  <td>tellus</td>
                  <td>sed</td>
                </tr>
                <tr>
                  <td>1,009</td>
                  <td>augue</td>
                  <td>semper</td>
                  <td>porta</td>
                  <td>Mauris</td>
                </tr>
                <tr>
                  <td>1,010</td>
                  <td>massa</td>
                  <td>Vestibulum</td>
                  <td>lacinia</td>
                  <td>arcu</td>
                </tr>
                <tr>
                  <td>1,011</td>
                  <td>eget</td>
                  <td>nulla</td>
                  <td>Class</td>
                  <td>aptent</td>
                </tr>
                <tr>
                  <td>1,012</td>
                  <td>taciti</td>
                  <td>sociosqu</td>
                  <td>ad</td>
                  <td>litora</td>
                </tr>
                <tr>
                  <td>1,013</td>
                  <td>torquent</td>
                  <td>per</td>
                  <td>conubia</td>
                  <td>nostra</td>
                </tr>
                <tr>
                  <td>1,014</td>
                  <td>per</td>
                  <td>inceptos</td>
                  <td>himenaeos</td>
                  <td>Curabitur</td>
                </tr>
                <tr>
                  <td>1,015</td>
                  <td>sodales</td>
                  <td>ligula</td>
                  <td>in</td>
                  <td>libero</td>
                </tr>
              </tbody>
            </table>
          </div>



@stop

<script src="../public/js/jquery-1.8.2.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="../public/js/css3-animate.js"></script>