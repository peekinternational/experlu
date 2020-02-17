<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use Storage;
use Response;
use PDF;
use Mail;
use Carbon;
use App\User;
use DateTime;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		//dd(User::find(1));
             if(!$request->session()->has('faUser')){
			return redirect('/');
		}
    $userId=$request->session()->get('faUser')->p_id;
//dd(date('Y-m-d H:i:s'));
   $cancelpckg=DB::table('subscriptions')->where('user_p_id',$userId)->where('ends_at','!=',null)->where('ends_at','>',date('Y-m-d H:i:s'))->first();
   if($cancelpckg){
   if($cancelpckg->ends_at < date('Y-m-d H:i:s')){
	   dd($cancelpckg);
	        $patner_detail['payment_status']='0';
		    $partner = DB::table('fa_partner')->where('p_id',$userId->p_id)->update($patner_detail);
		    return redirect('partner/membership');
   }
   }
    $payment_status = DB::table('fa_partner')->where('p_id',$userId)->first()->payment_status;
    if ($payment_status == 0) {
      return redirect('partner/membership');
    }

     $document=DB::table('fa_partner_cv')->where('partner_id',$userId)->first();
            if($request->isMethod('post')){

            $data_array=array(
                'introduce_urself'=>$request->input('introduce_urself'),
                'availability'=>$request->input('availability'),
                'no_clients'=>$request->input('no_clients'),
                'no_employs'=>$request->input('no_employs'),
                'established'=>$request->input('established'),
                'website'=>$request->input('website'),
                'address'=>$request->input('address'),
                'post_code'=>$request->input('post_code'),
                'city'=>$request->input('city'),
                'phoneno'=>$request->input('phoneno'),
                'location'=>$request->input('location'),
                'company_name'=>$request->input('company_name'),
                'company_email'=>$request->input('company_email'),
                'vat_number'=>$request->input('vat_number'),
                'company_number'=>$request->input('company_number'),
                'company_des'=>$request->input('company_des'),
                'company_info'=>$request->input('company_info'),
                'vat_number'=>$request->input('vat_number'),
                'company_number'=>$request->input('company_number'),
                'services'=>json_encode($request->input('services')),
                'interview'=>$request->input('interview'),
                'personal_quets'=>$request->input('personal_quets'),
            );

          $update= DB::table('fa_partner')->where('p_id','=',$userId)->where('user_type','partner')->update($data_array);
                $request->session()->flash('message','Profile save successfully');
                return redirect()->back();
                //dd($update);
            }
        $jobs=[];
         $userinfo = DB::table('fa_partner')->where('p_id','=',$userId)->where('user_type','partner')->first();
         // dd($userinfo);
         $service=json_decode($userinfo->services);
       if(!empty($service))
       {
         foreach($service as &$ser){

            $jobs[] = DB::table('fa_jobpost')->where('status','1')->where('post_portal','Yes')->where('services','=',$ser)->orderBy('id','desc')->get()->toArray();
         }
       }
       // dd($jobs);

         $alljobs = DB::table('fa_jobpost')->where('status','1')->where('post_portal','Yes')->orderBy('id','desc')->get();

         $rquote = DB::table('fa_jobpost')->select('fa_quote.*','fa_jobpost.services','fa_jobpost.city','fa_jobpost.job_title','fa_jobpost.mobilenumber','fa_jobpost.city','fa_jobpost.job_case','fa_jobpost.job_email','fa_jobpost.job_type')->join('fa_quote','fa_quote.job_id','=','fa_jobpost.id')->where('fa_quote.p_id',$userId)->orderBy('fa_quote.id','desc')->get();
         $pquots = DB::table('fa_jobpost')->select('fa_quote.*','fa_jobpost.services','fa_jobpost.city','fa_jobpost.mobilenumber','fa_jobpost.job_title','fa_jobpost.job_type')->join('fa_quote','fa_quote.job_id','=','fa_jobpost.id')->where('fa_quote.p_id',$userId)->orderBy('fa_quote.id','desc')->get();
         //$quotes=DB::table('fa_quote')->get();
        $invoicequote = DB::table('fa_quote')->select('fa_quote.*','fa_partner.name')
        ->join('fa_partner','fa_partner.p_id','=','fa_quote.p_id')
        ->where('fa_quote.p_id',$userId)->where('fa_quote.status','Won')
        ->orderBy('fa_quote.id','desc')->get();
        // dd($invoicequote);
        $payments = DB::table('fa_payments')->where('p_id',$userId)->orderBy('payment_id','desc')->get();
        // dd($payments);
        $refunds = DB::table('fa_refunds')->where('p_id',$userId)->orderBy('refund_id','desc')->get();

         foreach($alljobs as &$res)
         {
             $res->quot=DB::table('fa_quote')->where('job_id','=',$res->id)->count();

         }

         $quote= DB::table('fa_quote')
                 ->join('fa_jobpost','fa_jobpost.id','=','fa_quote.job_id')
                 ->join('fa_partner','fa_partner.p_id','=','fa_quote.p_id')
                 ->where('fa_quote.id',$q_id)->first();

         $rating_avg = array();

         $reviews = DB::table('fa_quotes_review')
         ->where('p_id','=',$userId)
         ->orderBy('review_id','desc')
         ->get()->toArray();

         $star1 = DB::table('fa_quotes_review')
             ->where('p_id','=',$userId)
             ->where(function ($query) {
                 $query->where('overall_rating', '=', 0.5)
                   ->orWhere('overall_rating', '=', 1);
             })
             ->count('overall_rating');

         $star2 = DB::table('fa_quotes_review')
             ->where('p_id','=',$userId)
             ->where(function ($query) {
                 $query->where('overall_rating', '=', 1.5)
                   ->orWhere('overall_rating', '=', 2);
             })
             ->count('overall_rating');
         $star3 = DB::table('fa_quotes_review')
             ->where('p_id','=',$userId)
             ->where(function ($query) {
                 $query->where('overall_rating', '=', 2.5)
                   ->orWhere('overall_rating', '=', 3);
             })
             ->count('overall_rating');
         $star4 = DB::table('fa_quotes_review')
             ->where('p_id','=',$userId)
             ->where(function ($query) {
                 $query->where('overall_rating', '=', 3.5)
                   ->orWhere('overall_rating', '=', 4);
             })
             ->count('overall_rating');
         $star5 = DB::table('fa_quotes_review')
             ->where('p_id','=',$userId)
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

      // dd($userinfo);
     return view('frontend.partner.partner_dashboard',compact('userinfo','document','jobs','alljobs','rquote','pquots','reviews','rating_avg','userId','invoicequote','payments','refunds','cancelpckg'));
    }
 public function show(Request $request, $id)
    {
        $plan =$id;
        // if($request->user()->subscribedToPlan($plan->stripe_plan, 'primary')) {
            // return redirect()->route('dashboard')->with('success', 'You have already subscribed the plan');
        // }
        return view('frontend.show', compact('plan'));
    }

