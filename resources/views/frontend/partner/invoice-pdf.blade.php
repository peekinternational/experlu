
<!DOCTYPE html>
<html lang="en">
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <head>
    <title>Finance Analyst</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="fb:app_id" content="778141418958555" />
    
    <meta name="description" content="" />
    <meta name="title" content="Finance Analyst" />
    <meta property="og:title" content="Finance Analyst" />
    <meta property="og:description" content="" />
    <link rel="canonical" href="index.html" />
    <meta property="og:image" content="../www.ageras.com/assets/images/default-open-graph-image.jpg" />
    
    <!-- <link rel="stylesheet" href="{{asset('frontend-assets/css/style-guide-external-9b33b7fc1b.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend-assets/css/style-guide-a355bce31e.css')}}" /> -->
    <link rel="stylesheet" href="{{asset('frontend-assets/css/style.css')}}" />
    
    
    
    
  
 <style>
@font-face {
      font-family: calibri light;
  src: url(SourceSansPro-Regular.ttf);
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #252851;
  text-decoration: none;
}

body {
   /*position: relative;
  width: 16cm;
  height: 29.7cm;
  margin: 0 auto;
  color: #555555;
  background: #FFFFFF;
  font-family: Arial, sans-serif;
  font-size: 14px;*/
  font-family: calibri light; 
}
nav{
  display: none !important;
  background-color: white;
}
header {
  display: none;
  padding: 0px 0;
  margin-bottom: 20px;
  border-bottom: 1px solid #fff;
}

#logo {
  float: right;
  margin-top: 8px;
}

#logo img {
  height: 70px;
}

#company {
  text-align: right;
}


#details {
  margin-bottom: 50px;
}

#client {
  padding-left: 6px;
  /* border-left: 6px solid #252851; */
  float: left;
}

#client .to {
  color: #777777;
}

h2.name {
  font-size: 1.4em;
  font-weight: normal;
  margin: 0;
}

#invoice {
  text-align: right;
}

#invoice h1 {
  color: #0087C3;
  font-size: 2.4em;
  line-height: 1em;
  font-weight: normal;
  margin: 0  0 10px 0;
}

#invoice .date {
  font-size: 1.1em;
  color: #777777;
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table th,
table td {
  padding: 20px;
  background: white;
  text-align: center;
  border-bottom: 1px solid gray;
}

table th {
  white-space: nowrap;
  font-weight: normal;
}

table td {
  text-align: right;
}

table td h3{
  color: #d9af44;
  font-size: 1.2em;
  font-weight: normal;
  margin: 0 0 0.2em 0;
}

table .no {
  color: #FFFFFF;
  font-size: 1.6em;
  background: #d9af44;
}

table .desc {
  text-align: left;
}

table .unit {
  background: #DDDDDD;
}

table .qty {
}

table .total {
  background: #d9af44;
  color: #FFFFFF;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table tbody tr:last-child td {
  border: none;
}

table tfoot td {
  padding: 10px 20px;
  background: #FFFFFF;
  border-bottom: none;
  font-size: 1.2em;
  white-space: nowrap;
  border-top: 1px solid #AAAAAA;
}

table tfoot tr:first-child td {
  border-top: none;
}

table tfoot tr:last-child td {
  color: #d9af44;
  font-size: 1.4em;
  border-top: 1px solid #d9af44;

}

table tfoot tr td:first-child {
  border: none;
}

#thanks{
  font-size: 2em;
  margin-bottom: 50px;
}

#notices{
  padding-left: 6px;
  border-left: 6px solid#d9af44;
}

#notices .notice {
  font-size: 1.2em;
}

 footer {
  display: none;
  color: #777777;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #AAAAAA;
  padding: 8px 0;
  text-align: center;
  background-color: transparent;
} 
.invoice-date  p {
  padding-bottom: 0px !important;
}

.col-md-3 {
    width: 25%;
    float: left;
    position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}
