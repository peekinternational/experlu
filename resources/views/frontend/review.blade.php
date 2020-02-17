@extends('layouts.app')
@section('content')
<style>
.orange-star {
	color: #FF7814 !important;
}
.grey-star {
    color: #8e8c8c !important;
}
</style>
<section class="we-offer-area text-center bg-gray">
	<div class="container" style="background:white;">
		<div class="row">
			<div class="col-md-12">
				<div class="site-heading text-center">
					<h2>What we <span>Offer</span></h2>
					<h4>Lorem Ipsum is simply dummy text</h4>
				</div>
			</div>
		</div>
		<div class="review_container">
			<!-- <h4>Over all Rating and Reviews</h4> -->
			<div class="review_content">
				<!-- Review Form -->
				<div class="row">
					<div id="content1">
						@if($user_exist == 1)
							<div class="col-md-12" id="review_alert">
							<div class="alert alert-success" style="margin-bottom:0px !important">
								<strong>Review Submitted!</strong> Thank you for completing the review of this submission. Your review has been submitted successfully.
							</div>
							</div>
						@else
							<form  method="POST" role="form" id="reviews_form">
								{{csrf_field()}}
								<input type="hidden" name="overall_rating" id="rating_val">
								<input type="hidden" name="quote_id" id="quote_id" value="{{$q_id}}">
								<input type="hidden" name="job_id" id="job_id" value="{{$j_id}}">
								<input type="hidden" name="p_id" id="p_id" value="{{$p_id}}">
								<input type="hidden" name="customer_name" id="customer_name" value="{{$customer_name}}">
								<div class='rating-stars text-center'>
									<div class="row" style="margin: 15px 0;">

										<div id="half-stars-example" class="col-md-12 text-center">
											 <div class="rating-group">
												<input class="rating__input rating__input--none" checked name="rating2" id="rating2-0" value="0" type="radio">
												<label aria-label="0 stars" data-label="0" class="rating__label" for="rating2-0">&nbsp;</label>
												<label aria-label="0.5 stars" data-label="0.5" class="rating__label rating__label--half" for="rating2-05"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
												<input class="rating__input" name="rating2" id="rating2-05" value="0.5" type="radio">
												<label aria-label="1 stars" data-label="1" class="rating__label" for="rating2-10"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
												<input class="rating__input" name="rating2" id="rating2-10" value="1" type="radio">
												<label aria-label="1.5 stars" data-label="1.5" class="rating__label rating__label--half" for="rating2-15"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
												<input class="rating__input" name="rating2" id="rating2-15" value="1.5" type="radio">
												<label aria-label="2 stars" data-label="2" class="rating__label" for="rating2-20"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
												<input class="rating__input" name="rating2" id="rating2-20" value="2" type="radio">
												<label aria-label="2.5 stars" data-label="2.5" class="rating__label rating__label--half" for="rating2-25"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
												<input class="rating__input" name="rating2" id="rating2-25" value="2.5" type="radio">
												<label aria-label="3 stars" data-label="3" class="rating__label" for="rating2-30"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
												<input class="rating__input" name="rating2" id="rating2-30" value="3" type="radio">
												<label aria-label="3.5 stars" data-label="3.5" class="rating__label rating__label--half" for="rating2-35"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
												<input class="rating__input" name="rating2" id="rating2-35" value="3.5" type="radio">
												<label aria-label="4 stars" data-label="4" class="rating__label" for="rating2-40"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
												<input class="rating__input" name="rating2" id="rating2-40" value="4" type="radio">
												<label aria-label="4.5 stars" data-label="4.5" class="rating__label rating__label--half" for="rating2-45"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
												<input class="rating__input" name="rating2" id="rating2-45" value="4.5" type="radio">
												<label aria-label="5 stars" data-label="5" class="rating__label" for="rating2-50"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
												<input class="rating__input" name="rating2" id="rating2-50" value="5" type="radio">
											 </div>
										</div>
									</div>
							 </div>
							 <!-- <span class="write_review_span"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span> -->
							 <!-- </p> -->
							 <div class="write_review_div">
									<div class="form-group" style="padding-right:15px;">
										 <label for="">Write your review</label>
										 <textarea class="form-control" rows="5" id="comment" name="comment" placeholder="Write your review"></textarea>
									</div>
							 </div>
							 <div class="text-center" style="padding-top: 30px;">
									<button type="submit" id="submit_review" class="btn btn-success">Submit Evaluation</button>
							 </div>
						</form>
					@endif
					</div>
				</div>
				<br><br>
				<!-- End Reveiw Form -->
				<?php
					$usersCounts = FA::countQuoteReviews($q_id, $j_id);
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
	</div>