public function subscribe_process(Request $request)
{
//dd($request->all());	
    try {
        \Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $userId=$request->session()->get('faUser');
        $user = User::find($userId->p_id);
        $user->newSubscription('main', $request->input('plan'))->create($request->stripeToken);
		if($request->input('plan_id') =='1'){
			 $detail['method'] = 'BASIC USER MEMBERSHIP';
			  $detail['trial_period_days'] = '30';
		}
		else{
			 $detail['trial_period_days'] = '';
			 $detail['method'] = 'PREMIUM USER MEMBERSHIP';
		}
		
		   $detail['p_id'] = $userId->p_id;
		   $detail['name'] = $userId->name;
		   $detail['email'] = $userId->email;
		  
		   $detail['amount'] = '85';
		   $detail['currency'] = '€';
		    $detail['payment_type'] = 'Membership';
		  
		   // dd($detail);
		   $payment = DB::table('fa_payments')->insertGetID($detail);
		   $patner_detail['payment_status']='1';
		   $patner_detail['payment_id']=$payment;
		   $partner = DB::table('fa_partner')->where('p_id',$userId->p_id)->update($patner_detail);

         $request->session()->flash('message', 'Membership Activated successfully');
 return redirect('/partner/partner_dashboard');
    } catch (\Exception $ex) {
        return $ex->getMessage();
    }

}

