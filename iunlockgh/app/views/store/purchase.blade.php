<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css">
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- <link href='https://fonts.googleapis.com/css?family=Oswald:300,400' rel='stylesheet' type='text/css'>
     --><!-- Bootstrap core CSS -->
   
     <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
   
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>Gevey Store</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
     <link href="../css/bootstrap.css" rel="stylesheet">
     <link href="../css/coupon.css" rel="stylesheet">
      <link href="../css/notice.css" rel="stylesheet">
</head>
<body>
<div class="container">

   <!--  <div class="row"><h1 class="text-center blck2">RSIM 10</h1>
        <p class="text-center text-primary ">continue and complete making your order</p>
    </div>
 -->
 <br>
	<div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default coupon">
              <div class="panel-heading" id="head">
                <div class="panel-title" id="title">
                    <img src="">
                    <span class="hidden-xs">PerfectUnlockgh</span>
                    <span class="visible-xs">PerfectUnlockgh</span>
                </div>
              </div>
              <div class="panel-body">
                <img src="../img/xsim.png" class="coupon-img img-rounded">
                <div class="col-md-9">
                <ul class="items">
                <h4 class="text-primary"><strong>Features</strong></h4>
                        <li>Supports all brands of iPhone's</li>
                        <li>Supports ios verison 8.4.x - 9.0.2.</li>
                        <li>Supports 2G,3G,4G and CDMA</li>
                        <li>App supportive</li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <div class="offer">
                        <span class="usd"><sup>GH₵</sup></span>
                        <span class="number">75</span>
                       <!--  <span class="cents"><sup>99</sup></span> -->
                    </div>
                </div>
                <div class="col-md-12">

                @include('common.notification')

                {{Form::open(array('url'=>'gevey', 'method'=>'POST'))}}
                <h4>PLACE ORDER</h4>
                <input type="text" class="form-control" placeholder="Enter Enter your mobile number" name="telephone">

                <P></P>
                <select class="form-control" name="quantity"> 
                    <option>Select quanity needed</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>

                </select>
                <input type="hidden" name="gevey_name" value="RSIM 10">
              
                <h4 class=" red text-center">Call 0545343660 or 0249072639 when you not contacted automatically within 15 minutes. </h4>
                    <p class="disclosure">Using Genuine Oil Filter and 
                    multigrade oil up to vehicle specification. Lube as 
                    necessary. Ester Oil or Synthetic available at additional 
                    cost. Excludes hazardous waste fee, tax and shop supplies, 
                    where applicable. Offer not valid with previous charges or 
                    with any other offers or specials. Customer must offer at 
                    time of write-up. No cash value.</p>
                     <p class="text-center"><a href=""> Download how to fix gevey</a></p>
                </div>

              </div>
              <div class="panel-footer">
                <div class="coupon-code">
                    Availiablity
                    <span class="print">
                        <button class="btn btn-primary"><i class="fa fa-credit-card"></i> Place order</button> 
                    </span>
                </div>
                <div class="green">In stock</div>
              </div>
            </div>
    	</div>
    </div>
    {{Form::close()}}
   
</div>
</body>
>