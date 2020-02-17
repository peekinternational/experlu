@extends('layouts.app')
@section('content')
<style>
.orange-star {
	color: #FF7814 !important;
}
.grey-star {
    color: #8e8c8c !important;
}
</style>
<section class="we-offer-area text-center bg-gray">
	<div class="container" style="background:white;">
		<div class="row">
			<div class="col-md-12">
				@if(session()->has('message'))
					<div class="row">
						<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
							<strong>Message:</strong>{{session()->get('message')}}
						</div>
					</div>
				@endif
			</div>
		</div>
		<div class="">
			<h4>Email Verified Successfully</h4>
		</div>
	</div>
</section>
@endsection
@section('script')

@endsection