public function subscribe_cancel(Request $request)
{
//dd($request->all());	
    try {
        \Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $userId=$request->session()->get('faUser');
        $user = User::find($userId->p_id);
        $user->subscription('main')->cancel();
		//dd('cancel');
	  $cancelpckg=DB::table('subscriptions')->where('user_p_id',$userId->p_id)->where('ends_at','!=',null)->where('ends_at','>',date('Y-m-d H:i:s'))->first();
	   $now = date(); // or your date as well
		$your_date = $cancelpckg->ends_at;
		$datetime1 = new DateTime($your_date);
		$datetime2 = new DateTime();
		$interval = $datetime1->diff($datetime2);
		$days = $interval->format('%a');//now do whatever you like with $days
//dd($days);
       $request->session()->flash('message', 'Your subscription is canceled and your package will expire after '.$days.' days' );
       return redirect('/partner/partner_dashboard');
    } catch (\Exception $ex) {
        return $ex->getMessage();
    }

}

    public function get_invoice_detail(Request $request, $id)
    {
      $invoice = DB::table('fa_quote')->select('fa_quote.*','fa_partner.name','fa_partner.company_name','fa_partner.address','fa_partner.email','fa_jobpost.job_title','fa_jobpost.job_case','fa_jobpost.customer_name')->join('fa_partner','fa_partner.p_id','=','fa_quote.p_id')->join('fa_jobpost','fa_jobpost.id','=','fa_quote.job_id')->where('fa_quote.id',$id)->first();
      // dd($invoice);
      $quote_id=$invoice->id;
      $experlu_fee=$invoice->experlu_fee;
      $vat_fee = $invoice->experlu_fee*20/100;
      $total = $invoice->experlu_fee+$vat_fee;
      $request->session()->put('Quote_id', $quote_id);
      $request->session()->put('experlu_fee', $experlu_fee);
      $request->session()->put('vat_fee', $vat_fee);
      $request->session()->put('total', $total);
      // dd($request->session()->get('total'));
        return view ('frontend.partner.invoice-template',compact('invoice'));
    }

    public function checkout_form(Request $request)
    {
        $quote_id=$request->session()->get('Quote_id');
        $fee=$request->session()->get('experlu_fee');
        $vat=$request->session()->get('vat_fee');
        $total=$request->session()->get('total');
        // dd($total);
        return view ('frontend.partner.checkout',compact('quote_id','fee','vat','total'));
    }

    public function get_invoice_pdf(Request $request, $id)
    {
      $invoice = DB::table('fa_quote')->select('fa_quote.*','fa_partner.name','fa_partner.email','fa_jobpost.job_title','fa_jobpost.job_case')->join('fa_partner','fa_partner.p_id','=','fa_quote.p_id')->join('fa_jobpost','fa_jobpost.id','=','fa_quote.job_id')->where('fa_quote.id',$id)->first();
    //return view ('frontend.partner.invoice-pdf',compact('invoice'));
       $pdf = PDF::loadView('frontend.partner.invoice-pdf',compact('invoice'));
       //dd($pdf);
       return $pdf->download('inovice.pdf');

    }

    public function delete_card(Request $request,$id)
    {
      // dd($id);
      $input['card_id'] = '';
      $input['payment_status'] = 0;
      $input['card_holder'] = '';
      $input['card_brand'] = '';
      $input['card_number'] = '';
      $input['exp_month'] = '';
      $input['exp_year'] = '';
      // dd($input);
      $partner = DB::table('fa_partner')->where('p_id',$id)->update($input);
      echo $partner;
    }



        public function getDocument(Request $request)
        {
         //   dd('hello');
           $userId=$request->session()->get('faUser')->p_id;
           $document=DB::table('fa_partner_cv')->where('partner_id',$userId)->where('type','=','special')->first();
           //dd($document);
            $filePath = $document->cv;

            // file not found
            if( ! Storage::exists($filePath) ) {
            abort(404);
            }

            $pdfContent = Storage::get($filePath);

            // for pdf, it will be 'application/pdf'
           // $type       = Storage::mimeType($filePath);
            //$fileName   = Storage::name($filePath);

            return Response::make($pdfContent, 200, [
            'Content-Type'        => $document->type,
            'Content-Disposition' => 'inline; filename="'.$filePath.'"'
            ]);
        }

        public function getDocumentcer(Request $request)
        {
         //   dd('hello');
           $userId=$request->session()->get('faUser')->p_id;
            //dd($userId);
           $document=DB::table('fa_partner_cv')->where('partner_id',$userId)->where('type','=','certification')->first();
            // dd($document);
            $filePath = $document->cv;

            // file not found
            if( ! Storage::exists($filePath) ) {
            abort(404);
            }

            $pdfContent = Storage::get($filePath);

            // for pdf, it will be 'application/pdf'
           // $type       = Storage::mimeType($filePath);
            //$fileName   = Storage::name($filePath);

            return Response::make($pdfContent, 200, [
            'Content-Type'        => $document->type,
            'Content-Disposition' => 'inline; filename="'.$filePath.'"'
            ]);
        }

        public function getDocumentcer_admin(Request $request,$id)
        {
           // dd($id);
           $userId=$request->session()->get('faUser')->p_id;
            //dd($userId);
           $document=DB::table('fa_partner_cv')->where('partner_id',$id)->where('type','=','certification')->first();
            // dd($document);
            $filePath = $document->cv;

            // file not found
            if( ! Storage::exists($filePath) ) {
            abort(404);
            }

            $pdfContent = Storage::get($filePath);

            // for pdf, it will be 'application/pdf'
           // $type       = Storage::mimeType($filePath);
            //$fileName   = Storage::name($filePath);

            return Response::make($pdfContent, 200, [
            'Content-Type'        => $document->type,
            'Content-Disposition' => 'inline; filename="'.$filePath.'"'
            ]);
        }

