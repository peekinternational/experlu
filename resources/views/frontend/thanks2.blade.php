@extends('layouts.app')
@section('content')
<style>
	body{
		background-color: #fff;
	}
	.hero{
		display: none;
	}
	p{
		font-size: 20px;
	}
</style>
<div class="container" style="margin-top: 9rem;">
	<div class="row">
		<div class="col-md-12">
			<p><img alt="" src="{{asset('/frontend-assets/images/partner/thankyou.jpg')}}" width="100%" /></p>
			<h3>Thank you your payments is done successfully</h3>
			<p>Click on the link below to get your receipt</p>
			<div class="text-center">
				<a href="{{url($receipt)}}" class="btn btn-primary" style="margin-bottom:30px;">Get Receipt</a>
			</div>
		</div>
	</div>
</div>
@endsection
