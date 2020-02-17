@extends('layouts.app')
@section('content')
<style>
body{
	background-color: #fff;
}
.hero{
	display: none;
}
.orange-star {
	color: #FF7814 !important;
}
.grey-star {
    color: #8e8c8c !important;
}
</style>
<?php
$service=json_decode($userinfo->services, true);

$userImage = url('frontend-assets/images/images.png');
if($userinfo->logo != ''){

	$userImage = url('frontend-assets/partner/profile-photos/'.$userinfo->logo);

}
//print_r(FA::checkquote()); die;
$tJobs=0;
foreach($jobs as $item){
	$tJobs+=count($item);
}


?>

<div class="container" style="margin-top: 9rem; margin-bottom: 6rem;">
	<div class="row">
		<div class="col-md-12">
			<div role="tabpanel">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs main-tabs" role="tablist">
					<li role="presentation" class="active">
						<a href="#job_section" aria-controls="job_section" role="tab" data-toggle="tab">New Jobs</a>
					</li>
					<li role="presentation">
						<a href="#job_management" aria-controls="job_management" role="tab" data-toggle="tab">My Jobs</a>
					</li>
					<li role="presentation">
						<a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Business Profile</a>
					</li>
					<li role="presentation">
						<a href="#account" aria-controls="account" role="tab" data-toggle="tab">Account</a>
					</li>
					<!-- <li role="presentation">
					<a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Personal messages with client</a>
				</li> -->
				<!-- <li role="presentation">
				<a href="#terms" aria-controls="terms" role="tab" data-toggle="tab">Terms & Conditions</a>
			</li> -->
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="job_section">
				@if(session()->has('message'))
				<div class="row">
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
						<strong>Message:</strong>{{session()->get('message')}}
					</div>
				</div>
				@endif

				<div role="tabpanel">
					<!-- Nav tabs -->
					<ul class="nav nav-pills" role="tablist">
						<li role="presentation" class="active">
							<a href="#all_jobs" aria-controls="all_jobs" role="tab" data-toggle="tab">All Jobs ({{$alljobs->count()}})</a>
						</li>
						<li role="presentation">
							<a href="#profile_jobs" aria-controls="profile_jobs" role="tab" data-toggle="tab">My Matches ({{$tJobs}})</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="all_jobs">
							<div class="row">
								@foreach($alljobs as $alljob)
								<div class="col-md-8">
									<div>
										<div class="sc-hmzhuo fPEirj">
											<div class="sc-caSCKo dokwNX">
												<div class="sc-jhAzac ibcqOI">
													<div>
														<div style="height: 50px; width: 50px;"><img src="{{asset('frontend-assets/images/job_logo.PNG')}}"></div>
													</div>

													<div>
														<div class="sc-TOsTZ hiHQAi" style="text-transform: capitalize;"><b>{{$alljob->job_title}}</b></div>
														<p class="sc-ksYbfQ dFOSHG">
															<span>{{$alljob->city}} • </span>#{{$alljob->id}}</p>
														</div>
													</div>
													<div class="sc-cHGsZl iTODfi"><b>Description</b></div>
													<p>{{$alljob->job_case}}</p>
												</div>
												<div class="job_type">
													<div class="sc-caSCKo jKLHsR">
														<div class="row">
															<div class="col-sm-12">
																<label class="sc-kjoXOD cVJCmw"><b>Type</b></label>
																<div class="sc-kgAjT jAtXPi">
																	<span class="sc-hqyNC bVcWWB">{{$alljob->job_type}}</span>
																</div>
															</div>
														</div>
														<div class="sc-cJSrbW irwWzV"></div>
													</div>
												</div>

												<div class="sc-caSCKo laCNAj">
													<div class="sc-kgAjT ktcFPK service-txt"><b>Services needed</b></div>
													<div class="sc-cJSrbW irwWzV"></div>
													<div class="sc-jbKcbu eUIbYn row">
														<div class="col-sm-6">{{$alljob->services}}</div>
														<div class="col-sm-6">
															<span class="sc-hqyNC bVcWWB">Yearly</span>
															<span> {{$alljob->ended_year}}</span>
														</div>
													</div>
												</div>
												<div class="collapse"></div>
												<div class="row">
													<div class="col-md-7 col-md-offset-5">
														<div class="sc-jqCOkK btptCT sc-jhAzac hBLiWj" style="float: right;">
															<div>
																<!-- <button type="button" class="sc-iRbamj gkmRbZ">Read more</button> -->
															</div>
														</div>

													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="col-md-4"></div>
									@endforeach
								</div>
							</div>
							<div role="tabpanel" class="tab-pane" id="profile_jobs">
								<div class="row">

									@foreach($jobs as $item)
									@if(count($item)>0)
									@foreach($item as $job)

									<div class="col-md-8">
										<div>
											<div class="sc-hmzhuo fPEirj">
												<div class="sc-caSCKo dokwNX">
													<div class="sc-jhAzac ibcqOI">
														<div>
															<div style="height: 50px; width: 50px;"><img src="{{asset('frontend-assets/images/job_logo.PNG')}}"></div>
														</div>

														<div>
															<div class="sc-TOsTZ hiHQAi" style="text-transform: capitalize;"><b>{{$job->job_title}}</b></div>
															<p class="sc-ksYbfQ dFOSHG">
																<span>{{$job->city}} • </span>#{{$job->id}}</p>
															</div>
														</div>
														<div class="sc-cHGsZl iTODfi">Description</div>
														{{$job->job_case}}
													</div>
													<div class="job_type">
														<div class="sc-caSCKo jKLHsR">
															<div class="row">
																<div class="col-sm-12">
																	<label class="sc-kjoXOD cVJCmw"><b>Type</b></label>
																	<div class="sc-kgAjT jAtXPi">
																		<span class="sc-hqyNC bVcWWB">{{$job->job_type}}</span>
																	</div>
																</div>
															</div>
															<div class="sc-cJSrbW irwWzV"></div>
														</div>
													</div>
													<div class="sc-caSCKo laCNAj">
														<div class="sc-kgAjT ktcFPK service-txt"><b>Services needed</b></div>
														<div class="sc-cJSrbW irwWzV"></div>
														<div class="sc-jbKcbu eUIbYn row">
															<div class="col-sm-6">{{$job->services}}</div>
															<div class="col-sm-6">
																<span class="sc-hqyNC bVcWWB">Yearly</span>
																<span>{{$job->ended_year}}</span>
															</div>
														</div>
													</div>
													<div class="collapse"></div>
													<div class="row" style="margin: 0;">
														<div class="col-md-4 col-md-offset-8">
															<div class="sc-jqCOkK btptCT sc-jhAzac hBLiWj">
																<!-- <div>
																<button type="button" class="sc-iRbamj gkmRbZ">Read more</button>
															</div> -->
															<?php
															date_default_timezone_set("Asia/Karachi");
															$datetime1 = new DateTime();
															$date=date('d-m-Y H:i:s', strtotime('+5 days',strtotime($job->quote_time)));
															$datetime2 = new DateTime($date);
															$interval = $datetime1->diff($datetime2);

															// dd($interval);
															// dd($interval->days);
															?>
															@if($job->quote_status == 0)
															<div class="sc-jhAzac jqgdQA">
																<a  class="sc-bRBYWo eeChfy" href="{{url('partner/job_detail/'.$job->id)}}" style="cursor: pointer;">Create a proposal</a>
																<div class="text-center" style="color: rgb(126, 126, 126); margin-top: 10px;">
																</div>
															</div>

															@elseif($interval->days >0 &&  $interval->invert ==0)
																<div class="sc-jhAzac jqgdQA">
																	@if(FA::checkalreadyquote($job->id) > 0)
																	<span  class="sc-bRBYWo btn btn-info" style="cursor: pointer;">Already Quoted</sapn>
																		@else
																		<a  class="sc-bRBYWo eeChfy" href="{{url('partner/job_detail/'.$job->id)}}" style="cursor: pointer;">Create a proposal</a>
																		<div class="text-center" style="color: rgb(126, 126, 126); margin-top: 10px;">
																			<p style="font-size:14px;">Job will close in {{$interval->format('%d days %h hour %i Min')}}</p>
																		</div>
																		@endif
																	</div>
																	@else
																	<div class="sc-jhAzac jqgdQA">
																		<span class="sc-bRBYWo btn btn-danger"  style="cursor: pointer;">Time out</span>
																		<div class="text-center" style="color: rgb(126, 126, 126); margin-top: 10px;">
																		</div>
																	</div>
																	@endif
																</div>

															</div>
														</div>

													</div>
												</div>
											</div>

											<div class="col-md-4"></div>
											@endforeach
											@endif
											@endforeach
										</div>
									</div>
								</div>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane" id="job_management">
							<div role="tabpanel">
								<!-- Nav tabs -->
								<ul class="nav nav-pills" role="tablist">
									<li role="presentation" class="active">
										<a href="#current_quote" aria-controls="current_quote" role="tab" data-toggle="tab">Current Quotes</a>
									</li>
									<li role="presentation">
										<a href="#previous_quote" aria-controls="previous_quote" role="tab" data-toggle="tab">Previous Quotes</a>
									</li>
								</ul>

								<!-- Tab panes -->
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active" id="current_quote">
										<div class="row">
											<div class="col-md-12">
												<table class="table table-hover">
													<thead>
														<tr>
															<th>ID</th>
															<th>Name</th>
															<th>Location</th>
															<th>Phone</th>
															<th>Notes</th>
															<th>Quote Date</th>
															<th>Quote Price</th>
															<th>Status</th>
															<th>Mark</th>
															<th>Review</th>
														</tr>
													</thead>
													<tbody>

														@foreach($rquote as $quots)
														<tr>
															<td><a href="{{url('partner/template_detail/'.$quots->job_id)}}">{{$quots->id}}</a></td>
															<td>{{$quots->job_title}}</td>
															<td>{{$quots->city}}</td>
															<td>{{$quots->mobilenumber}}</td>
															<td>{{$quots->quote}}</td>
															<td>{{$quots->created_at}}</td>
															<td>
																<?php $val=0; ?>
																 <?php
																   $val=$val + array_sum(@json_decode($quots->quote_price));
																   ?>
																<?php echo '£ '.number_format($val, 2); ?>
																</td>
															<td>{{$quots->status}}</td>
															<td>
																@if($quots->status == 'Loss' || $quots->status == 'Won' )
																@if($quots->mark =='1')
																<i class="fa fa-check"></i>
																@else
																<div id="{{$quots->id}}">
																	<input type="checkbox" class="form-control" onclick="mark('{{$quots->id}}')" value="1" <?php echo ($quots->mark == '1') ? 'checked' : ''; ?>>
																</div>
																@endif
																@endif
															</td>
															<td>
															@if($quots->status == 'Loss' || $quots->status == 'Won' )
																<a href="javascript:void(0);" onclick="sendEmail('{{$quots->id}}','{{$quots->job_id}}','{{$quots->p_id}}','{{$quots->job_email}}');" class="btn btn-xs btn-primary">Get Review</a>
															@endif
															</td>
														</tr>
														@endforeach
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<div role="tabpanel" class="tab-pane" id="previous_quote">
										<div class="row">
											<div class="col-md-12">
												<table class="table table-hover">
													<thead>
														<tr>
															<th>ID</th>
															<th>Name</th>
															<th>Location</th>
															<th>Phone</th>
															<th>Notes</th>
															<th>Quote Date</th>
															<th>Status</th>
														</tr>
													</thead>
													<tbody>
														@foreach($pquots as $quots)
														<tr>
															<td><a href="{{url('partner/template_detail/'.$quots->job_id)}}">{{$quots->id}}</a></td>
															<td>{{$quots->job_title}}</td>
															<td>{{$quots->city}}</td>
															<td>{{$quots->mobilenumber}}</td>
															<td>{{$quots->quote}}</td>
															<td>{{$quots->created_at}}</td>
															<td>{{$quots->status}}</td>
														</tr>
														@endforeach
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane" id="profile">
							<!-- Profile Section -->
							<div class="row">
								<div role="tabpanel">
									<div class="col-md-3">
										<!-- Nav tabs -->
										<ul class="nav nav-tabs profile_tabs" role="tablist">
											<li role="presentation" class="active">
												<a href="#profile_tab" aria-controls="profile_tab" role="tab" data-toggle="tab">Profile</a>
											</li>
											<li role="presentation">
												<a href="#review" aria-controls="review" role="tab" data-toggle="tab">Reviews</a>
											</li>
											<li role="presentation">
												<a href="#widget" aria-controls="widget" role="tab" data-toggle="tab">Certifications</a>
											</li>
											<li role="presentation">
												<a href="#segmentation" aria-controls="segmentation" role="tab" data-toggle="tab">Profile Badges</a>
											</li>
											<li role="presentation">
												<a href="#verification" aria-controls="verification" role="tab" data-toggle="tab">Verification</a>
											</li>
											<!-- <li role="presentation">
											<a href="#billing" aria-controls="cv" role="tab" data-toggle="tab">Billing</a>
										</li> -->
									</ul>

									<!-- Tab panes -->
								</div>
								<div class="col-md-9">
									<div class="tab-content">
										<div role="tabpanel" class="tab-pane active" id="profile_tab">
											<div class="sc-hmzhuo fPEirj">
												<div class="sc-caSCKo jKLHsR">
													<h2>Company profile</h2>
													<div class="sc-TOsTZ hiHQAi">Company description</div>
													<div class="sc-cHGsZl iTzrAd">{{$userinfo->company_des}}</div>
													<div class="sc-cJSrbW gCuqTd"></div>
													<div class="sc-TOsTZ hiHQAi">Company logo</div>

													<div class="dropzone text-center company-logo">
														<img class="uploaded-logo" src="{{$userImage}}" alt="...">



													</div>
													<div class="row">
														<div class="col-sm-6">
															<button type="button" class="sc-iRbamj jRzhOj" onclick="deletepicture()">Delete logo</button>
														</div>
														<div class="col-sm-6">
															<label type="button" for="upload_logo" class="sc-iRbamj mfToJ">Upload logo</label>
															<input type="file" class="upload" id="upload_logo"  name="logo"  onchange="uploadpicture(this)" style="opacity: 0;">
														</div>
													</div>
												</div>
												<div class="sc-cJSrbW jcDgkN"></div>
												<div>
													<form action="{{url('partner/partner_dashboard')}}" method="post">
														{{ csrf_field() }}
														<div class="sc-caSCKo jKLHsR">
															<div class="sc-TOsTZ hiHQAi">Introduce yourself</div>
															<div class="sc-cHGsZl iTzrAd">Inform your clients that waht is your aim and what you want to to do.</div>
															<div class="form-group">
																<label>Your name</label>
																<input type="text" class="form-control" name="name" readonly="" value="{{Session::get('faUser')->name}}">
															</div>
															<div class="form-group">
																<label>Introduce yourself</label>
																<textarea class="form-control" name="introduce_urself" cols="8" rows="5">{{$userinfo->introduce_urself}}</textarea>
															</div>
															<div class="form-group">
																<label>Qualification</label>
																<input type="file" class="form-control" name="qualification">
															</div>
															<div class="form-group">
																<label>Professional indemnity</label>
																<input type="file" class="form-control" name="professional">
															</div>
															<div class="form-group">
																<label>Location</label>
																<input type="text" class="form-control" name="location" value="{{$userinfo->location}}">
															</div>

														</div>
														<div class="sc-caSCKo jKLHsR">
															<div class="sc-TOsTZ hiHQAi">Company information</div>
															<div class="sc-cHGsZl iTzrAd">Inform clients of basic information about your company, headquarter location and phone number.</div>
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label>Business Name</label>
																		<input type="text" name="company_name" class="form-control" placeholder="Company Name" value="{{$userinfo->company_name}}">
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label>Business Email</label>
																		<input type="Email" name="company_email" class="form-control" placeholder="Company Email" value="{{$userinfo->company_email}}">
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label>VAT Number</label>
																		<input type="text" name="vat_number" class="form-control" placeholder="VAT Number" value="{{$userinfo->vat_number}}">
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label>Company Number</label>
																		<input type="text" name="company_number" class="form-control" placeholder="Company Number" value="{{$userinfo->company_number}}">
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group undefined">
																		<label for="availability" class="sc-bbmXgH fNHatV control-label">Availability</label>
																		<select id="availability" name="availability" class="sc-tilXH bOxhYq form-control">
																			<option value="" >Select..</option>
																			<option value="1" {{ $userinfo->availability == '1' ? 'selected="selected"' : '' }}>24 / 7 - 365</option>
																			<option value="2" {{ $userinfo->availability == '2' ? 'selected="selected"' : '' }}>Regular office hours</option>
																			<option value="3" {{ $userinfo->availability == '3' ? 'selected="selected"' : '' }} >Extended office hours</option>
																		</select>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group undefined">
																		<label for="no_clients" class="sc-bbmXgH fNHatV control-label">Number of clients</label>
																		<select id="no_clients" name="no_clients" class="sc-tilXH bOxhYq form-control">
																			<option value="" >Select..</option>
																			<option value="1" {{ $userinfo->no_clients == '1' ? 'selected="selected"' : '' }}>0-50</option>
																			<option value="2" {{ $userinfo->no_clients == '2' ? 'selected="selected"' : '' }}>51-100</option>
																			<option value="3" {{ $userinfo->no_clients == '3' ? 'selected="selected"' : '' }}>101-200</option>
																			<option value="4" {{ $userinfo->no_clients == '4' ? 'selected="selected"' : '' }}>201-300</option>
																			<option value="5" {{ $userinfo->no_clients == '5' ? 'selected="selected"' : '' }}>301-500</option>
																			<option value="6" {{ $userinfo->no_clients == '6' ? 'selected="selected"' : '' }}>501-750</option>
																			<option value="7" {{ $userinfo->no_clients == '7' ? 'selected="selected"' : '' }}>751-1000</option>
																			<option value="8" {{ $userinfo->no_clients == '8' ? 'selected="selected"' : '' }}>&gt;1000</option>
																		</select>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group undefined">
																		<label for="no_employs" class="sc-bbmXgH fNHatV control-label">Number of employees</label>
																		<select id="no_employs" name="no_employs" class="sc-tilXH bOxhYq form-control">
																			<option value="" >Select..</option>
																			<option value="1" {{ $userinfo->no_employs == '1' ? 'selected="selected"' : '' }}>0-5</option>
																			<option value="2" {{ $userinfo->no_employs == '2' ? 'selected="selected"' : '' }}>6-10</option>
																			<option value="3" {{ $userinfo->no_employs == '3' ? 'selected="selected"' : '' }}>11-15</option>
																			<option value="4" {{ $userinfo->no_employs == '4' ? 'selected="selected"' : '' }}>16-20</option>
																			<option value="5" {{ $userinfo->no_employs == '5' ? 'selected="selected"' : '' }}>21-30</option>
																			<option value="6" {{ $userinfo->no_employs == '6' ? 'selected="selected"' : '' }}>31-45</option>
																			<option value="7" {{ $userinfo->no_employs == '7' ? 'selected="selected"' : '' }}>46-70</option>
																			<option value="8" {{ $userinfo->no_employs == '8' ? 'selected="selected"' : '' }}>71-100</option>
																			<option value="9" {{ $userinfo->no_employs == '9' ? 'selected="selected"' : '' }}>&gt;100</option>
																		</select>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group undefined">
																		<label for="establish" class="sc-bbmXgH fNHatV control-label">Established</label>
																		<input name="established" id="establish" class="sc-tilXH bOxhYq form-control" value="{{$userinfo->established}}" >
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group undefined">
																		<label for="website" class="sc-bbmXgH fNHatV control-label">Website</label>
																		<input name="website" id="website" class="sc-tilXH bOxhYq form-control" value="{{$userinfo->website}}">
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group undefined">
																		<label for="address" class="sc-bbmXgH fNHatV control-label">Address</label>
																		<input name="address" id="address" class="sc-tilXH bOxhYq form-control" value="{{$userinfo->address}}">
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group undefined">
																		<label for="post code" class="sc-bbmXgH fNHatV control-label">Postal code</label>
																		<input name="post_code" id="post code" class="sc-tilXH bOxhYq form-control" value="{{$userinfo->post_code}}" >
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group undefined">
																		<label for="city" class="sc-bbmXgH fNHatV control-label">City</label>
																		<input name="city" id="city" class="sc-tilXH bOxhYq form-control" value="{{$userinfo->city}}">
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group undefined">
																		<label for="phoneno" class="sc-bbmXgH fNHatV control-label">Phone number</label>
																		<input name="phoneno" id="phoneno" class="sc-tilXH bOxhYq form-control" value="{{$userinfo->phoneno}}" >
																	</div>
																</div>
															</div>
														</div>
														<div class="sc-cJSrbW jcDgkN"></div>
														<div class="sc-caSCKo jKLHsR">
															<div class="sc-TOsTZ hiHQAi">Description</div>

															<div class="sc-jnlKLf adGQN">
																<label for="companyInformation" class="sc-bbmXgH fNHatV control-label">Company Description</label>
																<textarea class="sc-gGBfsJ jrocpm" name="company_des" placeholder="company Description">{{$userinfo->company_des}}
																</textarea>
															</div>
															<br>
															<div>
																<div class="sc-jnlKLf adGQN">
																	<label for="attributes[11].selected[0].title" class="sc-bbmXgH fNHatV control-label">Company introduction</label>
																	<textarea class="sc-gGBfsJ jrocpm" name="company_info">{{$userinfo->company_info}}</textarea>
																</div>
															</div>
														</div>
														<div>
															<div class="sc-cJSrbW jcDgkN"></div>
															<div class="sc-caSCKo jKLHsR">
																<div class="sc-TOsTZ hiHQAi">Services</div>
																<div class="form-group undefined">
																	<div class="sc-iujRgT hUHAcY">
																		<div class="sc-jhAzac iGbrby">
																			<label class="sc-bAeIUo fuksr">
																				<input type="checkbox" class="sc-bMVAic kyrrfd" value="Accountant"  name="services[]"@if($service) @foreach($service as $data) {{$data == 'Accountant' ? 'checked="checked"' : '' }} @endforeach @endif>
																				<div class="sc-gqPbQI ilsJbL">
																					<div class="sc-hORach kMXQwc"></div>
																				</div>
																			</label>Accountant
																		</div>
																		<div class="sc-jhAzac iGbrby">
																			<label class="sc-bAeIUo fuksr">
																				<input type="checkbox" class="sc-bMVAic kyrrfd" value="Bookkeeping"  name="services[]" @if($service) @foreach($service as $data) {{$data == 'Bookkeeping' ? 'checked="checked"' : '' }} @endforeach @endif>
																				<div class="sc-gqPbQI ilsJbL">
																					<div class="sc-hORach kMXQwc"></div>
																				</div>
																			</label>Bookkeeping
																		</div>
																		<div class="sc-jhAzac iGbrby">
																			<label class="sc-bAeIUo fuksr">
																				<input type="checkbox" class="sc-bMVAic kyrrfd" value="Tax"  name="services[]"@if($service) @foreach($service as $data) {{$data == 'Accountant' ? 'checked="checked"' : '' }} @endforeach @endif>
																				<div class="sc-gqPbQI ilsJbL">
																					<div class="sc-hORach kMXQwc"></div>
																				</div>
																			</label>Tax
																		</div>
																		<div class="sc-jhAzac iGbrby">
																			<label class="sc-bAeIUo fuksr">
																				<input type="checkbox" class="sc-bMVAic kyrrfd" value="Audit"  name="services[]" @if($service) @foreach($service as $data) {{$data == 'Audit' ? 'checked="checked"' : '' }} @endforeach @endif>
																				<div class="sc-gqPbQI ilsJbL">
																					<div class="sc-hORach kMXQwc"></div>
																				</div>
																			</label>Audit
																		</div>
																		<div class="sc-jhAzac iGbrby">
																			<label class="sc-bAeIUo fuksr">
																				<input type="checkbox" class="sc-bMVAic kyrrfd" value="Payroll"  name="services[]" @if($service) @foreach($service as $data) {{$data == 'Payroll' ? 'checked="checked"' : '' }} @endforeach @endif>
																				<div class="sc-gqPbQI ilsJbL">
																					<div class="sc-hORach kMXQwc"></div>
																				</div>
																			</label>Payroll
																		</div>
																		<div class="sc-jhAzac iGbrby">
																			<label class="sc-bAeIUo fuksr">
																				<input type="checkbox" class="sc-bMVAic kyrrfd" value="Incorporation"  name="services[]" @if($service) @foreach($service as $data) {{$data == 'Incorporation' ? 'checked="checked"' : '' }} @endforeach @endif>
																				<div class="sc-gqPbQI ilsJbL">
																					<div class="sc-hORach kMXQwc"></div>
																				</div>
																			</label>Incorporation
																		</div>
																		<div class="sc-jhAzac iGbrby">
																			<label class="sc-bAeIUo fuksr">
																				<input type="checkbox" class="sc-bMVAic kyrrfd" value="Secretarial service"  name="services[]" @if($service) @foreach($service as $data) {{$data == 'Secretarial service' ? 'checked="checked"' : '' }} @endforeach @endif>
																				<div class="sc-gqPbQI ilsJbL">
																					<div class="sc-hORach kMXQwc"></div>
																				</div>
																			</label>Secretarial service
																		</div>

																	</div>
																</div>
															</div>
														</div>
														<div>

															<div class="sc-cJSrbW jcDgkN"></div>
															<div class="sc-caSCKo jKLHsR">
																<div class="sc-TOsTZ hiHQAi">Why you are best match for the customer</div>
																<textarea class="sc-gGBfsJ jrocpm" placeholder="Questions to be asked" name="interview">{{$userinfo->interview}}</textarea>
															</div>
														</div>
														<div>
															<div class="sc-cJSrbW jcDgkN"></div>
															<div class="sc-caSCKo jKLHsR"><div class="sc-TOsTZ hiHQAi">Personal quote</div>

															<div class="sc-jnlKLf adGQN">
																<label for="attributes[4].selected[0].title" class="sc-bbmXgH fNHatV control-label">Interview quote</label>
																<textarea class="sc-gGBfsJ jrocpm" name="personal_quets">{{$userinfo->personal_quets}}</textarea>
															</div>
														</div>
													</div>
													<button type="submit" class="sc-iRbamj jqqRiF">Save company profile</button>
												</form>
												<div class="sc-cJSrbW jcDgkN"></div>
												<div class="showbox"></div>
											</div>
										</div>
									</div>
									<div role="tabpanel" class="tab-pane" id="cv">
										<div class="sc-hmzhuo fPEirj">
											<div class="sc-caSCKo jKLHsR">
												<div class="mini-landing cv">
													<span class="icon">
														<i class="fa fa-file-pdf-o fa-2x"></i>
													</span>
													@if($document)
													<embed src="{{ action('Partner\PartnerController@getDocument') }}"
													style="width:600px; height:800px;"
													frameborder="0">
													@else
													<h1>You need upload your specialities</h1>
													<p>Create trust among your customers and showcase your skills with a personal specialities.</p>
													@endif
													<label for="upload_cv" type="button" class="btn mfToJ">Upload Specialities
													</label>
													<form action="{{url('partner/cv')}}" method="post" enctype="multipart/form-data">
														{{ csrf_field() }}
														<input type="file" name="cv" id="upload_cv" class="cv"  style="opacity: 0;">
														<input type="hidden" name="type" value="special">
														<button type="submit" class="btn btn-success">Save Change</button>
													</form>

												</div>
											</div>
										</div>
									</div>
									<!-- widget Tab -->
									<div role="tabpanel" class="tab-pane" id="widget">
										<div class="sc-hmzhuo fPEirj">
											<div class="sc-caSCKo jKLHsR">
												<div class="mini-landing cv">
													<span class="icon">
														<i class="fa fa-file-pdf-o fa-2x"></i>
													</span>
													@if($document)
													<embed src="{{ action('Partner\PartnerController@getDocumentcer') }}"
													style="width:600px; height:800px;"
													frameborder="0">
													@else
													<h1>You need upload your Certification</h1>
													@endif
													<label for="upload" type="button" class="btn mfToJ">Upload Certification
													</label>

													<form action="{{url('partner/cartification')}}" method="post" enctype="multipart/form-data">
														{{ csrf_field() }}
														<input type="file" name="cer" id="upload" class="cv"  style="opacity: 0;">
														<input type="hidden" name="type" value="certification">
														<button type="submit" class="btn btn-success">Save Change</button>
													</form>
												</div>
											</div>
										</div>
									</div>
									<!-- widget Tab End -->
									<!-- Review Tab -->
									<div role="tabpanel" class="tab-pane" id="review">
										<div class="review_content">

											<?php
											$usersCounts = FA::countUserReviews($userId);
											$starAvg     = ($usersCounts[0]->starsAvg != null) ? round($usersCounts[0]->starsAvg) : 0;
											?>
											<div class="row">
												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
													<!-- <p>Review can only be made by dinners who have eaten at this restaurant</p> -->
													<p>
														<span class="rating_heading" style="margin-left: 0px;">Overall Ratings (<span class="users-count">{{$usersCounts[0]->usersCount}}</span>)</span><span class="rating_star">&nbsp;
															<i class="fa fa-star avg-star-1 {{($starAvg >= 1) ? 'orange-star' : 'grey-star'}}"></i><i class="fa fa-star avg-star-2 {{($starAvg >= 2) ? 'orange-star' : 'grey-star'}}"></i><i class="fa fa-star avg-star-3 {{($starAvg >= 3) ? 'orange-star' : 'grey-star'}}"></i><i class="fa fa-star avg-star-4 {{($starAvg >= 4) ? 'orange-star' : 'grey-star'}}"></i><i class="fa fa-star avg-star-5 {{($starAvg >= 5) ? 'orange-star' : 'grey-star'}}"></i>
														</span>
													</p>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<div class="side">
														<div>Excellent</div>
													</div>
													<div class="middle md-rating">
														<div class="bar-container-rating">
															<div class="bar-5-rating" style="width:{{$rating_avg[4]}}%"></div>
															<span>&nbsp; <span class="rating-5">{{$rating_avg[4]}}</span>%</span>
														</div>
													</div>
													<div class="side">
														<div>Very Good</div>
													</div>
													<div class="middle md-rating">
														<div class="bar-container-rating">
															<div class="bar-4-rating" style="width:{{$rating_avg[3]}}%"></div>
															<span>&nbsp; <span class="rating-4">{{$rating_avg[3]}}</span>%</span>
														</div>
													</div>
													<div class="side">
														<div>Good</div>
													</div>
													<div class="middle md-rating">
														<div class="bar-container-rating">
															<div class="bar-3-rating" style="width:{{$rating_avg[2]}}%"></div>
															<span>&nbsp; <span class="rating-3">{{$rating_avg[2]}}</span>%</span>
														</div>
													</div>
													<div class="side">
														<div>Average</div>
													</div>
													<div class="middle md-rating">
														<div class="bar-container-rating">
															<div class="bar-2-rating" style="width:{{$rating_avg[1]}}%"></div>
															<span>&nbsp; <span class="rating-2">{{$rating_avg[1]}}</span>%</span>
														</div>
													</div>
													<div class="side">
														<div>Poor</div>
													</div>
													<div class="middle md-rating">
														<div class="bar-container-rating">
															<div class="bar-1-rating" style="width:{{$rating_avg[0]}}%"></div>
															<span>&nbsp; <span class="rating-1">{{$rating_avg[0]}}</span>%</span>
														</div>
													</div>
												</div>
											</div>
											<br>
											<hr>
											<div class="comment_section">
												<div class="review_form">
													<div class="form-group" style="padding-right:15px;">
														<!-- <label for="">Sort By</label>
														<select  class="form-control filter-products">
														<option value="default">Default</option>
														<option value="newest">Newest</option>
														<option value="oldest">Oldest</option>
													</select> -->
													<input type="hidden" class="quote_id" value="{{$q_id}}">
													<input type="hidden" class="job_id" value="{{$j_id}}">
													<input type="hidden" class="p_id" value="{{$p_id}}">
													<input type="hidden" name="customer_name" value="{{$customer_name}}">
												</div>
											</div><br>
											<div class="table_comments" style="margin-left: 30px;">
												<div class="reviews_container">
													@foreach($reviews as $row)
													<div class="row review_comment">
														<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
															<div class="user_image user_image_table" style="margin-left:auto;margin-right:auto">
																<img src="{{asset('frontend-assets/dashboard/new_logo.png')}}" class="img-circle" alt="Image" style="width: 100%;">
															</div>
															<p class="text-center">{{$row->customer_name}}</p>
														</div>
														<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 text-left">
															<p><span><i class="fa {{($row->overall_rating == 0.5) ? 'fa-star-half-o' : 'fa-star'}} {{($row->overall_rating >= 0.5 || $row->overall_rating >=1) ? 'orange-star' : 'grey-star'}}"></i><i class="fa {{($row->overall_rating == 1.5) ? 'fa-star-half-o' : 'fa-star'}} {{($row->overall_rating >= 1.5 || $row->overall_rating >= 2) ? 'orange-star' : 'grey-star'}}"></i><i class="fa {{($row->overall_rating == 2.5) ? 'fa-star-half-o' : 'fa-star'}} {{($row->overall_rating >= 2.5 || $row->overall_rating >= 3) ? 'orange-star' : 'grey-star'}}"></i><i class="fa {{($row->overall_rating == 3.5) ? 'fa-star-half-o' : 'fa-star'}} {{($row->overall_rating >= 3.5 || $row->overall_rating >= 4) ? 'orange-star' : 'grey-star'}}"></i><i class="fa {{($row->overall_rating == 4.5) ? 'fa-star-half-o' : 'fa-star'}} {{($row->overall_rating >= 4.5 || $row->overall_rating >= 5) ? 'orange-star' : 'grey-star'}}"></i></span></p>
															<p>{{$row->customer_review}}</p>
														</div>
													</div>
													<hr>
													@endforeach
												</div>
											</div>
										</div><!-- end comment section-->
									</div>
									</div>
							 		<!-- Review Tab End -->
									<!-- Segmentation Tab -->
									<div role="tabpanel" class="tab-pane" id="segmentation">Profile badge</div>
									<!-- Segmentation Tab End -->
									<!-- Account Tab -->
									<div role="tabpanel" class="tab-pane" id="verification">
										@if($userinfo->verify_status == 0)
										<h4>Your Account isn't verified yet click below to verify your Account</h4>
										<div class="text-center">
											<a href="javascript:void(0);" onclick="sendverifyCode('{{$userinfo->p_id}}','{{$userinfo->email}}','{{$userinfo->name}}');" class="btn btn-md btn-success">Verify Account</a>
										</div>
										@else
										<h4>Your Account is verified <i class="fa fa-check text-success"></i> </h4>
										@endif
									</div>
									<!-- Account Tab End -->
									</div>
								</div>
							</div>
						</div>
						<!-- End Profile Section -->
					</div>
					<div role="tabpanel" class="tab-pane" id="account">
						<div class="row">
							<div role="tabpanel">
								<div class="col-md-3">
									<!-- Nav tabs -->

									<ul class="nav nav-tabs profile_tabs" role="tablist">
										<li role="presentation">
											<a href="#account_status" aria-controls="account_status" role="tab" data-toggle="tab">Account Status</a>
										</li>
										<li role="presentation" class="active">
											<a href="#invoice" aria-controls="invoice" role="tab" data-toggle="tab">Invoice</a>
										</li>
										<li role="presentation">
											<a href="#refund" aria-controls="refund" role="tab" data-toggle="tab">Refunds</a>
										</li>
										<li role="presentation">
											<a href="#card_details" aria-controls="car_detail" role="tab" data-toggle="tab">Card Details</a>
										</li>
									</ul>
								</div>

								<div class="col-md-9">
									<!-- Tab panes -->
									<div class="tab-content">
										<div role="tabpanel" class="tab-pane" id="account_status">
											<div class="sc-hmzhuo fPEirj">
												<div class="sc-caSCKo jKLHsR">
													<h2>Your Membership is {{FA::checkMembership($userinfo->payment_id)}}
													@if($cancelpckg !=null)
																	<?php 
																		$now = date(); // or your date as well
																		$your_date = $cancelpckg->ends_at;
																		$datetime1 = new DateTime($your_date);
																		$datetime2 = new DateTime();
																		$interval = $datetime1->diff($datetime2);
																		$days = $interval->format('%a');//now do whatever you like with $days
																      ?>
																	 <span style="font-size: 13px;color:red">( Your Package will expire after {{$days}} days. )</span> 
																	  @endif
													</h2>
													
													<div>
														<div class="sc-TOsTZ hiHQAi">Payments</div>
														<div class="table-responsive">
																<table class="datatable responsive compact">
																	<thead>
																		<tr>
																			<th class="table-mobile-cell"></th>
																			<th>PAYMENT ID</th>
																			<th>AMOUNT</th>
																			<th>DATE</th>
																			<th>PAYMENT METHOD</th>
																			<th>TRIAL PERIOD</th>
																			<th>ACTION</th>
																		</tr>
																	</thead>
																	<tbody>
																		@foreach($payments as $payment)
																		<?php
																		$date = $payment->created_at;
																		$exp_date =	date('Y-m-d', strtotime($date. ' + 1 month'));
																		$exp_date2 =	strtotime($exp_date);
																		$payment_date =	date('Y-m-d', strtotime($date));
																		$payment_date2 =	strtotime($payment_date);;
																		$now = time(); // or your date as well
																		$datediff = $exp_date2 - $now;
																		$trial_day = round($datediff / (60 * 60 * 24));
																		// print_r($trial_day); die;


																		 ?>
																		<tr>
																			<td>{{$payment->payment_id}}</td>
																			<td class="amount"><span>£{{$payment->amount}}</span></td>
																			<td><span>{{$payment->created_at}}</span></td>
																			<td><span>{{$payment->method}}</span></td>
																			@if($payment->trial_period_days !="")
																			<td><span>{{$trial_day}} Days</span></td>
																			@else
																			<td><span></span></td>
																			@endif
																			@if($payment->link !="")
																			<td><span><a href="{{url($payment->link)}}" class="btn btn-sm btn-primary" style="color:white;">View Receipt</a> </span></td>
																			@else
																			<td></td>
																			@endif
																		</tr>
																		@endforeach
																	</tbody>
															</table>
														</div>
												</div>
											</div>
										</div>
										</div>
										<div role="tabpanel" class="tab-pane active" id="invoice">
											<div class="sc-hmzhuo fPEirj">
												<div class="sc-caSCKo jKLHsR">
													<div>
														<div class="sc-TOsTZ hiHQAi">Invoices</div>
														<div class="table-responsive">
																<table class="datatable responsive compact">
																	<thead>
																		<tr>
																			<th class="table-mobile-cell"></th>
																			<th>Invoice number</th>
																			<th>Invoice date</th>
																			<th>Due date</th>
																			<th>Job id</th>
																			<th>Client name</th>
																			<th>Amount</th>
																			<th>Status</th>
																		</tr>
																	</thead>
																	<tbody>
																		@foreach($invoicequote as $invoice)
																		<?php
																		$date = $invoice->updated_at;
																		$quote_date =	date('d-M-Y', strtotime($date));
																		$due_date =	date('d-M-Y', strtotime($date. ' + 1 days'));
																		 ?>
																		<tr>
																			<td><a href="{{url('partner/invoice/'.$invoice->id)}}" style="color: #00a4eb;">Invoice# {{$invoice->id}}</a></td>
																			<td><span>{{$quote_date}}</span></td>
																			<td><span>{{$due_date}}</span></td>
																			<td><span>{{$invoice->job_id}}</span></td>
																			<td><span>{{$invoice->name}}</span></td>
																			<td class="amount"><span>£{{$invoice->experlu_fee}}</span></td>
																			@if(FA::checkPayment($invoice->id,$invoice->p_id) == 1)
																			<td>
																				@if(FA::checkPaymentStatus($invoice->id,$invoice->p_id)->status == 'Paid')
																				<span class="label label-success">{{FA::checkPaymentStatus($invoice->id,$invoice->p_id)->status}}</span>
																				@if(FA::checkPaymentStatus($invoice->id,$invoice->p_id)->status == 'Paid' && FA::checkPaymentStatus($invoice->id,$invoice->p_id)->reject_status != '1')
																				<a href="{{url('/partner/refund-invoice/'.$invoice->id)}}" class="btn btn-xs btn-warning" style="font-size: 75%;color: white;font-weight: 600;">Refund</a>
																				@endif
																				@elseif(FA::checkPaymentStatus($invoice->id,$invoice->p_id)->status == 'Refunded')
																				<span class="label label-success">{{FA::checkPaymentStatus($invoice->id,$invoice->p_id)->status}}</span>
																				@else
																				<span class="label label-warning">{{FA::checkPaymentStatus($invoice->id,$invoice->p_id)->status}}</span>
																				@endif
																			</td>
																			@else
																			<td><span class="label label-warning">UnPaid</span></td>
																			@endif
																		</tr>
																		@endforeach
																		<!-- <tr>
																			<td><a href="/invoices/42014" style="color: #00a4eb;">Invoice# 2</a></td>
																			<td><span>07/01/2019</span></td>
																			<td><span>09/01/2019</span></td>
																			<td><span>12</span></td>
																			<td><span>Experlu</span></td>
																			<td class="amount"><span>£112.50</span></td>
																			<td><span class="label label-info">refunded</span></td>
																		</tr> -->
																		<!-- <tr>
																			<td><a href="/invoices/42014" style="color: #00a4eb;">Invoice# 3</a></td>
																			<td><span>07/01/2019</span></td>
																			<td><span>09/01/2019</span></td>
																			<td><span>12</span></td>
																			<td><span>Experlu</span></td>
																			<td class="amount"><span>£112.50</span></td>
																			<td><span class="label label-warning">pending</span></td>
																		</tr> -->
																	</tbody>
															</table>
														</div>
												</div>
											</div>
										</div>
									</div>
									<div role="tabpanel" class="tab-pane" id="refund">
										<div class="card">
											<h2>Refunds</h2>
											<div class="table-responsive">
												<table class="sc-gwVKww fybuiN">
													<thead>
														<tr class="sc-hXRMBi fVoksB">
															<th class="table-mobile-cell"></th>
															<th>Refund_number</th>
															<th>Invoice_number</th>
															<th>Request_date</th>
															<th>Refund_amount</th>
															<th>Status</th>
															<th>Reason_for_refund</th>
														</tr>
													</thead>
													<tbody>
														@foreach($refunds as $refund)
														<tr>
															<td><a href="" target="_blank">Refund #{{$refund->refund_id}}</a></td>
															<td><span>Invoice #{{$refund->invoice_id}}</span></td>
															<td><span>{{$refund->updated_at}}</span></td>
															<td><span>£{{$refund->amount}}</span></td>
															@if($refund->status == 'Pending')
															<td><span class="label label-warning">{{$refund->status}}</span></td>
															@elseif($refund->status == 'Approved')
															<td><span class="label label-success">{{$refund->status}}</span></td>
															@else
															<td><span class="label label-danger">{{$refund->status}}</span></td>
															@endif
															<td>{{$refund->reason}}</td>
														</tr>
														@endforeach
													</tbody>
												</table>
												<!-- <hr><a class="btn btn-action btn-lg btn-block" href="/account/refunds-create">Request refund</a> -->
											</div>
										</div>
									</div>
									<div role="tabpanel" class="tab-pane" id="card_details">
										<div class="card">
											<h2>Card Details</h2>
											<div class="table-responsive">
												<table class="sc-gwVKww fybuiN">
													<thead>
														<tr class="sc-hXRMBi fVoksB">
															<th class="table-mobile-cell"></th>
															<th>Card Holder Name</th>
															<th>Card Brand</th>
															<th>Card Number</th>
															@if($cancelpckg !=null)
															<th>Status</th>
															@else
																<th>Action</th>
															@endif
														</tr>
													</thead>
													<tbody>
														<tr id="card-detail">
															<td>{{$userinfo->name}}</td>
															<td><span>{{$userinfo->card_brand}}</span></td>
															<td>
																@if($userinfo->card_last_four !="")
																<span>**** **** **** {{$userinfo->card_last_four}}</span>
																@endif
															</td>
															<td>
																@if($cancelpckg !=null)
																	<?php 
																		$now = date(); // or your date as well
																		$your_date = $cancelpckg->ends_at;
																		$datetime1 = new DateTime($your_date);
																		$datetime2 = new DateTime();
																		$interval = $datetime1->diff($datetime2);
																		$days = $interval->format('%a');//now do whatever you like with $days
																      ?>
																	  <p>Your Package will expire after {{$days}} days.
																	  @else
																<a href="{{ url('partner/subscribecancel')}}" class="btn btn-danger">Delete</a></td>
																@endif
														</tr>
													</tbody>
												</table>
												<!-- <hr><a class="btn btn-action btn-lg btn-block" href="/account/refunds-create">Request refund</a> -->
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div role="tabpanel" class="tab-pane" id="messages">..Messages.</div>
				<div role="tabpanel" class="tab-pane" id="terms">...Terms Conditions ... </div>
			</div>
		</div>
	</div>
