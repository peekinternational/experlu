@extends('layouts.app')
@section('content')
<style>
	body{
		background-color: #fff;
	}
	.hero{
		display: none;
	}
</style>
<?php $service=json_decode($data->service_needed, true); ?>
<?php $service_required=json_decode($data->service_required, true);  ?>
<div class="container" style="margin-top: 9rem;">
	<div class="row">
		<div class="col-md-12">
			<div role="tabpanel">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs main-tabs" role="tablist">
					<li role="presentation">
						<a href="{{url('partner/partner_dashboard#job_section')}}" aria-controls="job_section">New Jobs</a>
					</li>
					<li role="presentation" class="active">
						<a href="{{url('partner/partner_dashboard#job_management')}}" style="cursor: pointer;">My Jobs</a>
					</li>
					<li role="presentation">
						<a href="{{url('partner/partner_dashboard#profile')}}" aria-controls="profile">Business Profile</a>
					</li>
					<li role="presentation">
						<a href="{{url('partner/partner_dashboard#account')}}" aria-controls="account" role="tab" data-toggle="tab">Account</a>
					</li>
					<!-- <li role="presentation">
						<a href="{{url('partner/partner_dashboard#messages')}}" aria-controls="messages" role="tab" data-toggle="tab">Personal messages with client</a>
					</li>
					<li role="presentation">
						<a href="{{url('partner/partner_dashboard#terms')}}" aria-controls="terms" role="tab" data-toggle="tab">Terms & Conditions</a>
					</li> -->
				</ul>
				<div class="tab-content">
					<div role="tabpanel">

						<div class="col-md-12">
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="case_detail">
									<div class="row">
										<div class="col-xs-12">
											<div class="row">
												<div class="col-md-12">
													<div class="about-section-content">
														<div class="row">
															<div class="col-md-4">
															<h4><strong>About the client</strong></h4>
																<div class="row">
																	<div class="col-xs-12">
																		<p>Case Status:  {{$data->status}}</p>
																		<p><i class="fa fa-user"></i>  Client Name: {{$data->customer_name}}</p>
																		<p><i class="fa fa-building"></i>  Company Name: {{$data->company_name}}</p>
																		<p><i class="fa fa-map-marker"></i>  Location: {{$data->city}}</p>
																	</div>
																	<!-- <div class="col-xs-12">

																		<button class="btn cta-button btn-lg"  style="width: 49%;"><i class="fa fa-phone"></i> Call Client</button>
																		<button class="btn cta-button btn-lg"   style="width: 49%;"><i class="fa fa-envelope"></i> E-mail the Client</button>
																	</div> -->
																</div>
															</div>
															<div class="col-md-4">
																<h4><strong>Services needed</strong></h4>
																<div class="row">
																	@if($service_required)
																	@foreach($service_required as $data_need)
																	<div class="col-md-12">
																		{{$data_need}}
																	</div>
																	@endforeach
																	@endif
																</div>
														</div>
														<div class="col-md-4">
															<div>
																<h4><strong>Preferences for the partner</strong></h4>
																@if($data->expert_requiremnt !="")
																<div class="row">
																	<div class="col-md-6">Preferred Expert Requirements</div>
																	<div class="col-md-6">{{$data->expert_requiremnt}}</div>
																</div>
																@endif
																@if($data->expert_1 !="")
																<div class="row">
																	<div class="col-md-6">Partner should be (1)</div>
																	<div class="col-md-6">{{$data->expert_1}}</div>
																</div>
																@endif
																@if($data->expert_2 !="")
																<div class="row">
																	<div class="col-md-6">Partner should be (2)</div>
																	<div class="col-md-6">{{$data->expert_2}}</div>
																</div>
																@endif
																@if($data->expert_3 !="")
																<div class="row">
																	<div class="col-md-6">Partner should be (3)</div>
																	<div class="col-md-6">{{$data->expert_3}}</div>
																</div>
																@endif
																@if($data->local_expert !="")
																<div class="row">
																	<div class="col-md-6">Local Expert</div>
																	<div class="col-md-6">{{$data->local_expert}}</div>
																</div>
																@endif
																@if($data->expert_choice !="")
																<div class="row">
																	<div class="col-md-6">Working style</div>
																	<div class="col-md-6">{{$data->expert_choice}}</div>
																</div>
																@endif
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-md-4">
															<div>
																<h4><strong>Job Highlights</strong></h4>
																<div class="row">
																	<div class="col-md-6">Legal Structure</div>
																	<div class="col-md-6">{{$data->legal_structure}}</div>
																</div>
																@if($data->currency !="")
																<div class="row">
																	<div class="col-md-6">Currency</div>
																	<div class="col-md-6">{{$data->currency}}</div>
																</div>
																@endif
																@if($data->turnover !="")
																<div class="row">
																	<div class="col-md-6">Turnover</div>
																	<div class="col-md-6">{{$data->turnover}}</div>
																</div>
																@endif
																@if($data->year_end !="")
																<?php
																$date = $data->year_end;
																$show_date = DateTime::createFromFormat('Y-m-d', $date)->format('d F Y');
																 ?>
																<div class="row">
																	<div class="col-md-6">Year End </div>
																	<div class="col-md-6">{{$show_date}}</div>
																</div>
																@endif
																@if($data->deadline !="")
																<?php
																// $date_return = date($data->deadline);
																// print_r($date_return); die;

																$date2 = $data->deadline;
																$show_date2 = DateTime::createFromFormat('Y-m-d', $date2)->format('d F Y');
																 ?>
																<div class="row">
																	<div class="col-md-6">Deadline </div>
																	<div class="col-md-6">{{$show_date2}}</div>
																</div>
																@endif
																@if($data->nmber_location !="")
																<div class="row">
																	<div class="col-md-6">Number of Locations</div>
																	<div class="col-md-6">{{$data->nmber_location}}</div>
																</div>
																@endif
																@if($data->bookkeeping_status !="")
																<div class="row">
																	<div class="col-md-6">Current Bookkeeping Status</div>
																	<div class="col-md-6">{{$data->bookkeeping_status}}</div>
																</div>
																@endif
																@if($data->software_use !="")
																<div class="row">
																	<div class="col-md-6">Software Use</div>
																	<div class="col-md-6">{{$data->software_use}}</div>
																</div>
																@endif
																@if($data->budget !="")
																<div class="row">
																	<div class="col-md-6">Budget</div>
																	<div class="col-md-6">{{$data->budget}}</div>
																</div>
																@endif
																@if($data->other !="")
																<div class="row">
																	<div class="col-md-6">Other</div>
																	<div class="col-md-6">{{$data->other}}</div>
																</div>
																@endif
															</div>
														</div>
														<div class="col-md-4">
															<div>
																<h4><strong>About the Client</strong></h4>
																@if($data->industry !="")
																<div class="row">
																	<div class="col-md-6">Industry</div>
																	<div class="col-md-6">{{$data->industry}}</div>
																</div>
																@endif
																@if($data->owner_experience !="")
																<div class="row">
																	<div class="col-md-6">Experience as a Business Owner</div>
																	<div class="col-md-6">{{$data->owner_experience}}</div>
																</div>
																@endif
																@if($data->reason_change !="")
																<div class="row">
																	<div class="col-md-6">Reason for Change (if applicable)</div>
																	<div class="col-md-6">{{$data->reason_change}}</div>
																</div>
																@endif
																@if($data->other_requirement !="")
																<div class="row">
																	<div class="col-md-6">Any other Requirements</div>
																	<div class="col-md-6">{{$data->other_requirement}}</div>
																</div>
																@endif
															</div>
														</div>
														<div class="col-md-4">
															<div>
																<h4><strong>Client Contact Preference</strong></h4>
																@if($data->mode !="")
																<div class="row">
																	<div class="col-md-6">Mode</div>
																	<div class="col-md-6">{{$data->mode}}</div>
																</div>
																@endif
																@if($data->time !="")
																<div class="row">
																	<div class="col-md-6">Time</div>
																	<div class="col-md-6">{{$data->time}}</div>
																</div>
																@endif
																@if($data->when_hire !="")
																<div class="row">
																	<div class="col-md-6">Looking to Hire</div>
																	<div class="col-md-6">{{$data->when_hire}}</div>
																</div>
																@endif
																@if($data->deadlines_approch !="")
																<div class="row">
																	<div class="col-md-6">Deadlines</div>
																	<div class="col-md-6">{{$data->deadlines_approch}}</div>
																</div>
																@endif
															</div>
														</div>
														</div>
													</div>
												</div>
											</div>
											<!-- Case Description -->
											<div class="row">
												<div class="col-xs-12">
													<div class="about-section-content">
														<h4>Job Description</h4>
														<p>
															{{$data->job_case}}
														</p>
														<div class="text-right" style="display:none;">
															<a href="{{ url('partner/pdf/'.$data->job_id)}}" class="btn btn-primary">Download as PDF</a>
														</div>
													</div>
												</div>
											</div>
											<!-- End Case Description -->
											<!-- Quote Section -->
											<div class="row">
												<div class="col-xs-12">
													<div class="about-section-content">
														<form action="{{ url('quotepost')}}" method="POST" role="form">
															 {{ csrf_field() }}
															<input type="hidden" name="job_id" id="" value="{{$data->job_id}}" >
															<div class="form-group" id="top_row">
																<div class="servies_list" >
																	<div class="row" >
																		<div class="col-xs-5">
																			<label>Service</label>
																			<select class="form-control" name="q_services[]">
																				@if($service_required) @foreach($service_required as $data_need)
																				<option value="{{$data_need}}">{{$data_need}}</option>
																				@endforeach
																				@endif
																			</select>
																		</div>
																		<!-- <div class="col-xs-5">
																			<label>Service</label>
																			<select class="form-control" name="q_services[]">
																				<option>Select Service</option>
																				@if($service) @foreach($service as $data_need)
																				<option value="{{$data_need}}">{{$data_need}}</option>
																				@endforeach
																				@endif
																			</select>
																		</div> -->
																		<div class="col-xs-3">
																			<label>Payment frequency</label>
																			<select class="form-control" name="payment_frquency[]">
																				<option>Weekly</option>
																				<option>Monthly</option>
																				<option>Yearly</option>
																			</select>
																		</div>
																		<div class="col-xs-3">
																			<label>Price</label>
																			<input type="text" name="quote_price[]" class="form-control quote_price">
																		</div>
																		<div class="col-xs-1" style="line-height: 5;">
																			<a href="javascript:void(0)" class="add_more"><i class="fa fa-plus"></i></a>
																		</div>
																	</div>
																</div>
															</div>
															<div id="main_div" style="display:none">
															<div id="qoute_ajax"></div>
															<div class="form-group" >
																<label for="">Enter Quote</label>
																<textarea name="quote" id="" class="form-control" rows="6" required="required"></textarea>
															</div>

															@if(FA::checkquote($data->job_id) > 3)
																<label class="fa fa-exclamation-triangle">Note:</label> Already three partners have quoted on this job, there is a possibility your quote may not be accepted
																@endif

                              <div class="form-group text-left">
																<button type="button" class="btn btn-success" id="back">Back</button>
																<button type="submit" class="btn btn-success pull-right">Submit</button>
															</div>
															<!-- <div class="form-group text-right">

															</div> -->
															</div>
															<div class="form-group text-right">
																<button type="button" class="btn btn-success" id="next">Next</button>
															</div>

														</form>
													</div>
												</div>
											</div>
											<!-- End Quote section -->
										</div>
									</div>
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
	$(document).ready(function(){
    $('#next').attr('disabled',true);
    $('.quote_price').keyup(function(){
        if($(this).val().length !=0)
            $('#next').attr('disabled', false);
        else
            $('#next').attr('disabled',true);
    })
});

	var services= <?php echo json_encode($service); ?>;
	var services_required= <?php echo json_encode($service_required); ?>;
	console.log(services_required);

	var x = 0;
	$('.add_more').click(function(){
		var ser='';
	for(var i=0; i < services_required.length; i++){
		console.log(services_required[i]);
		ser+='<option value="'+services_required[i]+'">'+services_required[i]+'</option>';
	}
	//Check maximum number of input fields

		//Increment field counter

		var fieldHTML2 = '<div class="row" id="service'+x+'">'+
		'<div class="col-xs-5"><label>Service</label>'+
		'<select class="form-control" name="q_services[]"><option>Select Service</option>'+ser+
		'</select>'+
		'</div>'+
		'<div class="col-xs-3"><label>Payment frequency</label>'+
		'<select class="form-control" name="payment_frquency[]">'+
		'<option>Weekly</option>'+
		'<option>Monthly</option>'+
		'<option>Yearly</option>'+
		'</select>'+
		'</div>'+
		'<div class="col-xs-3">'+
		'<label>Price</label>'+
		'<input type="text" name="quote_price[]" class="form-control quote_price">'+
		'</div>'+
		'<div class="col-xs-1" style="line-height: 5;">'+
		'<a href="javascript:void(0)" class="remove_service" onclick="deleteService('+x+');"><i class="fa fa-minus"></i></a>'+
		'</div>'; //New input field html



		$('.servies_list').append(fieldHTML2); //Add field html
		x++;
	});
	function deleteService(id){

		$('#service'+id).remove();
	};


	$('#next').click(function(){
		var formdata=$('form').serialize();
		console.log(formdata);
		$.ajax({
        url: "{{ url('quote_ajax')}}",
        type: "post",
        data: formdata ,
        success: function (response) {
			console.log(response);
         $('#qoute_ajax').html(response);
           // You will get response from your PHP page (what you echo or print)
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
    });
			$('#main_div').show();
			$('#top_row').hide();
			$('#next').hide();
		});
	$('#back').click(function(){
			$('#main_div').hide();
			$('#top_row').show();
			$('#next').show();
   });

</script>
@endsection
