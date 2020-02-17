<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Service Provider Account Credentials</title>
</head>
<style>
.quote-table, th, td {
  border: 1px solid black;
}
</style>
<body>
<table class="m_1888394735623576276wrapper" width="100%" cellpadding="0" cellspacing="0" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;background-color:#f5f8fa;margin:0;padding:0;width:100%"><tbody><tr>
<td align="center" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box">
                <table class="m_1888394735623576276content" width="100%" cellpadding="0" cellspacing="0" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;margin:0;padding:0;width:100%">
<tbody><tr>
<td class="m_1888394735623576276header" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;padding:25px 0;text-align:center;">
        <a href="https://app.jobcallme.com/service_provider/public/login" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#bbbfc3;font-size:19px;font-weight:bold;text-decoration:none" target="_blank">



        </a>
    </td>
</tr>
<tr>
<td class="m_1888394735623576276body" width="100%" cellpadding="0" cellspacing="0" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;background-color:#ffffff;border-bottom:1px solid #edeff2;border-top:1px solid #edeff2;margin:0;padding:0;width:100%">
                            <table class="m_1888394735623576276inner-body" align="center" width="570" cellpadding="0" cellspacing="0" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;background-color:#ffffff;margin:0 auto;padding:0;width:570px">
<tbody><tr>
<td class="m_1888394735623576276content-cell" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;padding:35px">
                                        <h1 style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#2f3133;font-size:19px;font-weight:bold;margin-top:0;text-align:left">Hello {{$u_name}} </h1>
  <p style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#74787e;font-size:16px;line-height:1.5em;margin-top:0;text-align:left">This email is sent with reference to your job post on Experlu.</p>
  <p style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#74787e;font-size:16px;line-height:1.5em;margin-top:0;text-align:left"> </p>
	<p><div class="" style="width: 100%;border: 1px solid black;">
		<h5 style="background:#0a0a68; margin-top:0; color:white;font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;padding-left:5px;">Job Summary</h5>
		<p style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#74787e;font-size:14px;line-height:1.5em;margin-top:0;text-align:left;padding-left:5px;">Congratulations! You have received a new proposal from one of our Experts! </p>
	</div></p>
 <?php
            $service=json_decode($services);
            $fre=json_decode($payment_frquency);
            $q_price=json_decode($quote_price);

 ?>
 <p><div class=""style="width: 100%;border: 1px solid black;">
	 <h5 style="background:#0a0a68; margin-top:0; color:white;font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;padding-left:5px;">Job Term</h5>

 <div class="table-responsive">
	 <table class="table table-hover quote-table" style="border: 1px solid black; width:100%;">
		 <thead>
		 	<tr style="border-bottom: 1px solid black;">
		 	<th colspan="2">Service</th>
			<th>Frequency</th>
			<th>Annual Fee (GBP)</th>
		 	</tr>
		 </thead>
		 <tbody>
		 	<tr>
				<td colspan="2" style="border-right: 1px solid black;">
					@foreach($service as $ser)
 			 <p style="border-bottom: 1px solid black;">{{$ser}}</p>
 			 @endforeach</td>
			 <td style="border-right: 1px solid black;">
				 @foreach($fre as $fres)
			<p style="border-bottom: 1px solid black;">{{$fres}}</p>
			@endforeach
		</td>
			<td style="border-right: 1px solid black;">
				@foreach($q_price as $q_prices)
		 <p style="border-bottom: 1px solid black;">{{$q_prices}}</p>
		 @endforeach
	 </td>
		 	</tr>
			<tr style="border:1px solid black;">
				<td colspan="2" style="border-top: 1px solid black;border-bottom: 1px solid black;"></td>
				<td style="border-top: 1px solid black;border-bottom: 1px solid black;"></td>
				<?php
				$total_price =	array_sum($q_price);
				$vat = $total_price*20/100;
				$total =$total_price+$vat;
				 ?>
				<td style="border-top: 1px solid black;border-bottom: 1px solid black;">{{$total_price}}</td>
			</tr>
			<tr>
				<td colspan="2"style="border-right: 1px solid black;">VAT</td>
				<td style="border-right: 1px solid black;">20%</td>
				<td style="border-right: 1px solid black;">{{$vat}}</td>
			</tr>
			<tr style="background:#0a0a68; color:white;">
				<td colspan="2" style="border-right: 1px solid black;">Total</td>
				<td style="border-right: 1px solid black;"></td>
				<td style="border-right: 1px solid black;">{{$total}}</td>
			</tr>
		 </tbody>
		 <!-- <tr>
			 @foreach($service as $ser)
			 <td>{{$ser}}</td>
			 @endforeach
			 @foreach($q_price as $q_prices)
			<td>{{$q_prices}}</td>
			@endforeach
		 </tr>
		 <tr>
			 <th style="float: left;">Payment frequency</th>
			 @foreach($fre as $fres)
			 <td>{{$fres}}</td>
			 @endforeach
		 </tr>
		 <tr>
			 <th style="float: left;">Price</th>
			 @foreach($q_price as $q_prices)
			 <td>{{$q_prices}}</td>
			 @endforeach
		 </tr> -->
	 </table>
 </div>