</section>
@endsection
@section('script')
<script>
	$('body').on('click', '.rating__label', function() {
      var onStar = $(this).data('label');
      $('#rating_val').val(onStar);
  });
  $('#reviews_form').on('submit', function(e) {
   e.preventDefault();

   var rating_val  = $('#rating_val').val(),
         comment     = $('#comment').val(),
         has_error   = false;
       if(comment==""){
         $('#comment').addClass('error-cls').on('focus', function(){
           $(this).removeClass('error-cls');
         });
         has_error = true;
       }

       if(rating_val==""){
         $('#half-stars-example').addClass('error-cls').on('click', function(){
           $(this).removeClass('error-cls');
         });
         has_error = true;
       }

       if(has_error) {

         return false;

       } else {

        	form = new FormData(this);


          	$.ajax({
            type: "POST",
            url: "{{ url('/review/addQuoteReview')}}",
            data: form,
            cache: false,
            contentType: false,
            processData: false,
            dataType : 'json',
            success: function(response){
							console.log(response);
               toastr.success('Review Added Successfully', '', {timeOut: 5000, positionClass: "toast-top-right"});

               var data           = response['review_lits'],
                  // review_images  = response['review_images'],
                  msg            = response['message'],
                  avg            = response['rating_avg'],
                  usersCount     = response['usersCount'],
                  starsAvg       = response['starsAvg'];

              var user_image_url = "{{ asset('frontend-assets/dashboard/new_logo.png') }}";
              var users_count = (usersCount !=null || usersCount !="") ? usersCount : 0;

               $('body').find('.users-count').text(users_count);
               var avg_stars = $('body').find('.rating_star');

               avg_stars.children('.avg-star-1').addClass((starsAvg >= 1) ? 'orange-star' : 'grey-star').removeClass((starsAvg < 1) ? 'orange-star' : 'grey-star');
               avg_stars.children('.avg-star-2').addClass((starsAvg >= 2) ? 'orange-star' : 'grey-star').removeClass((starsAvg < 2) ? 'orange-star' : 'grey-star');
               avg_stars.children('.avg-star-3').addClass((starsAvg >= 3) ? 'orange-star' : 'grey-star').removeClass((starsAvg < 3) ? 'orange-star' : 'grey-star');
               avg_stars.children('.avg-star-4').addClass((starsAvg >= 4) ? 'orange-star' : 'grey-star').removeClass((starsAvg < 4) ? 'orange-star' : 'grey-star');
               avg_stars.children('.avg-star-5').addClass((starsAvg >= 5) ? 'orange-star' : 'grey-star').removeClass((starsAvg < 5) ? 'orange-star' : 'grey-star');


               $('.bar-5-rating').css('width',avg[4]+'%');
               $('.bar-4-rating').css('width',avg[3]+'%');
               $('.bar-3-rating').css('width',avg[2]+'%');
               $('.bar-2-rating').css('width',avg[1]+'%');
               $('.bar-1-rating').css('width',avg[0]+'%');
               $('.rating-5').text(avg[4]);
               $('.rating-4').text(avg[3]);
               $('.rating-3').text(avg[2]);
               $('.rating-2').text(avg[1]);
               $('.rating-1').text(avg[0]);

              var rating_one   = (data[0].overall_rating>= 0.5 || data[0].overall_rating>= 1) ? 'orange-star' : 'grey-star',
                  rating_two   = (data[0].overall_rating>= 1.5 || data[0].overall_rating>= 2) ? 'orange-star' : 'grey-star',
                  rating_three = (data[0].overall_rating>= 2.5 || data[0].overall_rating>= 3) ? 'orange-star' : 'grey-star',
                  rating_four  = (data[0].overall_rating>= 3.5 || data[0].overall_rating>= 4) ? 'orange-star' : 'grey-star',
                  rating_five  = (data[0].overall_rating>= 4.5 || data[0].overall_rating>= 5) ? 'orange-star' : 'grey-star';

              var fa_star_one   = (data[0].overall_rating == 0.5) ? 'fa-star-half-o' : 'fa-star',
                  fa_star_two   = (data[0].overall_rating == 1.5) ? 'fa-star-half-o' : 'fa-star',
                  fa_star_three = (data[0].overall_rating == 2.5) ? 'fa-star-half-o' : 'fa-star',
                  fa_star_four  = (data[0].overall_rating == 3.5) ? 'fa-star-half-o' : 'fa-star',
                  fa_star_five  = (data[0].overall_rating == 4.5) ? 'fa-star-half-o' : 'fa-star';

              var row = '<div class="row review_comment">'+
													'<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">'+
														'<div class="user_image user_image_table" style="margin-left:auto;margin-right:auto">'+
															'<img src="'+user_image_url+'" class="img-circle" alt="Image" style="width: 100%;">'+
														'</div>'+
														'<p class="text-center">'+data[0].customer_name+'</p>'+
													'</div>'+
													'<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9  text-left">'+
													'<p><span><i class="fa '+fa_star_one+' '+rating_one+'"></i><i class="fa '+fa_star_two+' '+rating_two+'"></i><i class="fa '+fa_star_three+' '+rating_three+'"></i><i class="fa '+fa_star_four+' '+rating_four+'"></i><i class="fa '+fa_star_five+' '+rating_five+'"></i></span></p>'+
														'<p>'+data[0].customer_review+'</p>'+
													'</div>'+
												'</div><hr>';


							 $('.reviews_container').prepend(row);

               $('#content1').html("");

               var alert_success = '<div class="col-md-12" id="review_alert">'+
                                '<div class="alert alert-success" style="margin-bottom:0px !important">'+
                                     '<strong>Review Submitted!</strong> Thank you for completing the review of this submission. Your review has been submitted successfully.'+
                                 '</div>'+
                             '</div>';
               $('#content1').append(alert_success);

            },
            error: function() {
              alert("Error posting feed");
            }
          });


         }

      });

