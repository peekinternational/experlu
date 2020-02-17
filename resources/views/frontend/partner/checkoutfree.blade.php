@extends('layouts.app')
<style>
  .nav>li{
    display: contents !important;
  }
  .pricing_area{
    margin-top: 9rem !important;
    background-color: white;
    padding-top: 5rem;
    padding-bottom: 5rem;
  }
  .pricing_area .row {
    display: -ms-flexbox; /* IE10 */
    display: flex;
    -ms-flex-wrap: wrap; /* IE10 */
    flex-wrap: wrap;
    margin: 0 -16px;
  }

  .pricing_area .col-25 {
    -ms-flex: 25%; /* IE10 */
    flex: 25%;
  }

  .pricing_area .col-50 {
    -ms-flex: 50%; /* IE10 */
    flex: 50%;
  }

  .pricing_area .col-75 {
    -ms-flex: 75%; /* IE10 */
    flex: 75%;
  }

  .pricing_area .col-25,
  .pricing_area .col-50,
  .pricing_area .col-75 {
    padding: 0 16px;
  }

  .pricing_area .container {
    background-color: #f2f2f2;
  }

  .pricing_area input[type=text] {
    width: 100%;
    margin-bottom: 20px;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 3px;
  }

  .pricing_area label {
    margin-bottom: 10px;
    display: block;
  }

  .pricing_area .icon-container {
    margin-bottom: 20px;
    padding: 7px 0;
    font-size: 24px;
  }

  .pricing_area .btn {
    background-color: #4CAF50;
    color: white;
    padding: 12px;
    margin: 10px 0;
    border: none;
    width: 100%;
    border-radius: 3px;
    cursor: pointer;
    font-size: 17px;
  }

  .pricing_area .btn:hover {
    background-color: #45a049;
  }

  .pricing_area span.price {
    float: right;
    color: grey;
  }
  .cart-items .cart-items-body .items-list {
    position: relative;
  }
  .cart-item {
      border-bottom: 1px dotted #e6e6e6;
  }
  .cart-item .left-info {
      float: left;
      font-size: 15px;
      line-height: 21px;
  }
  .cart-item .left-info .image {
      -webkit-box-sizing: content-box;
      box-sizing: content-box;
      max-height: 100px;
      max-width: 100px;
      float: left;
      display: block;
  }
  .cart-item .left-info .image, .mgr-3 {
      margin-right: 1rem!important;
  }
  .cart-item .left-info .name {
      color: #333;
      font-size: 1.25rem;
      font-weight: 600;
      line-height: 25px;
      font-style: normal;
      font-family: "Open Sans",sans-serif;
      text-overflow: ellipsis;
      width: 240px;
      overflow: hidden;
  }
  .cart-item .right-info .price {
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      margin-top: 2px;
  }
  .cart-item .right-info .price .total {
      color: #333;
      font-size: 1.1rem;
      font-weight: 600;
      line-height: 1.6;
      font-style: normal;
      font-family: "Open Sans",sans-serif;
      text-align: right;
      margin-top: -5px;
      -webkit-box-flex: 1;
      -ms-flex: 1;
      flex: 1;
  }
  .cart-item{
    background: white;
        margin-top: 15px;
        padding: 15px;
  }
  /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (and change the direction - make the "cart" column go on top) */
  @media (max-width: 800px) {
    .pricing_area .row {
      flex-direction: column-reverse;
    }
    .pricing_area .col-25 {
      margin-bottom: 20px;
    }
  }
  .product-table{
    background-color: #ffffff;
    margin-top: 2rem;
    border-radius: 4px;
  }
</style>
@section('content')
<div class="pricing_area">
  <div class="container">
    <!-- <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="table-responsive">
          <table class="table table-hover product-table" border="1px">
            <thead>
              <tr>
                <th></th>
                <th>Title</th>
                <th style="text-align: right;">Price</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <img alt="" class="image" data-src="{{asset('frontend-assets/images/job_logo.PNG')}}" src="{{asset('frontend-assets/images/job_logo.PNG')}}" lazy="loaded">
                </td>
                <td>
                  <p>Title</p>
                </td>
                <td align="right">
                  <p>30$</p>
                </td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="3" align="right"><strong>Total: 50$</strong></td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div> -->
    <h1 class="text-center">BASIC USER MEMBERSHIP</h1>
    <div class="row">
      <div class="col-75">
        <div class="container">
          @if(session()->has('error'))
          <div class="row">
            <div class="alert alert-warning">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
              <strong>Message:</strong>{{session()->get('error')}}
            </div>
          </div>
          @endif
          <form action="{!!route('addmoney.stripefree')!!}" id="paymentForm" method="post">
            {{csrf_field()}}
            <div class="row">
              <div class="col-50">
                <h3>Billing Address</h3>
                <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                <input type="text" id="fname" name="fullname" placeholder="John M. Doe" required>
                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                <input type="text" id="email" name="email" placeholder="john@example.com" required>
                <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                <input type="text" id="adr" name="address" placeholder="542 W. 15th Street" required>
                <label for="city"><i class="fa fa-institution"></i> City</label required>
                <input type="text" id="city" name="city" placeholder="New York">

                <div class="row">
                  <div class="col-50">
                    <label for="state">State</label>
                    <input type="text" id="state" name="state" placeholder="NY" required>
                  </div>
                  <div class="col-50">
                    <label for="zip">Zip</label>
                    <input type="text" id="zip" name="zip" placeholder="10001" required>
                  </div>
                </div>
              </div>

              <div class="col-50">
                <h3>Payment</h3>
                <label for="fname">Accepted Cards</label>
                <div class="icon-container">
                  <i class="fa fa-cc-visa" style="color:navy;"></i>
                  <i class="fa fa-cc-amex" style="color:blue;"></i>
                  <i class="fa fa-cc-mastercard" style="color:red;"></i>
                  <i class="fa fa-cc-discover" style="color:orange;"></i>
                </div>
                <label for="cname">Name on Card</label>
                <input type="text" id="name_on_card" name="cardname" placeholder="John More Doe" required>
                <label for="ccnum">Credit card number</label>
                <input type="text" id="card_number" name="cardnumber" size='20' placeholder="1111222233334444" required>
                <label for="expmonth">Exp Month</label>
                <input type="text" id="expiry_month" name="expmonth" size='4' placeholder="MM" required>

                <div class="row">
                  <div class="col-50">
                    <label for="expyear">Exp Year</label>
                    <input type="text" id="expiry_year" name="expyear" size='4' placeholder="2020" required>
                  </div>
                  <div class="col-50">
                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" name="cvv" size='3' placeholder="352" required>
                  </div>
                </div>
              </div>

            </div>
            <label>
              <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
            </label>
            <input type="submit" value="Continue to checkout" class="btn submit_btn">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script>
  $('#card_number').mask('0000 0000 0000 0000');
</script>
@endsection
