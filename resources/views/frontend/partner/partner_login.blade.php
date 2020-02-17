@extends('layouts.app')
@section('content')
<style>
	body{
		background-color: #fff;
	}
	.hero{
		display: none;
	}
</style>
<?php
   $next = Request::input('next') != '' ? '?next='.Request::input('next') : '';
   ?>
<div class="container" style="margin-top: 9rem;">
	<div class="row">
		<div class="col-md-offset-3 col-md-6 register_col">
				<div class="panel panel-default" style="display:{{ $pageType != 'partner_register' ? 'block' : 'none' }}">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Partner Login </h3>
			 			</div>
			 			<div class="panel-body">
			    		<form action="{{ url('partner_login'.$next) }}" method="post" role="form">
						 {{ csrf_field() }}
							@if(count($errors))
							<div class="form-group">
								<div class="alert alert-danger">
									<ul>
										@foreach ($errors->all() as $error)
											<li>{{$error}}</li>
										@endforeach
									</ul>
								</div>
							</div>
							@endif
							@if(session()->has('message'))
								<div class="row">
									<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
										<strong>Message:</strong>{{session()->get('message')}}
									</div>
								</div>
							@endif


			    			<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<input type="email" name="email" id="email" class="form-control input-sm" value="{{ old('email') }}"  placeholder="Email Address" required>
								</div>
			    				</div>
			    				<div class="col-xs-12 col-sm-12 col-md-12">
			    					<div class="form-group">
			    						<input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password" required >
			    					</div>
			    				</div>
			    				
			    			</div>
							<a href="{{url('/forget-password')}}" >Forget Password</a>
			    			<input type="submit" value="Login" class="btn btn-success btn-block" style="margin-bottom: 20px;">
			    			<a href="{{url('partner_register')}}" class="btn cta-button btn-block">Register</a>
			    		</form>
			    	</div>
	    		</div>

				<div class="panel panel-default" style="display:{{ $pageType == 'partner_register' ? 'block' : 'none' }}">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Partner sign up  </h3>
			 			</div>
			 			<div class="panel-body">
			    		<form action="{{ url('partner_register') }}" method="post" role="form">
						 {{ csrf_field() }}
							@if(count($errors))
								<div class="form-group">
									<div class="alert alert-danger">
										<ul>
											@foreach ($errors->all() as $error)
												<li>{{$error}}</li>
											@endforeach
										</ul>
									</div>
								</div>
							@endif

			    			<div class="row">
			    				<div class="col-xs-12 col-sm-12 col-md-12">
			    					<div class="form-group">
			                <input type="text" name="name" id="name" value="{{ old('name') }}"  class="form-control input-sm" placeholder="First Name">
			    					</div>
			    				</div>
			    				
			    			</div>

			    			<div class="form-group">
			    				<input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control input-sm" placeholder="Email Address">
			    			</div>

			    			<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12">
			    					<div class="form-group">
			    						<input type="number" name="phoneno" value="{{ old('phoneno') }}"  id="phoneno" class="form-control input-sm" min="0" placeholder="Mobile Number">
			    					</div>
			    				</div>
			    				<div class="col-xs-12 col-sm-12 col-md-12">
			    					<div class="form-group">
			    						<input type="password" name="password" onkeyup='checklen()' id="pwd" class="form-control input-sm" placeholder="Password">

										<span id='length'></span>
									</div>
			    				</div>
			    				<div class="col-xs-12 col-sm-12 col-md-12">
			    					<div class="form-group">
			    						<input type="password" name="password_confirmation" id="password_confirmation"  onkeyup='check()' class="form-control input-sm" placeholder="Confirm Password">
										<span id='message'></span>
			    					</div>
			    				</div>
			    			</div>
			    			
			    			<input type="submit" value="Register" class="btn btn-success btn-block" style="margin-bottom: 20px;">
			    			<a href="{{url('partner_login')}}" class="btn cta-button btn-block">Login</a>
			    		</form>
			    	</div>
	    		</div>
			</div>
		</div>
	</div>

	<script>
        var checklen = function()
        {
            if(document.getElementById('pwd').value.length < 6 ) {
                document.getElementById('length').style.color = 'red';
                document.getElementById('length').innerHTML = 'Password is too short';
            } else {
                document.getElementById('length').innerHTML = ' ';
            }
        }
        var check = function()
        {
            if (document.getElementById('pwd').value === document.getElementById('password_confirmation').value)
                {
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').innerHTML = 'Password Match';
            } else {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'Password not matching';
            }
        }

	</script>
@endsection