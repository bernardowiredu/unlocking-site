@extends('layout.products')


@section('header')
<h1 class="text-center uptest">search results for "{{$keyword}}"</h1>

@stop



@section('content')
<br>
<div class="nav">
<div class="well well-sms mf">
<h2 class="text-center blck txt-shadow"><img src="../public/img/zoom_out.png"> Search result(s) for "<b>{{$keyword}}</b>"</h2>
</div>
@foreach($products as $product)
<div class="col-xs-6 col-md-3 ">
 <a href="#" class="thumbnail mf">
      <img src="img/iphone6-plus.jpg" alt="product" width="100" height="70">
    </a>
    <div class="caption me2">
    <p class="text-center"><a class="whyt" href="{{URL::to('product/' .$product->id)}}"><spans>{{$product->product_name}}</span></a></p>
   </div>
<p></p>
</div>

@endforeach
</div>
@stop