<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use Validator;
use URL;
use Session;
use Redirect;
use Input;
use App\User;
use Stripe\Error\Card;
use Cartalyst\Stripe\Stripe;
use DB;
class MoneySetupController extends Controller
{
 public function paymentStripe()
 {
 return view('paymentstripe');
 }


// public function postPaymentStripecharge(Request $request)
public function postPaymentStripe(Request $request)
 {
   // dd($request->all());
 $validator = Validator::make($request->all(), [
   'cardname' => 'required',
   'cardnumber' => 'required',
   'expmonth' => 'required',
   'expyear' => 'required',
   'cvv' => 'required',
   'amount' => 'required',
 ]);
 $input = $request->all();
 // dd($input['amount']);
 if ($validator->passes()) {
 $input = array_except($input,array('_token'));
$stripe = \Stripe::setApiKey('sk_test_736e4BO4MrWwgnGDMiVYQ2z000JdtbBfSJ');
 try {
 $token = $stripe->tokens()->create([
 'card' => [
   'number' => $request->get('cardnumber'),
   'exp_month' => $request->get('expmonth'),
   'exp_year' => $request->get('expyear'),
   'cvc' => $request->get('cvv'),
 ],
 ]);
if (!isset($token['id'])) {
	dd($token);
 return redirect()->route('addmoney.paymentstripe');
 }
 $charge = $stripe->charges()->create([
 'card' => $token['id'],
 'currency' => 'gbp',
 'amount' => $input['amount'],
 'description' => 'Quotation Charges',
 ]);

 if($charge['status'] == 'succeeded') {
   $amount = $charge['amount']/100;
   // dd($charge);
   // dd($charge['source']['id']);
   $userId=$request->session()->get('faUser')->p_id;
   $detail['p_id'] = $userId;
   $detail['q_id'] = $request->input('q_id');
   $detail['name'] = $request->input('fullname');
   $detail['card_holder'] = $request->input('cardname');
   $detail['card_brand'] = $charge['source']['brand'];
   $detail['card_number'] = $charge['source']['last4'];
   $detail['exp_month'] = $charge['source']['exp_month'];
   $detail['exp_year'] = $charge['source']['exp_year'];
   $detail['email'] = $request->input('email');
   $detail['address'] = $request->input('address');
   $detail['city'] = $request->input('city');
   $detail['state'] = $request->input('state');
   $detail['zip'] = $request->input('zip');
   $detail['method'] = 'Quotation Charges';
   $detail['payment_type'] = 'Quotation';
   $detail['amount'] = $amount;
   $detail['currency'] = $charge['currency'];
   $detail['trial_period_days'] = $charge['trial_period_days'];
   $detail['main_id'] = $charge['id'];
   $detail['tr_id'] = $charge['balance_transaction'];
   $detail['card_id'] = $charge['source']['id'];
   $receipt =$charge['receipt_url'];
   $detail['link'] = $receipt;
   // dd($detail);
   $input2['card_id'] = $charge['source']['id'];
   $input2['card_holder'] = $request->input('cardname');
   $input2['card_brand'] = $charge['source']['brand'];
   $input2['card_number'] = $charge['source']['last4'];
   $input2['exp_month'] = $charge['source']['exp_month'];
   $input2['exp_year'] = $charge['source']['exp_year'];
   // dd($input2);
   $payment = DB::table('fa_payments')->insertGetID($detail);
   $parnter = DB::table('fa_partner')->where('p_id',$userId)->update($input2);
 // print_r($charge);exit();
 return view('frontend.thanks2',compact('receipt'));

 } else {
	 dd("error");
 \Session::put('error','Money not add in wallet!!');

  //dd($e->getMessage());
 return Redirect::to('partner/checkout');
 }
 } catch (Exception $e) {
 \Session::flash('error',$e->getMessage());
  //dd($e->getMessage());
 return Redirect::to('partner/checkout');
 } catch(\Cartalyst\Stripe\Exception\CardErrorException $e) {
 \Session::flash('error',$e->getMessage());
  //dd($e->getMessage());
 return Redirect::to('partner/checkout');
 //return redirect()->url('partner/checkout');
 } catch(\Cartalyst\Stripe\Exception\MissingParameterException $e) {
 \Session::flash('error',$e->getMessage());
  //dd($e->getMessage());
 return Redirect::to('partner/checkout');
 }
 }
 }





////////// monthly free plan////////////
 public function postPaymentStripefree(Request $request)
 {
   // dd($request->all());
 $validator = Validator::make($request->all(), [
 'cardname' => 'required',
 'cardnumber' => 'required',
 'expmonth' => 'required',
 'expyear' => 'required',
 'cvv' => 'required',
 //'amount' => 'required',
 ]);
 $input = $request->all();
 if ($validator->passes()) {
 $input = array_except($input,array('_token'));
$stripe = \Stripe::setApiKey('sk_test_736e4BO4MrWwgnGDMiVYQ2z000JdtbBfSJ');
//dd($stripe);
 try {
 $token = $stripe->tokens()->create([
 'card' => [
 'number' => $request->get('cardnumber'),
 'exp_month' => $request->get('expmonth'),
 'exp_year' => $request->get('expyear'),
 'cvc' => $request->get('cvv'),
 ],
 ]);
if (!isset($token['id'])) {
  // dd($token);
 return redirect('partner/checkoutfree');
 // return redirect()->route('addmoney.paymentstripe');
 }
 $charge = $stripe->subscription()->create([
 "product" => "prod_GYewlOlNZumeBx",
  "currency"=> "gbp",
  "interval" => "month",
  "interval_count" => "1",
  "usage_type"=> "licensed",
  "billing_scheme"=> "per_unit",
  "nickname" => "Experlu",
  "trial_period_days"=> "30",
  "amount_decimal"=> "0"
 ]);
 if($charge['active'] == true) {
   dd($charge);
   $userId=$request->session()->get('faUser')->p_id;
   $detail['p_id'] = $userId;
   $detail['name'] = $request->input('fullname');
   $detail['email'] = $request->input('email');
   $detail['address'] = $request->input('address');
   $detail['city'] = $request->input('city');
   $detail['state'] = $request->input('state');
   $detail['zip'] = $request->input('zip');
   $detail['method'] = 'BASIC USER MEMBERSHIP';
   $detail['amount'] = $charge['amount'];
   $detail['currency'] = $charge['currency'];
   $detail['trial_period_days'] = $charge['trial_period_days'];
   // dd($detail);
   $payment = DB::table('fa_payments')->insertGetID($detail);
   $patner_detail['payment_status']='1';
   $patner_detail['payment_id']=$payment;
   $partner = DB::table('fa_partner')->where('p_id',$userId)->update($patner_detail);

   $request->session()->flash('message', 'Membership Activated successfully');
 return redirect('/partner/partner_dashboard');
 } else {
	 dd("error");
 \Session::flash('error','Money not add in wallet!!');

  //dd($e->getMessage());
 return Redirect::to('partner/checkoutfree');
 }
 } catch (Exception $e) {
 \Session::flash('error',$e->getMessage());
  //dd($e->getMessage());
 return Redirect::to('partner/checkoutfree');
 } catch(\Cartalyst\Stripe\Exception\CardErrorException $e) {
 \Session::flash('error',$e->getMessage());
  //dd($e->getMessage());
 return Redirect::to('partner/checkoutfree');
 //return redirect()->url('partner/checkoutfree');
 } catch(\Cartalyst\Stripe\Exception\MissingParameterException $e) {
 \Session::flash('error',$e->getMessage());
  //dd($e->getMessage());
 return Redirect::to('partner/checkoutfree');
 }
 }
 }


////////// monthly plan////////////
 public function postPaymentStripemonthly(Request $request)
 {
   // dd($request->all());
 $validator = Validator::make($request->all(), [
 'cardname' => 'required',
 'cardnumber' => 'required',
 'expmonth' => 'required',
 'expyear' => 'required',
 'cvv' => 'required',
 //'amount' => 'required',
 ]);
 $input = $request->all();
 if ($validator->passes()) {
 $input = array_except($input,array('_token'));
$stripe = \Stripe::setApiKey('sk_test_736e4BO4MrWwgnGDMiVYQ2z000JdtbBfSJ');
 $charge= \Stripe\Subscription::create([
  'customer' => 'cus_GgUMQKD6royZMd',
  'items' => ['plan' => 'plan_GaXueyQDd8tO35'],
]);
dd($charge);
//dd($stripe);
 try {
 $token = $stripe->tokens()->create([
 'card' => [
   'number' => $request->get('cardnumber'),
   'exp_month' => $request->get('expmonth'),
   'exp_year' => $request->get('expyear'),
   'cvc' => $request->get('cvv'),
 ],
 ]);
if (!isset($token['id'])) {
	// dd($token);
 return redirect()->route('addmoney.paymentstripe');
 }


 if($charge['active'] == true) {
   $userId=$request->session()->get('faUser')->p_id;
   $detail['p_id'] = $userId;
   $detail['name'] = $request->input('fullname');
   $detail['email'] = $request->input('email');
   $detail['address'] = $request->input('address');
   $detail['city'] = $request->input('city');
   $detail['state'] = $request->input('state');
   $detail['zip'] = $request->input('zip');
   $detail['method'] = 'PREMIUM USER MEMBERSHIP';
   $detail['amount'] = $charge['amount'];
   $detail['currency'] = $charge['currency'];
   $detail['trial_period_days'] = $charge['trial_period_days'];
   // dd($detail);
   $payment = DB::table('fa_payments')->insertGetID($detail);
   $patner_detail['payment_status']='1';
   $patner_detail['payment_id']=$payment;
   $partner = DB::table('fa_partner')->where('p_id',$userId)->update($patner_detail);
 // echo "<pre>";
 // print_r($charge);exit();
 $request->session()->flash('message', 'Membership Activated successfully');
 return redirect('/partner/partner_dashboard');
 } else {
	 dd("error");
 \Session::flash('error','Money not add in wallet!!');

  //dd($e->getMessage());
 return Redirect::to('partner/checkoutmonthly');
 }
 } catch (Exception $e) {
 \Session::flash('error',$e->getMessage());
  //dd($e->getMessage());
 return Redirect::to('partner/checkoutmonthly');
 } catch(\Cartalyst\Stripe\Exception\CardErrorException $e) {
 \Session::flash('error',$e->getMessage());
  //dd($e->getMessage());
 return Redirect::to('partner/checkoutmonthly');
 //return redirect()->url('partner/checkoutmonthly');
 } catch(\Cartalyst\Stripe\Exception\MissingParameterException $e) {
 \Session::flash('error',$e->getMessage());
  //dd($e->getMessage());
 return Redirect::to('partner/checkoutmonthly');
 }
 }
 }

}