public function accountLogin(Request $request){


        if($request->session()->has('faUser')){
			return redirect('/');
		}

       // dd($request->all());
		$next = $request->input('next');
        // $shopping = $request->input('shopping');
        // $flower = $request->input('flowerSite');
        // $automobile = $request->input('automobileSite');



		if($request->isMethod('post')){
//dd($request->all());
//            $user_type = $request->input('user_type');

            $this->validate($request,[
                'email' => 'required',

                'password' => 'required'

            ],[
                'email.required'=>'Enter your valid email',

                'password.required' => 'Enter Password',

            ]);
           $email = $request->input('email');
            $password = md5(trim($request->input('password')));


            // /dd($password);

			$user = $this->doLogin($email,$password);
			if($user == 'invalid'){
				$request->session()->flash('message', 'Invalid Email & Password');
				if($next != ''){
					return redirect('login?next='.$next);
				}else{

                    $request->session()->flash('message','please enter valid email or password');
					return redirect('/partner_login');

				}
			}
			else{
              //dd($user);
				$request->session()->put('faUser', $user);
                $user=$request->session()->get('faUser');

				DB::table('fa_partner')->where('p_id',$user->p_id)->update(['status'=>"Online"]);

				setcookie('cc_data', $user->p_id, time() + (86400 * 30), "/");

				if($next != ''){
					return redirect($next);
				}else{
					return redirect('partner/partner_dashboard');
				}
			}


		}


		$pageType = \Request::segment('1');
		return view('frontend.partner.partner_login',compact('pageType'));
    }
    public function forgetPassword()
    {
        return view('frontend.partner.reset_password');
    }
    public function retrivePassword(Request $request)
    {
        $data=$request->all();
        $partner=DB::table('fa_partner')->where('email',$data['email'])->first();
        if(!empty($partner))
        {
            DB::table('fa_partner')->where('p_id',$partner->p_id)->update(['token'=>$data['_token']]);
            $toemail=$partner->email;
            Mail::send('mail.resetPassword',['parnter'=>$partner],
                function ($message) use ($toemail)
                {

                    $message->subject('Experlu.com - Welcome To Experlu');
                    $message->from('searchbysearchs@gmail.com', 'Experlu');
                    $message->to($toemail);
                });
            $request->session()->flash('message','Kindly check your email');
            return redirect()->back();
        }
        $request->session()->flash('message','Plz enter valid email');
        return redirect()->back();


    }
    public function reset_Password($p_id,$id)
    {
        $token=$id;
        $p_id=$p_id;

        return view('frontend.partner.Forget_password',compact('token','p_id'));
    }
    public function password_reset(Request $request)
    {
        $data=$request->all();
        $password1=$request->password;
        $con_password=$request->confirm_password;
        if($password1==$con_password)
        {
            $password = md5(trim($password1));

            DB::table('fa_partner')->where('p_id',$data['id'])->where('token','!=','')->update(['password'=>$password]);
            DB::table('fa_partner')->where('p_id',$data['id'])->update(['token'=>'']);
            $request->session()->flash('message','Your password change successfully');
            return redirect()->to('partner_login');
        }
        else{
            $request->session()->flash('message','your password not match plz try again');
            return redirect()->back();
        }
    }

