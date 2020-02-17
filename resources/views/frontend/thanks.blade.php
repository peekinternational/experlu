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
			<h3>Thank you for your request. Here are the next steps...</h3>

			<p><strong>Step 1-</strong><br> We will be having a brief phone call with you to discuss job in more detail and understand your requirements. </p>

			<p><strong>Step 2-</strong><br> You will receive upto 3 emails with proposals from our Experts. Email will have more information about the Expert interested in working with you and proposed fees. </p>

			<p><strong>Step 3-</strong><br>
				Pick one which is best fit for you and your business and start getting thigs done!
				</p>

			<p>Do keep an eye on your phone and your inbox - we look forward to finding you a perfect Expert! In the meantime if you have any questions, please use chat function on our website or call us on 0203 983 8100 </p>

		</div>
	</div>
</div>
@endsection
