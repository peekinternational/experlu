@extends('layouts.app')

<script src="https://js.stripe.com/v3"></script>
@section('content')

<div class="pricing_area">
	<div class="container">
		<div class="row">

				<!-- area section title-->
				<div class="col-md-12">

					<div class="section-title  t_center">
						<!-- title -->
						<h2>Choose <span>Your Plan</span></h2>
						<!-- TEXT -->
					</div>
				</div>
			</div>
			<div id="individual_pkg" class="row">
				<!-- single pricing-->

         <div class="col-md-offset-2 col-md-4 col-sm-6 col-xs-12">
            <div class="single_pricing">
               <div class="pricing_content">
                  <div class="pricing_head">
                     <div class="pricing_img">
                        <img src="{{asset('frontend-assets/images/price.svg')}}" alt="Package">
                     </div>
                     <div class="pricing_title">
                        <h3>BASIC</h3>
                     </div>
                  </div>
                  <div class="pricing_body">
                     <div class="featur">
                        <ul>
                          <li><i class="fa fa-check"></i>30 Days Free Trail</li>
                          <li><i class="fa fa-check"></i>24/7 instant Support</li>
                        </ul>
                     </div>
                     <div class="price_item">
                        <div class="price_item_inner">
                           <div class="price_item_inner_center">
                              <span class="starting">BASIC USER MEMBERSHIP</span>

                              <span class="curencyp">£ </span>

                              <span class="tk">0</span>

                              <span class="slash">/only</span>

                           </div>
                        </div>
                     </div>

                     <div class="pricing_bottom">
                        <div class="order_now">
                           <a href="{{ url('partner/subscribe/1')}}" class="singinp">Order Now</a> 
                          <!--  <button id="checkout-button-plan_GfirdUJvRQqmFS" role="link" class="singinp">Order Now</button>-->
                        </div>
                     </div>

                  </div>
               </div>
            </div>
         </div>

         <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="single_pricing">
               <div class="pricing_content">
                  <div class="pricing_head">
                     <div class="pricing_img">
                        <img src="{{asset('frontend-assets/images/price1.svg')}}" alt="Package">
                     </div>
                     <div class="pricing_title">
                        <h3>Monthly</h3>
                     </div>
                  </div>
                  <div class="pricing_body">
                     <div class="featur">
                        <ul>
                          <li><i class="fa fa-check"></i>100% guaranteed job</li>
                          <li><i class="fa fa-check"></i>One Listing</li>
                          <li><i class="fa fa-check"></i>30 Days Availability</li>
                          <li><i class="fa fa-check"></i>Featured In Search Results</li>
                          <li><i class="fa fa-check"></i>24/7 instant Support</li>
                        </ul>
                     </div>
                     <div class="price_item">
                        <div class="price_item_inner">
                           <div class="price_item_inner_center">
                              <span class="starting">PREMIUM USER MEMBERSHIP</span>

                              <span class="curencyp">£ </span>

                              <span class="tk">85</span>

                              <span class="slash">/only</span>

                           </div>
                        </div>
                     </div>

                     <div class="pricing_bottom">
                        <div class="order_now">
                          <a href="{{ url('partner/subscribe/2')}}" class="singinp">Order Now</a> 
								 <!--  <button id="checkout-button-plan_Ganl7zOOuTfsSt" role="link" class="singinp">Order Now</button>-->
                        </div>
                     </div>

                  </div>
               </div>
            </div>
         </div>

		</div>
	</div>
</div>
@endsection
@section('script')
<script>
var user_id="{{Session::get('faUser')->p_id}}";

(function() {
  var stripe = Stripe('pk_test_aL2Rl72N1ah9z90MKwNvAHHT00WiDY8EN5');

  var checkoutButton = document.getElementById('checkout-button-plan_Ganl7zOOuTfsSt');
  checkoutButton.addEventListener('click', function () {
    // When the customer clicks on the button, redirect
    // them to Checkout.
    stripe.redirectToCheckout({
      items: [{plan: 'plan_Ganl7zOOuTfsSt', quantity: 1}],

      // Do not rely on the redirect to the successUrl for fulfilling
      // purchases, customers may not always reach the success_url after
      // a successful payment.
      // Instead use one of the strategies described in
      // https://stripe.com/docs/payments/checkout/fulfillment
      successUrl: 'https://www.experlu.com/success1?id='+user_id,
      cancelUrl: 'https://www.experlu.com/canceled',
    })
    .then(function (result) {
      if (result.error) {
        // If `redirectToCheckout` fails due to a browser or network
        // error, display the localized error message to your customer.
        var displayError = document.getElementById('error-message');
        displayError.textContent = result.error.message;
      }
    });
  });
})();
</script>

<script>
(function() {
  var stripe = Stripe('pk_test_aL2Rl72N1ah9z90MKwNvAHHT00WiDY8EN5');

  var checkoutButton = document.getElementById('checkout-button-plan_GfirdUJvRQqmFS');
  checkoutButton.addEventListener('click', function () {
    // When the customer clicks on the button, redirect
    // them to Checkout.
    stripe.redirectToCheckout({
      items: [{plan: 'plan_GfirdUJvRQqmFS', quantity: 1}],

      // Do not rely on the redirect to the successUrl for fulfilling
      // purchases, customers may not always reach the success_url after
      // a successful payment.
      // Instead use one of the strategies described in
      // https://stripe.com/docs/payments/checkout/fulfillment
      successUrl: 'https://www.experlu.com/success2?id='+user_id,
      cancelUrl: 'https://www.experlu.com/canceled',
    })
    .then(function (result) {
      if (result.error) {
        // If `redirectToCheckout` fails due to a browser or network
        // error, display the localized error message to your customer.
        var displayError = document.getElementById('error-message');
        displayError.textContent = result.error.message;
      }
    });
  });
})();
</script>
@endsection