public function doLogin($email,$password){
        /* do login */
        //dd($password);
        $user = DB::table('fa_partner')->where('email','=',$email)->where('password','=',$password)->where('user_type','partner')->first();
       //dd($user);
		// if(count($user) == null){
		// 	return 'invalid';
		// }else{
		// 	return $user;
		// }
        if(empty($user)){
            return 'invalid';
        }else{
            return $user;
        }
		/* end */
	}


    public function accountRegister(Request $request){
        if($request->session()->has('faUser')){
			return redirect('/');
		}

        if($request->isMethod('post')){
          // dd($request->all());

			$this->validate($request,[
				'email' => 'required|email|unique:fa_partner,email',
				'name' => 'required|min:2|max:32',
                'phoneno' => 'required|min:2|max:32',
				'phoneno' => 'required|digits_between:10,12',
				'password' => 'required|min:1|max:50',

			],[
                'email.required'=>'Enter your valid email',
				'email.unique' => 'Email must be unique',
				'name.required' => 'Enter Your Name',
				'phoneno.required' =>'Enter Your Mobile Number',
				'password.required' => 'Enter Password',
				'phoneno.digits_between' => 'Oops! It seems like you have entered a wrong phone number, please check',
            ]);
           // $string = rand(1, 1000000);
            $input['email'] = trim($request->input('email'));
            $input['name'] = trim($request->input('name'));
            $input['phoneno'] = trim($request->input('phoneno'));
            $input['user_type'] = 'partner';
            $input['password'] = md5(trim($request->input('password')));
            $string = "";
           $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
           for($i=0;$i<20;$i++)
           $string.=substr($chars,rand(0,strlen($chars)),1);
           // dd($string);
           $input['token']=$string;

           $userId = DB::table('fa_partner')->insertGetId($input);
            setcookie('cc_data', $userId, time() + (86400 * 30), "/");
            $fNotice = 'Please check your mobile for verification code';
			$request->session()->flash('fNotice',$fNotice);
           // return redirect('verify');

            $toemail = $input['email'];
            Mail::send('mail.sendmailforverify',['p_id'=>$userId,'customer_name' =>$input['name'],'token'=>$string],

          function ($message) use ($toemail)
          {

            $message->subject('Experlu.com - Welcome To Experlu');
            $message->from('searchbysearchs@gmail.com', 'Experlu');
            $message->to($toemail);
          });
        }

		$pageType = \Request::segment('1');
		return view('frontend.partner.partner_login',compact('pageType'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function profilePicture(Request $request){

        if(!$request->ajax()){
			exit('Directory access is forbidden');
        }

		$userinfo=$request->session()->get('faUser');
		if($request->file('logo') != ''){

		$fName = $_FILES['logo']['name'];
		$ext = @end(@explode('.', $fName));
		if(!in_array(strtolower($ext), array('png','jpg','jpeg'))){
			exit('1');
		}

		$user = DB::table('fa_partner')->where('p_id',$userinfo->p_id)->first();

		$image = $request->file('logo');
		$profilePicture = 'profile-'.time().'-'.rand(000000,999999).'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/frontend-assets/partner/profile-photos');
        $image->move($destinationPath, $profilePicture);

        	DB::table('fa_partner')->where('p_id',$userinfo->p_id)->update(array('logo' => $profilePicture));
            $user = DB::table('fa_partner')->where('p_id',$userinfo->p_id)->first();
            $request->session()->put('faUser',$user);
            echo url('/frontend-assets/partner/profile-photos/'.$profilePicture);
        }

	}

     public function removeprofilePicture(Request $request){
         $userinfo=$request->session()->get('faUser')->p_id;
            $logo=array(
            'logo'=>''
            );
        $user = DB::table('fa_partner')->where('p_id','=',$userinfo)->where('user_type','partner')->update($logo);
        echo $user;
        }

        public function logout(Request $request){
         //Session::flush();
            $user=$request->session()->get('faUser');

            DB::table('fa_partner')->where('p_id',$user->p_id)->update(['status'=>"Offline"]);
          Session::forget('faUser');
         return redirect('partner_login');
        }

         public function cvupload(Request $request){
             //dd($request->all());
             $userinfo=$request->session()->get('faUser')->p_id;
             if($request->file('cv') != ''){
                $cv = $request->file('cv');

               $upload = $request->file('cv')->store('cv');


             }
             $type = $request->type;

            $document=DB::table('fa_partner_cv')->where('partner_id',$userinfo)->where('type','special')->first();
            if($document){
               DB::table('fa_partner_cv')->where('partner_id','=',$userinfo)->update(array('cv' => $upload));
            }else{

             DB::table('fa_partner_cv')->insert(array('partner_id'=>$userinfo,'cv' => $upload,'type'=>$type));
            }
             $request->session()->flash('message','File uploaded successfully');
            return redirect()->back();
        }

          public function certification_upload(Request $request){
             // dd($request->all());
             $userinfo=$request->session()->get('faUser')->p_id;
             if($request->file('cer') != ''){
                $cer = $request->file('cer');

               $upload = $request->file('cer')->store('cv');


             }
             $type = $request->input('type');
           //  dd($type);
            $document=DB::table('fa_partner_cv')->where('partner_id',$userinfo)->where('type','certification')->first();
            if($document){
               DB::table('fa_partner_cv')->where('partner_id','=',$userinfo)->update(array('cv' => $upload));
            }else{

             DB::table('fa_partner_cv')->insert(array('partner_id'=>$userinfo,'cv' => $upload,'type'=>$type));
            }
            $request->session()->flash('message','File uploaded successfully');
            return redirect()->back();
        }

public function quote(Request $request)
    {
      // dd($request->all());
      $job_id = $request->input('job_id');
      $check_quote= DB::table('fa_quote')->where('job_id',$job_id)->count();
      // dd($check_quote);
      if ($check_quote >= 3) {
        $input['count_status']='In Active';
      }
      // $array1= ['a','b','c'];
      // $array2= ['b','a','c'];
      // foreach($array1 as $key=>$value){
      //   if($value==$array2[$key]){
      //     echo 'match value' .$value;
      //   }
      // }
      // dd($request->all());

        $userinfo=$request->session()->get('faUser')->p_id;
        $input['p_id']=$userinfo;
        $input['job_id']=$request->input('job_id');
         $input['quote']=$request->input('quote');
         $input['_token']=$request->input('_token');
           $payment_frequency=$request->input('payment_frquency');
            $quote_price=$request->input('quote_price');
            foreach($payment_frequency as $key=>$value){
              if($value=='Weekly'){
                $quote_price[$key] =$quote_price[$key]*52;
                echo 'quote_price' .$value. " ".$quote_price[$key];
              }elseif ($value=='Monthly') {
                $quote_price[$key] =$quote_price[$key]*12;
                echo 'quote_price' .$value. " ".$quote_price[$key];
              }else {
                $quote_price[$key] =$quote_price[$key]*1;
                echo 'quote_price' .$value. " ".$quote_price[$key];
              }
            }
            $input['q_services']=json_encode($request->input('q_services'));
             $input['payment_frquency']=json_encode($request->input('payment_frquency'));
              $input['quote_price']=json_encode($quote_price);
            $get_total = array_sum($quote_price);
            $vat_fee = $get_total*20/100;
            $experlu_fee = $get_total*25/100;
            $total_fee = $get_total+$vat_fee+$experlu_fee;
            $input['vat_fee']=$vat_fee;
            $input['experlu_fee']=$experlu_fee;
            $input['total_fee']=$total_fee;
            // dd($input);
        // $request->merge(['p_id' => $userinfo]);
         //$request->merge(['q_services' => json_encode($request->input('q_services'))]);
           $job_id=$request->input('job_id');
          $getemail= DB::table('fa_jobpost')->where('id',$job_id)->first();
          $toemail=$getemail->job_email;
         // dd($job_id);
       $q_id= DB::table('fa_quote')->insertGetId($input);

       $job=DB::table('fa_jobpost')->where('id',$job_id)->first();
       if($job->quote_status == 0){
           date_default_timezone_set("Asia/Karachi");
           DB::table('fa_jobpost')->where('id',$job_id)->update(['quote_status'=>'1','quote_time'=>date("Y-m-d H:i:s")]);
       }
       if ($check_quote < 3) {
        Mail::send('mail.sendmailtocustomer',['parnter'=>$userinfo,'q_id'=>$q_id,'job_id'=>$job_id,'u_name' =>$getemail->customer_name,'quote'=>$request->input('quote'),'services'=> json_encode($request->input('q_services')),'payment_frquency'=> json_encode($request->input('payment_frquency')),'quote_price' => json_encode($quote_price)],

      function ($message) use ($toemail)
      {

        $message->subject('Experlu.com - Welcome To Experlu');
        $message->from('searchbysearchs@gmail.com', 'Experlu');
        $message->to($toemail);
      });

    }



        $request->session()->flash('message','Quote created successfully');
         return redirect()->to('partner/partner_dashboard');

    }

public function quote_ajax(Request $request)
    {
        $data =$request->all();

       return view('frontend.partner.quote_ajax',compact('data'));


    }

public function rejectquote(Request $request,$id,$id2)
    {

           //$job_id=$request->input('job_id');
           $quotedata= DB::table('fa_quote')->select('fa_quote.*','fa_jobpost.job_title')->join('fa_jobpost','fa_jobpost.id','=','fa_quote.job_id')->where('fa_quote.id',$id2)->where('fa_quote.status','pending')->first();
         // dd($quotedata);
         if ($quotedata =="") {
           $newdata= DB::table('fa_quote')->where('fa_quote.id',$id2)->first();
           if ($newdata->status == "Loss") {
             $request->session()->flash('message','You already Reject this Quote');
           }else {
             $request->session()->flash('message','You already Accept this Quote');
           }
            return redirect('/');
         }
          $userinfo= DB::table('fa_partner')->where('p_id',$id)->first();
          $toemail=$userinfo->email;
         // dd($job_id);
        Mail::send('mail.rejecttmailtopartner',['parnter'=>$userinfo,'quotedata'=>$quotedata],
      function ($message) use ($toemail)
      {

        $message->subject('Experlu.com - Welcome To Experlu');
        $message->from('searchbysearchs@gmail.com', 'Experlu');
        $message->to($toemail);
      });

         DB::table('fa_quote')->where('id',$id2)->update(['status'=>'Loss']);


        $request->session()->flash('message','Quote Rejected successfully');
         return redirect()->back();

    }

    public function acceptquote(Request $request, $id,$id2)
    {
          $quotedata= DB::table('fa_quote')->select('fa_quote.*','fa_jobpost.job_title')->join('fa_jobpost','fa_jobpost.id','=','fa_quote.job_id')->where('fa_quote.id',$id2)->where('fa_quote.status','pending')->first();
        // dd($quotedata);
        if ($quotedata =="") {
          $newdata= DB::table('fa_quote')->where('fa_quote.id',$id2)->first();
          if ($newdata->status == "Won") {
            $request->session()->flash('message','You already Accept this Quote');
          }else {
            $request->session()->flash('message','You already Reject this Quote');
          }
           return redirect('/');
        }
          $userinfo= DB::table('fa_partner')->where('p_id',$id)->first();
          $toemail=$userinfo->email;
         // dd($job_id);
        Mail::send('mail.acceptmailtopartner',['parnter'=>$userinfo,'quotedata'=>$quotedata],
      function ($message) use ($toemail)
      {

        $message->subject('Experlu.com - Welcome To Experlu');
        $message->from('searchbysearchs@gmail.com', 'Experlu');
        $message->to($toemail);
      });

        DB::table('fa_quote')->where('id',$id2)->update(['status'=>'Won','updated_at'=>Carbon\Carbon::now()]);


        $request->session()->flash('message','Quote Accepted successfully');
         return redirect()->back();

    }
     public function customerdetail(Request $request,$id)
    {
		$userId=Session::get('faUser')->p_id;
       $data= DB::table('fa_jobpost')->join('fa_user_template','fa_user_template.job_id','fa_jobpost.id')
        ->join('fa_quote','fa_quote.job_id','fa_jobpost.id')->where('fa_jobpost.id',$id)->where('fa_quote.p_id',$userId)->first();
        // dd($data);
        return view('frontend.partner.template_detail',compact('data'));
    }

     public function jobdetail(Request $request,$id)
    {
       // dd($id);
       $data= DB::table('fa_jobpost')->join('fa_user_template','fa_user_template.job_id', '=','fa_jobpost.id')->where('fa_jobpost.id',$id)->first();
        // dd($data);
        return view('frontend.partner.job_detail',compact('data'));
    }

public function export_pdf($id)
  {
    // Fetch all customers from database
    //$data = Customer::get();
    // Send data to the view using loadView function of PDF facade
    $data= DB::table('fa_jobpost')->join('fa_user_template','fa_user_template.job_id','fa_jobpost.id')
        ->join('fa_quote','fa_quote.job_id','fa_jobpost.id')->where('fa_jobpost.id',$id)->first();
    $pdf = PDF::loadView('casedetail',compact('data'));
    // dd($pdf);

    return $pdf->download('CaseDetail.pdf');
  }

   public function successfull1(Request $request)
  {

    $user_info=$request->session()->get('faUser');
   // dd($user_info);
    $detail['p_id'] = $user_info->p_id;
    $detail['email'] = $user_info->email;
    $detail['method'] = 'PREMIUM USER MEMBERSHIP';
    $detail['amount'] = 85;
    $payment = DB::table('fa_payments')->insertGetID($detail);
    $patner_detail['payment_status']='1';
    $patner_detail['payment_id']=$payment;
    $partner = DB::table('fa_partner')->where('p_id',$user_info->p_id)->update($patner_detail);
    return view('frontend.success1');
  }
   public function successfull2(Request $request)
  {

    $user_info=Session::get('faUser');
    //dd($user_info);
    $detail['p_id'] = $user_info->p_id;
    $detail['email'] = $user_info->email;
    $detail['method'] = 'BASIC USER MEMBERSHIP';
    $detail['trial_period_days'] = 30;
    $payment = DB::table('fa_payments')->insertGetID($detail);
    $patner_detail['payment_status']='1';
    $patner_detail['payment_id']=$payment;
    $partner = DB::table('fa_partner')->where('p_id',$user_info->p_id)->update($patner_detail);

  }

  public function success1(Request $request)
  {
	  //return redirect('/successfull1');
		$user_info=DB::table('fa_partner')->select('p_id','email')->where('p_id',$request->input('id'))->first();
		//dd($user_info);
		$detail['p_id'] = $user_info->p_id;
		$detail['email'] = $user_info->email;
		$detail['method'] = 'PREMIUM USER MEMBERSHIP';
		$detail['amount'] = 85;
    $detail['payment_type'] = 'Membership';
		$payment = DB::table('fa_payments')->insertGetID($detail);
		$patner_detail['payment_status']='1';
		$patner_detail['payment_id']=$payment;
		$partner = DB::table('fa_partner')->where('p_id',$user_info->p_id)->update($patner_detail);
		return view('frontend.success1');
  }

  public function success2(Request $request)
  {
    // return redirect('/successfull2');
	  $user_info=DB::table('fa_partner')->select('p_id','email')->where('p_id',$request->input('id'))->first();

	  // dd($user_info);
		$detail['p_id'] = $user_info->p_id;
		$detail['email'] = $user_info->email;
		$detail['method'] = 'BASIC USER MEMBERSHIP';
    $detail['payment_type'] = 'Membership';
		$detail['trial_period_days'] = 30;
		$payment = DB::table('fa_payments')->insertGetID($detail);
		$patner_detail['payment_status']='1';
		$patner_detail['payment_id']=$payment;
		$partner = DB::table('fa_partner')->where('p_id',$user_info->p_id)->update($patner_detail);
		return view('frontend.success1');
  }

  public function refund_invoice(Request $request,$id)
  {
    // dd($id);
    $invoice = DB::table('fa_quote')->join('fa_payments','fa_payments.q_id','=','fa_quote.id')->where('q_id',$id)->where('id',$id)->first();
    // dd($invoice);
    return view('frontend.partner.refund-invoice',compact('invoice'));
  }

  public function apply_request_refund(Request $request)
  {
    // dd($request->all());
    $input['invoice_id'] = $request->input('id');
    $input['p_id'] = $request->input('p_id');
    $input['reason']  = $request->input('reason');
    $input['payment_id']  = $request->input('payment_id');
    $input['amount']  = $request->input('amount');
    $image = $request->file('image');
    if ($image !="") {
    $profilePicture = 'refund-'.time().'-'.rand(000000,999999).'.'.$image->getClientOriginalExtension();
    $destinationPath = public_path('frontend-assets/images/partner/refund-reason');
    $image->move($destinationPath, $profilePicture);
    $input['image']=$profilePicture;
  }
  $payment_status['status'] = 'Request Refund';
  $payment = DB::table('fa_payments')->where('payment_id',$input['payment_id'])->update($payment_status);
  $refund = DB::table('fa_refunds')->insert($input);
  if ($refund == true) {
    return 1;
  }else {
    return 0;
  }
  // dd($refund);
  return $refund;

  }

  public function contact_admin(Request $request)
  {
    // dd($request->all());
    $this->validate($request,[
      'email' => 'required|email',
      'name' => 'required|min:2|max:32',
      'phone' => 'required|digits_between:10,12',
      'subject' => 'required|min:1|max:50',
      'message' => 'required|min:1|max:500',

    ]);
    $input['name'] = $request->input('name');
    $input['email'] = $request->input('email');
    $input['phone'] = $request->input('phone');
    $input['web'] = $request->input('web');
    $input['subject'] = $request->input('subject');
    $input['message'] = $request->input('message');
    $detail = DB::table('fa_user_contact')->insert($input);
    return redirect('/thank-you');
  }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
      public function mark($id)
    {
        $userId=Session::get('faUser')->p_id;
         $quotedata= DB::table('fa_quote')->where('id',$id)->where('p_id',$userId)->update(['mark'=>'1']);
  return $quotedata;
   }

   public function get_review(Request $request)
   {
       // dd($request->all());
       $q_id = $request->input('q_id');
       $j_id = $request->input('j_id');
       $p_id=$request->session()->get('faUser')->p_id;
       // $p_id = $request->input('p_id');
       $email = $request->input('email');

       $job_email=$request->job_email;
       $quote= DB::table('fa_quote')
               ->join('fa_jobpost','fa_jobpost.id','=','fa_quote.job_id')
               ->join('fa_partner','fa_partner.p_id','=','fa_quote.p_id')
               ->where('fa_quote.id',$q_id)->first();
               $input['q_services']=$quote->q_services;
                $input['payment_frquency']=$quote->payment_frquency;
                 $input['quote_price']=$quote->quote_price;
       // dd($quote);
           $toemail = $email;
           Mail::send('mail.sendmailforreview',['p_id'=>$p_id,'q_id'=>$q_id,'j_id'=>$j_id,'customer_name' =>$quote->customer_name,'quote'=>$quote->quote,'partner_name'=>$quote->name,'services'=> $input['q_services'],'payment_frquency'=> $input['payment_frquency'],'quote_price' =>$input['quote_price'] ],

         function ($message) use ($toemail)
         {

           $message->subject('Experlu.com - Welcome To Experlu');
           $message->from('searchbysearchs@gmail.com', 'Experlu');
           $message->to($toemail);
         });
           return view('frontend.thanks');
   }

   public function send_verification_email(Request $request)
   {
       // dd($request->all());
       $p_id = $request->input('p_id');
       $email = $request->input('email');
       $name = $request->input('name');
       // $token = $request->input('token');
       $string = "";
      $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
      for($i=0;$i<20;$i++)
      $string.=substr($chars,rand(0,strlen($chars)),1);
      // dd($string);
      $input['token']=$string;
       // $p_id=$request->session()->get('faUser')->p_id;
       // $p_id = $request->input('p_id');

       $code= DB::table('fa_partner')
               ->where('p_id',$p_id)->where('email',$email)->update($input);
               // dd($code);

       // dd($quote);
           $toemail = $email;
           Mail::send('mail.sendmailforverify',['p_id'=>$p_id,'customer_name' =>$name,'token'=>$string],

         function ($message) use ($toemail)
         {

           $message->subject('Experlu.com - Welcome To Experlu');
           $message->from('searchbysearchs@gmail.com', 'Experlu');
           $message->to($toemail);
         });
           return view('frontend.thanks');
   }

   public function verify_account(Request $request)
   {
     // dd($request->all());
     $p_id = $request->input('p_id');
     $token = $request->input('token');
     $input['verify_status']='1';
     $partner = DB::table('fa_partner')->where('p_id', $p_id)->where('token',$token)->update($input);
     if($request->session()->has('faUser')){
       $request->session()->flash('message','Email Verfied successfully');
        return redirect()->back();
    }else {
      $request->session()->flash('message','Email Verfied successfully');
      return redirect('partner_login');
    }
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
