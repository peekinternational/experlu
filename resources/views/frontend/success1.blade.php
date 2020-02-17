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
		<div class="col-md-12" style="text-align: center;">
			<p><img alt="" src="{{asset('/frontend-assets/images/partner/thankyou.jpg')}}" width="100%" /></p>
			<a href="{{ url('partner/partner_dashboard') }}" class="btn btn-success" style="margin-bottom: 58px;">Dashboard</a>


		</div>
	</div>
</div>
@endsection