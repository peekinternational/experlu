@extends('layouts.app')
@section('content')
<div class="breatcome_area margin-top-mbl" style="background-image: url({{url('images/banner/contact_us.jpg')}})">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="breatcome_title">
               <div class="breatcome_title_inner">
                  <h2><!-- Services --></h2>
                  <div class="breatcome_content">
                     <ul>
                        <li><!-- <a href="{{url('/')}}">home <i class="fa fa-angle-right"></i></a>Services --></li>
                     </ul>

                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
		<div class="contact_area" id="contact">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="contact_form">
						@include('includes.messages')
						<h2 class="contact-title">Contact</h2>
						<form id="contact_us_form" method="post" action="{{url('contact-admin')}}">
							{{csrf_field()}}
							<div class="form_field">
								<div class="form_field_inner">
                  <input type="text" name="name" placeholder="Name" id="user_name">
                  @if($errors->has('name'))
                  <span class="display_error alert alert-danger">{{ $errors->first('name') }}</span>
                  @endif
                </div>
                <div class="form_field_inner">
                  <input type="text" name="email" placeholder="Email" id="user_email">
                  @if($errors->has('email'))
                  <span class="display_error alert alert-danger">{{ $errors->first('email') }}</span>
                  @endif
                </div>
							</div>
              <div class="form_field">
                <div class="form_field_inner">
                  <input type="text" name="phone" placeholder="Phone" id="user_phone">
                  @if($errors->has('phone'))
                  <span class="display_error alert alert-danger">{{ $errors->first('phone') }}</span>
                  @endif
                </div>
                <div class="form_field_inner">
                  <input type="text" name="web" placeholder="Website" id="user_web">
                  @if($errors->has('web'))
                  <span class="display_error">{{ $errors->first('web') }}</span>
                  @endif
                </div>
              </div>
              <div class="form_field text_area">
                <div class="form_field_inner">
                  <input type="text" name="subject" placeholder="Subject" id="user_web">
                  @if($errors->has('subject'))
                  <span class="display_error alert alert-danger">{{ $errors->first('subject') }}</span>
                  @endif
                </div>
              </div>
              <div class="form_field text_area">
                <div class="form_field_inner">
                  <textarea id="user_msg_body" name="message" placeholder="Message...."></textarea>
                  @if($errors->has('msg'))
                  <span class="display_error">{{ $errors->first('msg') }}</span>
                  @endif
                </div>
              </div>
							<div class="form_field">
								<div class="contact_button">
									<button type="submit" id="send_contact_msg" name="submit">Send Message</button>
								</div>
							</div>
							<div class="clear clearfix"></div>
						</form>
					</div>

				</div>

				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="company_info">
						<h2 class="contact-title2">Details</h2>
						<div class="single_company_info">
							<div class="company_info_icon">
								<i class="fa fa-map-marker"></i>
							</div>
							<div class="company_info_content">
								<h5>Location</h5>
								<p>Office# 4 First Floor United Center, Shamsabad Murree Road, Rawalpindi</p>
							</div>
						</div>
						<div class="single_company_info">
							<div class="company_info_icon">
								<i class="fa fa-phone-square"></i>
							</div>
							<div class="company_info_content">
								<h5>Phone</h5>
								<p>0203 983 8100</p>
							</div>
						</div>
						<div class="single_company_info">
							<div class="company_info_icon">
								<i class="fa fa-envelope"></i>
							</div>
							<div class="company_info_content">
								<h5>E-Mail</h5>
								<p><a href="mailto:hello@experlu.com">hello@experlu.com</a></p>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('script')
@endsection
