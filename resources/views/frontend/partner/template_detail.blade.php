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

<?php $service_required=json_decode($data->q_services, true);  ?>
<div class="container" style="margin-top: 9rem; margin-bottom: 5rem;">
	<div class="row">
		<div class="col-md-12">
			<div role="tabpanel">
				<!-- Nav tabs -->
				@if(Session::has('faUser'))
				<ul class="nav nav-tabs main-tabs" role="tablist">
					<li role="presentation">
						<a href="{{url('partner/partner_dashboard#job_section')}}" aria-controls="job_section">New Jobs</a>
					</li>
					<li role="presentation" class="active">
						<a href="{{url('partner/partner_dashboard#job_management')}}" aria-controls="job_management" style="cursor: pointer;">My Jobs</a>
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
				@endif
				<div class="tab-content">
					<div role="tabpanel">
						<div class="col-md-3">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs profile_tabs" role="tablist">
								<li>
									<div class="text-center company-info">
										<div style="height: 65px; width: 50px; margin: 0 auto;"><img src="{{asset('frontend-assets/images/job_logo.PNG')}}"></div>
										<p>Company Name: {{$data->company_name}}</p>
										<p>Location: {{$data->location}}</p>
									</div>
								</li>
								<li role="presentation" class="active">
									<a href="#case_detail" aria-controls="case_detail" role="tab" data-toggle="tab">Case details</a>
								</li>
								<li role="presentation">
									<a href="#quote" aria-controls="quote" role="tab" data-toggle="tab">Quote</a>
								</li>
							</ul>
							<!-- Tab panes -->
						</div>
						<div class="col-md-9">
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="case_detail">
									<div class="row">
										<div class="col-xs-12">
											<div class="row">
												<div class="col-md-12">
													<div class="about-section-content">
														<h4>About the client</h4>
														<div class="row">
															<div class="col-xs-8">
																<p>Case Status:  {{$data->status}}</p>
																<p><i class="fa fa-user"></i>  Client Name: {{$data->customer_name}}</p>
																<p><i class="fa fa-building"></i>  Company Name: {{$data->company_name}}</p>
																<p><i class="fa fa-map-marker"></i>  Location: {{$data->city}}</p>
															</div>
															<div class="col-xs-4">
																<a href="" title='{{$data->mobile_code}}{{$data->mobilenumber}}' class="btn cta-button btn-block btn-lg"><i class="fa fa-phone"></i> Call Client</a>
																<a href="" title='{{$data->job_email}}' class="btn cta-button btn-block btn-lg"><i class="fa fa-envelope"></i> E-mail the Client</a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="case-section">
												<div role="tabpanel">
													<!-- Nav tabs -->
													<ul class="nav nav-tabs main-tabs	" role="tablist">
														<li role="presentation" class="active">
															<a href="#highlights" aria-controls="highlights" role="tab" data-toggle="tab">Job Highlights</a>
														</li>
														<li role="presentation">
															<a href="#service_needed" aria-controls="service_needed" role="tab" data-toggle="tab">Services needed</a>
														</li>
														<li role="presentation">
															<a href="#caseDetail" aria-controls="caseDetail" role="tab" data-toggle="tab">Job detail</a>
														</li>
														<li role="presentation">
															<a href="#description" aria-controls="tab" role="tab" data-toggle="tab">Job description</a>
														</li>
													</ul>

													<!-- Tab panes -->
													<div class="tab-content">
														<div role="tabpanel" class="tab-pane active" id="highlights">
															<div class="row">
																<div class="col-md-12">
																	<div class="about-section-content">
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
															</div>
														</div>
														<div role="tabpanel" class="tab-pane" id="service_needed">
															<div class="row">
																<div class="col-md-12">
																	<div class="about-section-content">
																		<h4>Services needed</h4>
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
																</div>
															</div>
														</div>
														<div role="tabpanel" class="tab-pane" id="caseDetail">
															<div class="row">
																<div class="col-md-6">
																	<div class="about-section-content">
																		<h4>About the Client</h4>
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
																		<h4>Client Contact Preference</h4>
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
																<div class="col-md-6">
																	<div class="about-section-content">
																		<h4>Preferences for the partner</h4>
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
														</div>
														<div role="tabpanel" class="tab-pane" id="description">
															<div class="about-section-content">
																<h5><strong>Description</strong></h5>
																<p>
																	{{$data->job_case}}
																</p>
																<!--<div class="text-center">
																	<a href="{{ url('partner/pdf/'.$data->job_id)}}" class="btn btn-primary btn-lg">Download as PDF</a>
																</div>-->
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div role="tabpanel" class="tab-pane" id="quote">
									<div class="row">
										<div class="col-md-12">
											<div class="about-section-content">
												<h4>Quote</h4>
												<div class="row">
													<div class="col-md-6"><b>Status:</b> Case {{$data->status}}</div>
													<div class="col-md-6"><b>Created Date:</b> 12-12-2090</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<p style="padding-bottom:0;"><b>Service</b></p>
														<?php
															$q_service = json_decode($data->q_services);
															$quote_price = json_decode($data->quote_price);
															// print_r($data->q_services); die;
														 ?>
														@foreach($q_service as $service)
														<p style="padding-bottom:0;">{{$service}}</p>
														@endforeach
													</div>
													<div class="col-md-6">
														<p style="padding-bottom:0;"><b>Price</b></p>
														@foreach($quote_price as $price)
														<p style="padding-bottom:0;">£{{$price}}</p>
														@endforeach
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<h5><strong>Description</strong></h5>
														<p>{{$data->quote}}</p>
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
		</div>
	</div>
</div>
@endsection