$('.filter-products').on('change',function() {

      var filter = $(this).val();
      var job_id = $('body').find('.job_id').val();
      var quote_id = $('body').find('.quote_id').val();
      var customer_name = $('body').find('.customer_name').val();


      var form_array = {
            '_token'        :'{{ csrf_token() }}',
            'filter_reviews': filter,
            'job_id'    : job_id,
            'quote_id'    : quote_id,
            'customer_name'    : customer_name,
      };

      $.ajax({
        type: 'POST',
        url: "{{ url('/review/filterProductReviews')}}",
        data: form_array,
        dataType : 'json',
        success: function (data) {

               var image_url = "{{ asset('frontend-assets/images/dashboard/user_review_images') }}/";

                    $('.reviews_container').html("");

                    for(var i=0; i < data.length; i++) {

                     var user_image_url = (data[i].user_image == 'new_logo.png') ? "{{ asset('frontend-assets/images/dashboard') }}/" : "{{ asset('frontend-assets/images/dashboard/profile-photos') }}/";


                      var rating_one  = (data[i].overall_rating >= 0.5 || data[i].overall_rating >= 1) ? 'orange-star' : 'grey-star',
                        rating_two    = (data[i].overall_rating >= 1.5 || data[i].overall_rating >= 2) ? 'orange-star' : 'grey-star',
                        rating_three  = (data[i].overall_rating >= 2.5 || data[i].overall_rating >= 3) ? 'orange-star' : 'grey-star',
                        rating_four   = (data[i].overall_rating >= 3.5 || data[i].overall_rating >= 4) ? 'orange-star' : 'grey-star',
                        rating_five   = (data[i].overall_rating >= 4.5 || data[i].overall_rating >= 5) ? 'orange-star' : 'grey-star';

                      var fa_star_one   = (data[i].rating == 0.5) ? 'fa-star-half-o' : 'fa-star',
                        fa_star_two     = (data[i].rating == 1.5) ? 'fa-star-half-o' : 'fa-star',
                        fa_star_three   = (data[i].rating == 2.5) ? 'fa-star-half-o' : 'fa-star',
                        fa_star_four    = (data[i].rating == 3.5) ? 'fa-star-half-o' : 'fa-star',
                        fa_star_five    = (data[i].rating == 4.5) ? 'fa-star-half-o' : 'fa-star';

                       var row = '<div class="row review_comment">'+
								'<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">'+
									'<div class="user_image user_image_table" style="margin-left:auto;margin-right:auto">'+
										'<img src="'+user_image_url+data[i].user_image+'" class="img-circle" alt="Image" style="width: 100%;">'+
									'</div>'+
									'<p class="text-center">'+data[i].username+'</p>'+
								'</div>'+
								'<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9  text-left">'+
								'<p><span><i class="fa '+fa_star_one+' '+rating_one+'"></i><i class="fa '+fa_star_two+' '+rating_two+'"></i><i class="fa '+fa_star_three+' '+rating_three+'"></i><i class="fa '+fa_star_four+' '+rating_four+'"></i><i class="fa '+fa_star_five+' '+rating_five+'"></i></span></p>'+
									'<p>'+data[i].user_review+'</p>'+
								'</div>'+
							'</div><hr>';

                $('.reviews_container').prepend(row);

              }
        }

      });

    });
</script>
@endsection