</div>
</div>
@endsection
@section('script')

<script>
function mark(id){
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$.ajax({
		type: "get",
		url: "{{ url('partner/mark') }}/"+id,
		success: function(data){
			//$('#treeviews').html(data);
			if(data ==1){
				toastr.success("Status Update");
				$('#'+id).html('<i class="fa fa-check"></i>');
			}
			console.log(data);
		}

	});
}
$('.add_more').click(function(){
	// alert("fjsdhfjsd");
	//Check maximum number of input fields

	//Increment field counter

	var fieldHTML2 = '<div class="row">'+
	'<div class="col-xs-5"><label>Service</label>'+
	'<select class="form-control" name="q_services[]">'+
	'<option>Select Service</option><option value="Accountant">Accountant</option>'+
	'<option value="Bookkeeper">Bookkeeper</option>'+
	'<option value="Tax">Tax</option>'+
	'<option value="Audit">Audit</option>'+
	'<option value="Payroll">Payroll</option>'+
	'<option value="Incorporation">Incorporation</option>'+
	'<option value="Secretarial service">Secretarial service</option>>'+
	'<option value="Mix your own service pack">Mix your own service pack</option>'+
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
	'<input type="text" name="quote_price[]" class="form-control">'+
	'</div>'+
	//'<div class="col-xs-1">'+
	//'<a href="javascript:void(0)" class="remove_service"><i class="fa fa-minus"></i></a>'+
	'</div>'; //New input field html



	$('.servies_list').append(fieldHTML2); //Add field html
});


