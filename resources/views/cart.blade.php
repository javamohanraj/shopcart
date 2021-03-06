@extends('layouts.app')
@if (Auth::guest())
@section('title', 'Guest')
@else
@section('title', Auth::user()->name."'s Cart")
@endif
@section('content')

<div class="row">
	@if($Cart->count() == 0)
	<div class="col-md-4 text-center col-sm-6 col-xs-6">
	    <div class="thumbnail product-box">	        
	        <div class="caption">
	        	<h3>Empty Cart</h3>	
        	</div>
	    </div>
	</div>    
	@else	    
	@foreach ($Cart as $Products)
	<div class="col-md-4 text-center col-sm-6 col-xs-6">
	    <div class="thumbnail product-box">
	        <img src="assets/img/dummyimg.png" alt="" />
	        <div class="caption">
	            <h3><a href="#">{{$Products->product_name}} </a></h3>
	            <img src="{{asset('img/').'/'.$Products->id.'.jpg'}}" alt="" />
	            <p>Price : <strong>$ {{$Products->price}}</strong>  </p>	
             	<p>Quantity : <strong>{{$Products->quantity}} Nos</strong>  </p>	            	          
             	<div class="btn-group mr-2" role="group" aria-label="Second group">
				    <a href="{{ url('cart/minus', $Products->id) }}" class="btn btn-danger" role="button">-</a>
				    <a href="{{ url('cart/plus', $Products->id) }}" class="btn btn-success" role="button">+</a>			    
			  	</div>
	            <p><a href="{{ url('cart/delete', $Products->id) }}" class="btn btn-warning" role="button">Remove</a></p>
	        </div>
	    </div>
	</div>
	@endforeach
	@endif
</div>
<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4">
 		<a target="_blank" href="{{ url('checkout', Auth::user()->id) }}" class="btn btn-primary" role="button">Checkout</a>
 	</div>
 	<div class="col-md-4"></div>
</div>
@endsection