</div></p>

<p><div class="" style="width: 100%;border: 1px solid black;">
	<h5 style="background:#0a0a68; margin-top:0; color:white;font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;padding-left:5px;">Job Summary</h5>
	<p style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#74787e;font-size:14px;line-height:1.5em;margin-top:0;text-align:left;padding-left:5px;">{{$quote}} </p>
</div></p>

<!-- <p style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#74787e;font-size:16px;line-height:1.5em;margin-top:0;text-align:left">{{$quote}}</p> -->
<table class="m_1888394735623576276action" align="center" width="100%" cellpadding="0" cellspacing="0" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;margin:30px auto;padding:0;text-align:center;width:100%"><tbody><tr>
<td align="center" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box"><tbody><tr>
<td align="center" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box">


                        <table border="0" cellpadding="0" cellspacing="0" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box"><tbody><tr>
<td style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box">
                                    <a href="{{ url('acceptquote/'.$parnter.'/'.$q_id)}}" class="m_1888394735623576276button m_1888394735623576276button-blue" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;border-radius:3px;color:#fff;display:inline-block;text-decoration:none;background-color:#3097d1;border-top:10px solid #3097d1;border-right:18px solid #3097d1;border-bottom:10px solid #3097d1;border-left:18px solid #3097d1" target="_blank">Accept</a>
                                     <a href="{{ url('rejectquote/'.$parnter.'/'.$q_id)}}" class="m_1888394735623576276button m_1888394735623576276button-blue" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;border-radius:3px;color:#fff;display:inline-block;text-decoration:none;background-color: #d19f30;
    border-top: 10px solid #d19f30;
    border-right: 18px solid #d19f30;
    border-bottom: 10px solid #d19f30;
    border-left: 18px solid #d19f30;" target="_blank">Reject</a>
                                </td>

                            </tr></tbody></table>
</td>
                </tr></tbody></table>
</td>
    </tr></tbody></table>
<p style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#74787e;font-size:16px;line-height:1.5em;margin-top:0;text-align:left">If you did not request a verify email, no further action is required.</p>
<p style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#74787e;font-size:16px;line-height:1.5em;margin-top:0;text-align:left">Regards,<br>Experlu</p>

</td>
                                </tr>
</tbody></table>
</td>
                    </tr>
<tr>
<td style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box">
        <table class="m_1888394735623576276footer" align="center" width="570" cellpadding="0" cellspacing="0" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;margin:0 auto;padding:0;text-align:center;width:570px"><tbody><tr>
<td class="m_1888394735623576276content-cell" align="center" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;padding:35px">
                    <p style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;line-height:1.5em;margin-top:0;color:#aeaeae;font-size:12px;text-align:center">© 2019 Experlu Co.,Ltd. All rights reserved.</p>
                </td>
            </tr></tbody></table>
</td>
</tr>
</tbody></table>
</td>
        </tr></tbody></table>
</body>
</html>