//alert('jfjsdf');
var url="{{url('/')}}";
function uploadpicture(){
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	var formData = new FormData();
	formData.append('logo', $('.upload')[0].files[0]);

	console.log(formData);
	$.ajax({
		url : "{{ url('partner/profile/picture') }}",
		type : 'POST',
		data :  formData,
		processData: false,
		contentType: false,
		timeout: 30000000,
		success : function(response) {
			if($.trim(response) != '1'){

				$('img.uploaded-logo').attr('src',response);

			}else{
				alert('Following format allowed (PNG/JPG/JPEG)');
			}
		}
	});
}

function uploadcv(){
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	var formData = new FormData();
	formData.append('cv', $(this)[0]);

	console.log(formData);
	$.ajax({
		url : "{{ url('partner/cv') }}",
		type : 'POST',
		data :  formData,
		processData: false,
		contentType: false,
		timeout: 30000000,
		success : function(response) {
			// if($.trim(response) != '1'){

			// 	$('img.uploaded-logo').attr('src',response);

			// }else{
			// 	alert('Following format allowed (PNG/JPG/JPEG)');
			// }
		}
	});
}

function deletepicture(){

	$.ajax({
		url : "{{ url('partner/profile/picturedel') }}",
		type : 'get',
		success : function(response) {
			console.log(response);
			if($.trim(response) == '1'){

				$('img.uploaded-logo').attr('src',url+'/frontend-assets/images/images.png');

			}else{
				alert('Following format allowed (PNG/JPG/JPEG)');
			}
		}
	});
}
$(function(){
	var url = window.location.href;

	var activeTab = url.substring(url.indexOf("#") + 1);
	$('a[href="#'+ activeTab +'"]').tab('show')

	$('.nav-tabs a').click(function (e) {
		$(this).tab('show');
		$(this).addClass('active');
	});
});

