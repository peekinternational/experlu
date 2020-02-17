<style>
table, th, td {
  border: 1px solid black;
}
</style>
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Services Requried</th>
                <th>Frequency</th>
                <th style="width: 14%;text-align: right;">Amount Fee (GBP)</th>

            </tr>
        </thead>
        <tbody>
        @foreach($data['q_services'] as $key=> $quote_ajax)
            <tr>
                <td>{{$quote_ajax}}</td>

                <td>{{$data['payment_frquency'][$key]}}</td>
                <?php
                if ($data['payment_frquency'][$key] == 'Weekly') {
                  $price = $data['quote_price'][$key]*52;
                }elseif ($data['payment_frquency'][$key] == 'Monthly') {
                  $price = $data['quote_price'][$key]*12;
                }else {
                  $price = $data['quote_price'][$key]*1;
                }
                $sum += $price;
                 ?>
                <!-- <td style="width: 14%;text-align: right;">{{number_format($data['quote_price'][$key])}}</td> -->
                <td style="width: 14%;text-align: right;">{{number_format($price)}}</td>
            </tr>
            @endforeach
            <tr>
                <!-- <td colspan="3" style="text-align: right;">{{number_format(array_sum($data['quote_price']))}}</td> -->
                <td colspan="3" style="text-align: right;">{{$sum}}</td>
            </tr>

            <tr>
                <td>VAT</td>
                <td>20%</td>
                <td style="text-align: right;" >{{$sum*20/100}}</td>

            </tr>
            <tr>
                <td>Experlu Fee</td>
                <td>25%</td>
                <td style="text-align: right;" >{{$sum*25/100}}</td>

            </tr>
            <tr style="background-color: #03840396;font-weight: 700;">
                <td colspan="2">Total</td>

                <td  style="text-align: right;">{{$sum + $sum*20/100}}</td>
            </tr>
        </tbody>
    </table>
</div>
<p style="font-size: 20px;color: #072f44; padding-top: 0px;font-weight: 700;">The Experlu fee for this job will be <strong>£{{$sum*25/100}}</strong> plus VAT</p>
