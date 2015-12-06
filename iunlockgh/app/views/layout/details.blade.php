<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Navbar Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
     <link href="../css/bootstrap.css" rel="stylesheet">
     <!-- <link href='https://fonts.googleapis.com/css?family=Oswald:300,400' rel='stylesheet' type='text/css'>
    --> <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
      
        <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300' rel='stylesheet' type='text/css'>
   <link href="../css/notice.css" rel="stylesheet">
    <!-- Custom styles for this template -->
     <link href="../css/navbar.css" rel="stylesheet">
     <link href="../css/sticky-footer-navbar.css" rel="stylesheet">
      <link href="../css/breakingNews.css" rel="stylesheet">
      <link href="../css/animations.css" rel="stylesheet">
      <link href="../css/font-awesome.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class="col-md-6 col-md-offset-3">
    <div class="well mb">

      <h4 class="text-center yellow"> ODRER WITH IMEI {{$payment->imei}}</h4>

    </div>
          <!-- <input type="text" class="form-controller" placeholder="Search for order by entering your IMEI eg.895876758746565"><span><button class="btn btn-info">search</button></span>
          <br> -->

    <div class="well mg ">
      <table class="table table-bordered mf">
      <tbody>
        <tr>
          <td>
            Phone Model
          </td>
          <td>
          <img src="{{$payment->image}}" width="80" height="170">
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
        <tr>
          <td>
            Order Contact
          </td>

          <td>
           {{$payment->telephone}}
            </td>
        </tr>
        <tr>
          <td>
            Delivery Time
          </td>
          <td>
             {{$payment->delivery_time}}
            </td>
        </tr>
        <tr>
          <td>
           Created At
          </td>
          <td>
           {{$payment->created_at}}
            </td>
        </tr>
        <tr>
          <td class="rd">
           Order Status
          </td>
          <td class="rd text-center">
            Unlocked
            </td>
        </tr>
    </tbody>
    </table>

     <small class="text-muted">Copyright &copy; 2013-{{date("Y")}} Perfectunlockgh.com All rights reserved.</small>
      
  </div>
  </div>
  </body>
  </html>


  <!-- <p>Phone Model: BlackberryZ10</p>
      <p>Network Locked To: BlackberryZ10</p>
      <p>Unlocking Price: BlackberryZ10</p>
      <p>Phone IMEI: 33349490940494</p>
      <p>Order Contact: BlackberryZ10</p>
      <p>Delivery Time: BlackberryZ10</p>
      <p>Created At: BlackberryZ10</p>
      <p>Order Status : Unlocked</p> -->