function sendEmail(q_id,j_id,p_id,email) {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	var form = new FormData();
	form.append('q_id', q_id);
	form.append('j_id', j_id);
	form.append('p_id', p_id);
	form.append('email', email);
// console.log(form);
	$.ajax({
		type: "POST",
		url:" {{ url('/partner/get_review')}}",
		data: form,
		cache: false,
		contentType: false,
		processData: false,
		success: function(data){
			toastr.success('Request Send successfully', '', {timeOut: 5000, positionClass: "toast-top-right"});
			// window.location.href = "{{url('/dashboard/onlineShoppingOrder')}}/"+listing_id+'?shopping';

		},
		error: function() {
			$('#checkcatid').prop("disabled",false);
			alert("Error posting feed");
		}
	});
}

function sendverifyCode(p_id,email,name) {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	var token = "{{csrf_token()}}";
	var form = new FormData();
	form.append('p_id', p_id);
	form.append('email', email);
	form.append('name', name);
	form.append('token', token);
// console.log(form);
	$.ajax({
		type: "POST",
		url:" {{ url('/partner/send_verification_email')}}",
		data: form,
		cache: false,
		contentType: false,
		processData: false,
		success: function(data){
			toastr.success('Check Your Email to Verify', '', {timeOut: 5000, positionClass: "toast-top-right"});
			// window.location.href = "{{url('/dashboard/onlineShoppingOrder')}}/"+listing_id+'?shopping';

		},
		error: function() {
			$('#checkcatid').prop("disabled",false);
			alert("Error posting feed");
		}
	});
}

function delete_card(id){
	// alert(id);

 $.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});
$.ajax({
				type: "post",
				url: "{{ url('partner/delete-card') }}/"+id,
				data:{id:id},
				success: function(data){
					//$('#treeviews').html(data);
					if(data ==1){
						toastr.success("Card Deleted");
						// $('#card-detail').remove();
					location.reload();

					}
					console.log(data);
				}

	});
}
</script>
@endsection
