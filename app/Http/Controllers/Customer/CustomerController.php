<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Mail;

class customerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function user_management()
    {
        $allpartner = DB::table('fa_partner')->orderBy('p_id','desc')->get();
        return view('admin.user_management',compact('allpartner'));
    }

    public function jobpost(Request $request)
    {

        $this->validate($request, [
            'job_title' => 'required',
            'job_type' => 'required',
            'ended_year' => 'required',
            'job_case' => 'required',
            'customer_name' => 'required',
            'job_email' => 'required',
            'mobilenumber' => 'required|digits_between:10,12',
            'city' => 'required'
        ],[
            'job_title.required'=>'Enter job title',
            'email.required' => 'Enter valid email',
            'job_type.required' => 'Enter job type',
            'ended_year.required' => 'Enter ended year',
            'phoneno.required' =>'Enter Your Mobile Number',
            'city.required' => 'Enter city ',
            'mobilenumber.required'=>'Enter mobile number',
            'mobilenumber.digits_between' => 'Phone Number must be contain 10,12 digits',
        ]);

        // dd($request->all());
        $toemail=$request->input('job_email');
        Mail::send('mail.sendmail',['u_name' =>$request->input('customer_name')],
      function ($message) use ($toemail)
      {

        $message->subject('Experlu.com - Welcome To Experlu');
        $message->from('searchbysearchs@gmail.com', 'Experlu');
        $message->to($toemail);
      });
        DB::table('fa_jobpost')->insert($request->all());
        return view('frontend.thanks');
    }

    public function review(Request $request)
    {
      // dd($request->all());
      $q_id = $request->input('q_id');
      $p_id = $request->input('p_id');
      $j_id = $request->input('j_id');
      $customer_name = $request->input('customer_name');
      // $userinfo   = session()->get('bkyUser');
      $quote= DB::table('fa_quote')
              ->join('fa_jobpost','fa_jobpost.id','=','fa_quote.job_id')
              ->join('fa_partner','fa_partner.p_id','=','fa_quote.p_id')
              ->where('fa_quote.id',$q_id)->first();

      $rating_avg = array();

      $reviews = DB::table('fa_quotes_review')
      ->where('job_id','=',$j_id)
      ->where('quote_id','=',$q_id)
      ->orderBy('review_id','desc')
      ->get()->toArray();

      $star1 = DB::table('fa_quotes_review')
          ->where('job_id','=',$j_id)
          ->where('quote_id','=',$q_id)
          ->where(function ($query) {
              $query->where('overall_rating', '=', 0.5)
                ->orWhere('overall_rating', '=', 1);
          })
          ->count('overall_rating');

      $star2 = DB::table('fa_quotes_review')
          ->where('job_id','=',$j_id)
          ->where('quote_id','=',$q_id)
          ->where(function ($query) {
              $query->where('overall_rating', '=', 1.5)
                ->orWhere('overall_rating', '=', 2);
          })
          ->count('overall_rating');
      $star3 = DB::table('fa_quotes_review')
          ->where('job_id','=',$j_id)
          ->where('quote_id','=',$q_id)
          ->where(function ($query) {
              $query->where('overall_rating', '=', 2.5)
                ->orWhere('overall_rating', '=', 3);
          })
          ->count('overall_rating');
      $star4 = DB::table('fa_quotes_review')
          ->where('job_id','=',$j_id)
          ->where('quote_id','=',$q_id)
          ->where(function ($query) {
              $query->where('overall_rating', '=', 3.5)
                ->orWhere('overall_rating', '=', 4);
          })
          ->count('overall_rating');
      $star5 = DB::table('fa_quotes_review')
          ->where('job_id','=',$j_id)
          ->where('quote_id','=',$q_id)
          ->where(function ($query) {
              $query->where('overall_rating', '=', 4.5)
                ->orWhere('overall_rating', '=', 5);
          })
          ->count('overall_rating');


      $tot_stars = $star1 + $star2 + $star3 + $star4 + $star5;

      if($tot_stars == 0){
          $rating_avg = array('0','0','0','0','0');
      } else{

          for ($i=1;$i<=5;++$i) {

            $var     = "star$i";
            $count   = $$var;
            $percent = $count * 100 / $tot_stars;
            $avg     = number_format($percent,2)+0;

            array_push($rating_avg, $avg);

          }

      }

      if(session()->has('bkyUser')){

        $user_exist = DB::table('fa_quotes_review')
          ->where('job_id','=',$j_id)
          ->where('quote_id','=',$q_id)
          ->count('job_id');

      } else {
        $user_exist = 0;
      }
      // dd($reviews);
      return view('frontend.review',compact('reviews','rating_avg','user_exist','user_type','q_id','j_id','p_id','quote','customer_name'));
    }

    public function payment_management()
    {
        $allpayment = DB::table('fa_payments')->orderBy('payment_id','desc')->get();
        // dd($allpayment);
        return view('admin.payment_management',compact('allpayment'));
    }

    public function refund_cases()
    {
        $refunds = DB::table('fa_refunds')->orderBy('refund_id','desc')->get();
        // dd($refunds);
        return view('admin.refund_management',compact('refunds'));
    }
    public function Change_Refund_status(Request $request)
    {
      // dd($request->all());
      $id = $request->input('refund_id');
      $payment_info = DB::table('fa_refunds')->where('refund_id',$id)->first();
      // dd($payment_info);
      $payment_id = $payment_info->payment_id;
        $input['status'] = $request->input('value');
        $refunds = DB::table('fa_refunds')->where('refund_id',$id)->update($input);
        if ($refunds == 1 && $input['status'] == 'Approved') {
          $payment['status'] = 'Refunded';
          $paymentss = DB::table('fa_payments')->where('payment_id',$payment_id)->update($payment);
        }elseif ($refunds == 1 && $input['status'] == 'Rejected') {
          $payment['status'] = 'Paid';
          $payment['reject_status'] = '1';
          // dd($payment);
          $paymentss = DB::table('fa_payments')->where('payment_id',$payment_id)->update($payment);
        }
        return $refunds;
        // dd($refunds);
    }

    public function show_invoices()
    {
      $allpayment = DB::table('fa_payments')->where('q_id','<>',null)->orderBy('payment_id','desc')->get();
      // dd($allpayment);
      return view('admin.invoice',compact('allpayment'));
    }
    public function customer_messages()
    {
      $allmessages = DB::table('fa_user_contact')->orderBy('id','desc')->get();
      // dd($allpayment);
      return view('admin.customer-message',compact('allmessages'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
