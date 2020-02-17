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
			<!-- <p><img alt="" src="{{asset('/frontend-assets/images/partner/thankyou.jpg')}}" width="100%" /></p> -->
			<h3>Request For Refund Invoice PAYMENT</h3>
      <form class="" id="invoice-form" action="{{url('/partner/request-refund')}}" method="post">
        {{csrf_field()}}
        <label>Invoice ID: {{$invoice->id}}</label>
        <input type="hidden" name="id" value="{{$invoice->id}}">
        <input type="hidden" name="p_id" value="{{$invoice->p_id}}">
        <input type="hidden" name="p_id" value="{{$invoice->p_id}}">
        <input type="hidden" name="payment_id" value="{{$invoice->payment_id}}">
        <input type="hidden" name="amount" value="{{$invoice->amount}}">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Upload Picture/File for Proof</label>
              <input type="file" name="image" class="form-control">
            </div>
          </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Reason for Refund</label>
                <textarea name="reason" class="form-control tex-editor" rows="3"></textarea>
              </div>
            </div>
          </div>
          <div class="form-group text-center">
            <button type="submit" id="refund_btn" class="btn btn-warning">Request For Refund</button>
          </div>
        </div>
      </form>

		</div>
	</div>
</div>
@endsection
@section('script')
<script>
// Add Category through ajax
$("#invoice-form").on('submit', function (e) {
  e.preventDefault();
  form = new FormData(this);

  $.ajax({
    type: "POST",
    url:" {{ url('/partner/request-refund')}}",
    data: form,
    cache: false,
    contentType: false,
    processData: false,
    success: function(data){
      toastr.success('Request Send Successfully', '', {timeOut: 5000, positionClass: "toast-top-right"});
      window.location.href = "{{url('/partner/partner_dashboard')}}";

    },
    error: function() {
      $('#gifid').hide();
      $('#loading').hide();
      $('#checkcatid').prop("disabled",false);
      alert("Error posting feed");
    }
  });
  //return false;
});

</script>
@endsection