.col-md-offset-3 {
    margin-left: 25%;
}
.col-md-12{
  width: 100%;
  /*float: left;*/
  position: relative;
  min-height: 1px;
  padding-right: 15px;
  padding-left: 15px;
}
.col-md-2 {
  width: 16.6666666667%;
  float: left;
  position: relative;
  min-height: 1px;
  padding-right: 15px;
  padding-left: 15px;
}
.col-md-4 {
  width: 33.3333333333%;
  float: left;
  position: relative;
  min-height: 1px;
  padding-right: 15px;
  padding-left: 15px;
}
#client {
  padding-left: 6px;
  /* border-left: 6px solid #252851; */
  float: left;
}
.invoice-date p {
    padding-bottom: 0px !important;
}
p {
    padding-bottom: 20px;
    overflow-x: hidden;
}
.col-md-offset-1 {
    margin-left: 8.3333333333%;
}
#company {
    text-align: right;
}
.text-right {
    text-align: right;
}
.label {
    display: inline;
    padding: .2em .6em .3em;
    font-size: 75%;
    color: #fff;
    border-radius: .25em;
    font-size: 15px;
        font-weight: 700;
    line-height: 1;
    white-space: nowrap;
    text-align: center;
    vertical-align: baseline;
}
*, :after, :before {
    box-sizing: border-box;
}
 </style>
  </head>
  <body>
  <?php
   $path = public_path('/frontend-assets/logo.png');
                    $type = pathinfo($path, PATHINFO_EXTENSION);
                    $data = file_get_contents($path);
                    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

                    ?>
    <div class="container" style="margin-top: 2rem;margin-bottom: 6rem;background:white;width:700px;">
      <div class="row">
        <div class="col-md-12" style="margin-bottom:30px;width: 100%;">
          <div class="">
            <div id="logo">
              <img src="{{$base64}}">
            </div>
            <div class="row" style="margin-top:8rem; width: 700px;">
              <div class="col-md-3" style="">
                <div id="client">
                  <h1 style="margin-bottom:10px;margin-top: 0;"><strong>Invoice</strong></h1>
                  <!-- <div class="to">INVOICE TO:</div> -->
                    <div class="" style="margin-left:40px;">
                      <h2 class="name">{{$invoice->name}}</h2>
                      <div class="address">{{$invoice->company_name}}</div>
                      <div class="address">{{$invoice->address}}</div>
                    </div>
                </div>
              </div>
              <div class="col-md-2 col-md-offset invoice-date" style="">
                <?php
                $date = $invoice->updated_at;
                $quote_date =	date('d-M-Y', strtotime($date));
                $due_date =	date('d-M-Y', strtotime($date. ' + 1 days'));
                 ?>
                 <p><div>Invoice Date</div>
                 <div>{{$quote_date}}</div></p>
                 <p><div>Invoice Number</div>
                 <div>INV-{{$invoice->id}}</div></p>
                 <p><div>VAT Number</div>
                 <div>338457768</div></p>
              </div>
              <div class="col-md-offset- col-md-4" style="">
                <div id="company">
                  <h2 class="name">Experlu UK Limited </h2>
                  <div>Attention: Accounts Dept</div>
                  <div>71-75 Shelton Street, Covent Garden, London, WC2H 9JQ</div>
                </div>
              </div>
            </div>
            
          </div>
          <div>
           
            @if(FA::checkPayment($invoice->id,$invoice->p_id) == 1)
            <div class="text-right" style="margin-bottom: 20px;"><span class="label label-success" style="font-size: 15px;">Paid</span></div>
            @else
            <div class="text-right" style="margin-bottom: 20px;"><span class="label label-warning" style="font-size: 15px;">UnPaid</span></div>
            @endif
            <table border="0" cellspacing="0" cellpadding="0">
              <thead>
                <tr>
                  <th class="" colspan="3">Description</th>
                  <th class="desc">Quantity</th>
                  <th class="">Unit Price</th>
                  <th class="">Discount</th>
                  <th class="">Amount GBP</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td colspan="3" class="desc">Professional fee in relation to {{$invoice->job_id}} {{$invoice->customer_name}}</td>
                  <td class="desc">1.00</td>
                  <td class="">{{$invoice->experlu_fee}}</td>
                  <td class="">0.00%</td>
                  <td class="">£{{$invoice->experlu_fee}}</td>
                </tr>
                <?php
                $vat_fee = $invoice->experlu_fee*20/100;
                $total = $invoice->experlu_fee+$vat_fee;
                ?>
                
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="2"></td>
                  <td colspan="4">SUBTOTAL</td>
                  <td>£{{$invoice->experlu_fee}}</td>
                </tr>
                <tr>
                  <td colspan="2"></td>
                  <td colspan="4">VAT 20%</td>
                  <td>£{{$vat_fee}}</td>
                </tr>
                <tr>
                  <td colspan="2"></td>
                  <td colspan="4">TOTAL GBP</td>
                  <td>£{{$total}}</td>
                </tr>
              </tfoot>
            </table>
            <div class="row">
              <div class="col-md-4">
                <p><div class="">Due Date: {{$due_date}}</div>
                <div class="">Thank you – we really appreciate your business! </div></p>
                <div class="">Bank Details are:</div>
                <div class="">Barclays Bank</div>
                <div class="">Sort code 20-41-50</div>
                <div class="">Account number 93347397</div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </body>
  </html>
