<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Location;


class ReviewController extends Controller
{

    public function add_review(Request $request)
    {


         $files                        = $request->file('g_image');
         $userinfo                     = $request->session()->get('bkyUser');
         $review['listing_id']         = $request->input('litsing_id');
         $review['user_id']            = $userinfo->user_Id;
         $review['rating']             = ($request->input('rating_val') && $request->input('rating_val') !="") ? $request->input('rating_val') : '';
         $review['username']           = $userinfo->user_firstname.' '.$userinfo->user_lastname;
         $review['mobile_no']          = $userinfo->user_mobileNumber;
         $review['email']              = $userinfo->user_email;
         $review['month']              = date('F');
         $review['year']               = date('Y');
         $review['user_image']         = ($userinfo->user_image !=null) ? $userinfo->user_image : 'new_logo.png';
         $review['comment']            = $request->input('comment');
         // dd($review);

         $review_id = DB::table('bky_user_reviews')->insertGetId($review);

        if ($files !="") {

            foreach ($files as $key => $file) {

                $reviewImage     = 'review-'.time().'-'.rand(000000,999999).'.'.$file->getClientOriginalExtension();
                $destinationPath = public_path('frontend-assets/images/dashboard/user_review_images');
                $file->move($destinationPath, $reviewImage);
                $image['review_image'] = $reviewImage;
                $image['caption']      = $request->input('caption'.$key);
                $image['review_id']    = $review_id;

                DB::table('bky_review_images')->insert($image);

            }

        }

            $rating_avg = array();

            $star1 = DB::table('bky_user_reviews')
                ->where('listing_id','=',$review['listing_id'])
                ->where(function ($query) {
                    $query->where('rating', '=', 0.5)
                      ->orWhere('rating', '=', 1);
                })
                ->count('rating');

            $star2 = DB::table('bky_user_reviews')
                ->where('listing_id','=',$review['listing_id'])
                ->where(function ($query) {
                    $query->where('rating', '=', 1.5)
                      ->orWhere('rating', '=', 2);
                })
                ->count('rating');
            $star3 = DB::table('bky_user_reviews')
                ->where('listing_id','=',$review['listing_id'])
                ->where(function ($query) {
                    $query->where('rating', '=', 2.5)
                      ->orWhere('rating', '=', 3);
                })
                ->count('rating');
            $star4 = DB::table('bky_user_reviews')
                ->where('listing_id','=',$review['listing_id'])
                ->where(function ($query) {
                    $query->where('rating', '=', 3.5)
                      ->orWhere('rating', '=', 4);
                })
                ->count('rating');
            $star5 = DB::table('bky_user_reviews')
                ->where('listing_id','=',$review['listing_id'])
                ->where(function ($query) {
                    $query->where('rating', '=', 4.5)
                      ->orWhere('rating', '=', 5);
                })
                ->count('rating');


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


        $countReview =  DB::table('bky_user_reviews')
            ->select(DB::raw('avg(rating) AS `starsAvg`, count(username) AS `usersCount`'))
            ->where('listing_id','=', $review['listing_id'])
            ->get()->toArray();

        if($review_id) {

            $reviews = DB::table('bky_user_reviews')
                ->where('listing_id','=',$review['listing_id'])
                ->where('review_id','=', $review_id)
                ->get()->toArray();

            $review_images = DB::table('bky_review_images')
                ->select('bky_review_images.*')
                ->join('bky_user_reviews', 'bky_review_images.review_id', '=', 'bky_user_reviews.review_id')
                ->where('bky_user_reviews.listing_id','=',$review['listing_id'])
                ->where('bky_review_images.review_id','=', $review_id)
                ->get()->toArray();


            $data = array(
                'review_lits'   => $reviews,
                'review_images' => $review_images,
                'message'       => 'success',
                'rating_avg'    => $rating_avg,
                'usersCount'    => $countReview[0]->usersCount,
                'starsAvg'      => round($countReview[0]->starsAvg),
                'listing_id'    => $review['listing_id']
            );

            echo json_encode($data);

        }else {

            $data = array(
                'review_lits'   =>  "",
                'review_iamges' =>  "",
                'message'       => 'failed',
                'rating_avg'    =>  $rating_avg,
                'usersCount'    => $countReview[0]->usersCount,
                'starsAvg'      => round($countReview[0]->starsAvg),
                 'listing_id'   => $review['listing_id']

            );

            echo json_encode($data);

        }

    }

    public function add_restaurant_review(Request $request)
    {


         $files                        = $request->file('g_image');
         $userinfo                     = $request->session()->get('bkyUser');
         $review['listing_id']         = $request->input('litsing_id');
         $review['user_id']            = $userinfo->user_Id;
         $review['rating']             = ($request->input('rating_val') && $request->input('rating_val') !="") ? $request->input('rating_val') : '';
         $review['service_rating']     = ($request->input('service_val') && $request->input('service_val') !="") ? $request->input('service_val') : '';
         $review['food_rating']        = ($request->input('food_val') && $request->input('food_val') !="") ? $request->input('food_val') : '';
         $review['money_val_rating']   = ($request->input('money_val') && $request->input('money_val') !="") ? $request->input('money_val') : '';
         $review['ambiance_rating']    = ($request->input('ambiance_val') && $request->input('ambiance_val') !="") ? $request->input('ambiance_val') : '';
         $review['username']           = $userinfo->user_firstname.' '.$userinfo->user_lastname;
         $review['mobile_no']          = $userinfo->user_mobileNumber;
         $review['email']              = $userinfo->user_email;
         $review['month']              = date('F');
         $review['year']               = date('Y');
         $review['user_image']         = ($userinfo->user_image !=null) ? $userinfo->user_image : 'new_logo.png';
         $review['comment']            = $request->input('comment');
         // dd($review);

         $review_id = DB::table('bky_user_reviews')->insertGetId($review);

        if ($files !="") {

            foreach ($files as $key => $file) {

                $reviewImage     = 'review-'.time().'-'.rand(000000,999999).'.'.$file->getClientOriginalExtension();
                $destinationPath = public_path('frontend-assets/images/dashboard/user_review_images');
                $file->move($destinationPath, $reviewImage);
                $image['review_image'] = $reviewImage;
                $image['caption']      = $request->input('caption'.$key);
                $image['review_id']    = $review_id;

                DB::table('bky_review_images')->insert($image);

            }

        }

            $rating_avg = array();

            $star1 = DB::table('bky_user_reviews')
                ->where('listing_id','=',$review['listing_id'])
                ->where(function ($query) {
                    $query->where('rating', '=', 0.5)
                      ->orWhere('rating', '=', 1);
                })
                ->count('rating');

            $star2 = DB::table('bky_user_reviews')
                ->where('listing_id','=',$review['listing_id'])
                ->where(function ($query) {
                    $query->where('rating', '=', 1.5)
                      ->orWhere('rating', '=', 2);
                })
                ->count('rating');
            $star3 = DB::table('bky_user_reviews')
                ->where('listing_id','=',$review['listing_id'])
                ->where(function ($query) {
                    $query->where('rating', '=', 2.5)
                      ->orWhere('rating', '=', 3);
                })
                ->count('rating');
            $star4 = DB::table('bky_user_reviews')
                ->where('listing_id','=',$review['listing_id'])
                ->where(function ($query) {
                    $query->where('rating', '=', 3.5)
                      ->orWhere('rating', '=', 4);
                })
                ->count('rating');
            $star5 = DB::table('bky_user_reviews')
                ->where('listing_id','=',$review['listing_id'])
                ->where(function ($query) {
                    $query->where('rating', '=', 4.5)
                      ->orWhere('rating', '=', 5);
                })
                ->count('rating');


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


        $countReview =  DB::table('bky_user_reviews')
            ->select(DB::raw('avg(rating) AS `starsAvg`, count(username) AS `usersCount`'))
            ->where('listing_id','=', $review['listing_id'])
            ->get()->toArray();

        $allAvg =  DB::table('bky_user_reviews')
            ->select(DB::raw('avg(service_rating) AS `serviceAvg`, avg(ambiance_rating) AS `ambianceAvg`, avg(food_rating) AS `foodAvg`, avg(money_val_rating) AS `moneyAvg`, count(username) AS `usersCount`'))
            ->where('listing_id','=', $review['listing_id'])
            ->get()->toArray();

        $avgOverall = (round($allAvg[0]->serviceAvg) + round($allAvg[0]->ambianceAvg) + round($allAvg[0]->foodAvg) + round($allAvg[0]->moneyAvg))/4;


        if($review_id) {

            $reviews = DB::table('bky_user_reviews')
                ->where('listing_id','=',$review['listing_id'])
                ->where('review_id','=', $review_id)
                ->get()->toArray();

            $review_images = DB::table('bky_review_images')
                ->select('bky_review_images.*')
                ->join('bky_user_reviews', 'bky_review_images.review_id', '=', 'bky_user_reviews.review_id')
                ->where('bky_user_reviews.listing_id','=',$review['listing_id'])
                ->where('bky_review_images.review_id','=', $review_id)
                ->get()->toArray();


            $data = array(
                'review_lits'   => $reviews,
                'review_images' => $review_images,
                'message'       => 'success',
                'rating_avg'    => $rating_avg,
                'usersCount'    => $countReview[0]->usersCount,
                'starsAvg'      => round($countReview[0]->starsAvg),
                'listing_id'    => $review['listing_id'],
                'avgArray'      => $allAvg,
                'avgOverall'    => $avgOverall
            );

            echo json_encode($data);

        }else {

            $data = array(
                'review_lits'   =>  "",
                'review_iamges' =>  "",
                'message'       => 'failed',
                'rating_avg'    =>  $rating_avg,
                'usersCount'    => $countReview[0]->usersCount,
                'starsAvg'      => round($countReview[0]->starsAvg),
                'listing_id'   =>  $review['listing_id'],
                'avgArray'      => $allAvg,
                'avgOverall'    => $avgOverall

            );

            echo json_encode($data);

        }

    }

    public function add_quote_review(Request $request)
    {

        // dd($request->input());

         // $userinfo                    = $request->session()->get('bkyUser');
         $job_id                      = $request->input('job_id');
         $quote_id                    = $request->input('quote_id');
         $p_id                        = $request->input('p_id');
         $review['job_id']            = $job_id;
         $review['quote_id']          = $quote_id;
         $review['p_id']              = $p_id;
         $review['overall_rating']    = ($request->input('overall_rating') && $request->input('overall_rating')!="") ? $request->input('overall_rating') : '';
         $review['customer_name']     = $request->input('customer_name');
         $review['customer_review']       = $request->input('comment');

         $review_id = DB::table('fa_quotes_review')->insertGetId($review);

            $rating_avg = array();

            $star1 = DB::table('fa_quotes_review')
                ->where('job_id','=',$job_id)
                ->where('quote_id','=',$quote_id)
                ->where(function ($query) {
                    $query->where('overall_rating', '=', 0.5)
                      ->orWhere('overall_rating', '=', 1);
                })
                ->count('overall_rating');

            $star2 = DB::table('fa_quotes_review')
                ->where('job_id','=',$job_id)
                ->where('quote_id','=',$quote_id)
                ->where(function ($query) {
                    $query->where('overall_rating', '=', 1.5)
                      ->orWhere('overall_rating', '=', 2);
                })
                ->count('overall_rating');
            $star3 = DB::table('fa_quotes_review')
                ->where('job_id','=',$job_id)
                ->where('quote_id','=',$quote_id)
                ->where(function ($query) {
                    $query->where('overall_rating', '=', 2.5)
                      ->orWhere('overall_rating', '=', 3);
                })
                ->count('overall_rating');
            $star4 = DB::table('fa_quotes_review')
                ->where('job_id','=',$job_id)
                ->where('quote_id','=',$quote_id)
                ->where(function ($query) {
                    $query->where('overall_rating', '=', 3.5)
                      ->orWhere('overall_rating', '=', 4);
                })
                ->count('overall_rating');
            $star5 = DB::table('fa_quotes_review')
                ->where('job_id','=',$job_id)
                ->where('quote_id','=',$quote_id)
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

        $countReview =  DB::table('fa_quotes_review')
            ->select(DB::raw('avg(overall_rating) AS `starsAvg`, count(customer_name) AS `usersCount`'))
            ->where('job_id','=',$review['job_id'])
            ->where('quote_id','=',$review['quote_id'])
            ->get()->toArray();

        if($review_id) {

            $reviews = DB::table('fa_quotes_review')
                ->where('job_id','=',$job_id)
                ->where('quote_id','=',$quote_id)
                ->where('review_id','=', $review_id)
                ->get()->toArray();

            $data = array(
                'review_lits'   => $reviews,
                'message'       => 'success',
                'rating_avg'    => $rating_avg,
                'usersCount'    => $countReview[0]->usersCount,
                'starsAvg'      => round($countReview[0]->starsAvg),
            );

            echo json_encode($data);

        }else {

            $data = array(
                'review_lits'   =>  "",
                'message'       => 'failed',
                'rating_avg'    =>  $rating_avg,
                'usersCount'    => $countReview[0]->usersCount,
                'starsAvg'      => round($countReview[0]->starsAvg),

            );
            // dd($data);
            echo json_encode($data);

        }

    }

    public function filter_product_reviews(Request $request){

        // dd($request->input());
        $filter     = strtolower($request->input('filter_reviews'));
        $listing_id = $request->input('listing_id');
        $product_id = $request->input('product_id');

        if($filter == 'default') {

            $reviews = DB::table('bky_product_reviews')
                ->where('listing_id','=',$listing_id)
                ->where('product_id','=',$product_id)
                ->get()->toArray();

            $list = $reviews;

        } else if($filter == 'newest') {

            $reviews = DB::table('bky_product_reviews')
                ->where('listing_id','=',$listing_id)
                ->where('product_id','=',$product_id)
                ->orderBy('product_review_id', 'asc')
                ->take(10)
                ->get()->toArray();

            $list = $reviews;

        } else {

            $reviews = DB::table('bky_product_reviews')
                ->where('listing_id','=',$listing_id)
                ->where('product_id','=',$product_id)
                ->orderBy('product_review_id', 'desc')
                ->take(10)
                ->get()->toArray();

            $list = $reviews;

        }

        echo json_encode($list);


    }

    public function get_graph_data($listing_id) {

        $month_one =  DB::table('bky_user_reviews')
            ->select(DB::raw('avg(rating) AS `starsAvg`, count(username) AS `usersCount`'))
            ->where('listing_id','=', $listing_id)
            // ->where('month','=', date('F'))
            // ->where('year','=', date('Y'))
            ->where('month','=', date('F', strtotime("-1 month")))
            ->where('year','=', date('Y'))
            ->get()->first()->starsAvg;

        $one = ($month_one == null) ? 0 : round($month_one,0);


        $month_two =  DB::table('bky_user_reviews')
            ->select(DB::raw('avg(rating) AS `starsAvg`'))
            ->where('listing_id','=', $listing_id)
            ->where('month','=', date('F'))
            ->where('year','=', date('Y'))
            ->get()->first()->starsAvg;

        $two = ($month_two == null) ? 0 : round($month_two,0);


        $month_three =  DB::table('bky_user_reviews')
            ->select(DB::raw('avg(rating) AS `starsAvg`'))
            ->where('listing_id','=', $listing_id)
            ->where('month','=', date('F', strtotime("+1 month")))
            ->where('year','=', date('Y'))
            ->get()->first()->starsAvg;

        $three = ($month_three == null) ? 0 : round($month_three,0);

        $month_four =  DB::table('bky_user_reviews')
            ->select(DB::raw('avg(rating) AS `starsAvg`'))
            ->where('listing_id','=', $listing_id)
            ->where('month','=', date('F', strtotime("+2 month")))
            ->where('year','=', date('Y'))
            ->get()->first()->starsAvg;

        $four = ($month_four == null) ? 0 : round($month_four,0);


        $month_five =  DB::table('bky_user_reviews')
            ->select(DB::raw('avg(rating) AS `starsAvg`'))
            ->where('listing_id','=', $listing_id)
            ->where('month','=', date('F', strtotime("+3 month")))
            ->where('year','=', date('Y'))
            ->get()->first()->starsAvg;

        $five = ($month_five == null) ? 0 : round($month_five,0);

        $month_six =  DB::table('bky_user_reviews')
            ->select(DB::raw('avg(rating) AS `starsAvg`'))
            ->where('listing_id','=', $listing_id)
            ->where('month','=', date('F', strtotime("+4 month")))
            ->where('year','=', date('Y'))
            ->get()->first()->starsAvg;

        $six = ($month_six == null) ? 0 : round($month_six,0);

        $avg = array($one, $two, $three, $four, $five, $six);

        // dd($avg);

        echo json_encode($avg);



    }

    public function filter_reviews(Request $request){

        $filter     = strtolower($request->input('filter_reviews'));
        $listing_id = $request->input('listing_id');

        if($filter == 'all') {

            $reviews = DB::table('bky_user_reviews')
                ->where('listing_id','=',$listing_id)
                ->orderBy('review_id', 'asc')
                ->get()->toArray();

            foreach($reviews as &$rec) {

                $rec->count_comments = DB::table('bky_users_comments')
                ->where('review_id','=',$rec->review_id)->count('comment_id');

                $rec->reactions  =  DB::table('bky_users_likes')
                ->select(DB::raw('bky_user_reviews.listing_id, sum(bky_users_likes.reaction = "like") AS `like`, sum(bky_users_likes.reaction = "haha") AS `haha`, sum(bky_users_likes.reaction = "love") AS `love`, sum(bky_users_likes.reaction = "wow") AS `wow`, sum(bky_users_likes.reaction = "angry") AS `angry`'))
                ->join('bky_user_reviews', 'bky_users_likes.review_id', '=', 'bky_user_reviews.review_id')
                ->where('bky_user_reviews.listing_id','=', $listing_id)
                ->where('bky_users_likes.review_id','=',$rec->review_id)
                ->get()->toArray();

                $rec->review_images =  DB::table('bky_review_images')
                ->select('bky_review_images.*')
                ->join('bky_user_reviews', 'bky_review_images.review_id', '=', 'bky_user_reviews.review_id')
                ->where('bky_user_reviews.listing_id','=', $listing_id)
                ->where('bky_review_images.review_id','=',$rec->review_id)
                ->get()->toArray();
            }

            $list = $reviews;
            // dd($list);

        } else if($filter == 'recent') {

            $reviews = DB::table('bky_user_reviews')
                ->where('listing_id','=',$listing_id)
                ->orderBy('review_id', 'asc')
                ->take(10)
                ->get()->toArray();

            foreach($reviews as &$rec) {

                $rec->count_comments = DB::table('bky_users_comments')
                ->where('review_id','=',$rec->review_id)->count('comment_id');

                $rec->reactions  =  DB::table('bky_users_likes')
                ->select(DB::raw('bky_user_reviews.listing_id, sum(bky_users_likes.reaction = "like") AS `like`, sum(bky_users_likes.reaction = "haha") AS `haha`, sum(bky_users_likes.reaction = "love") AS `love`, sum(bky_users_likes.reaction = "wow") AS `wow`, sum(bky_users_likes.reaction = "angry") AS `angry`'))
                ->join('bky_user_reviews', 'bky_users_likes.review_id', '=', 'bky_user_reviews.review_id')
                ->where('bky_user_reviews.listing_id','=', $listing_id)
                ->where('bky_users_likes.review_id','=',$rec->review_id)
                ->get()->toArray();

                $rec->review_images =  DB::table('bky_review_images')
                ->select('bky_review_images.*')
                ->join('bky_user_reviews', 'bky_review_images.review_id', '=', 'bky_user_reviews.review_id')
                ->where('bky_user_reviews.listing_id','=', $listing_id)
                ->where('bky_review_images.review_id','=',$rec->review_id)
                ->get()->toArray();
            }

            $list = $reviews;

        } else if($filter == 'high to low') {

            $reviews = DB::table('bky_user_reviews')
                ->where('listing_id','=',$listing_id)
                ->orderBy('rating', 'asc')
                ->get()->toArray();

            foreach($reviews as &$rec) {

                $rec->count_comments = DB::table('bky_users_comments')
                ->where('review_id','=',$rec->review_id)->count('comment_id');

                $rec->reactions  =  DB::table('bky_users_likes')
                ->select(DB::raw('bky_user_reviews.listing_id, sum(bky_users_likes.reaction = "like") AS `like`, sum(bky_users_likes.reaction = "haha") AS `haha`, sum(bky_users_likes.reaction = "love") AS `love`, sum(bky_users_likes.reaction = "wow") AS `wow`, sum(bky_users_likes.reaction = "angry") AS `angry`'))
                ->join('bky_user_reviews', 'bky_users_likes.review_id', '=', 'bky_user_reviews.review_id')
                ->where('bky_user_reviews.listing_id','=', $listing_id)
                ->where('bky_users_likes.review_id','=',$rec->review_id)
                ->get()->toArray();

                $rec->review_images =  DB::table('bky_review_images')
                ->select('bky_review_images.*')
                ->join('bky_user_reviews', 'bky_review_images.review_id', '=', 'bky_user_reviews.review_id')
                ->where('bky_user_reviews.listing_id','=', $listing_id)
                ->where('bky_review_images.review_id','=',$rec->review_id)
                ->get()->toArray();
            }

            $list = $reviews;

        } else if($filter == 'low to high') {

            $reviews = DB::table('bky_user_reviews')
                ->where('listing_id','=',$listing_id)
                ->orderBy('rating', 'desc')
                ->get()->toArray();

            foreach($reviews as &$rec) {

                $rec->count_comments = DB::table('bky_users_comments')
                ->where('review_id','=',$rec->review_id)->count('comment_id');

                $rec->reactions  =  DB::table('bky_users_likes')
                ->select(DB::raw('bky_user_reviews.listing_id, sum(bky_users_likes.reaction = "like") AS `like`, sum(bky_users_likes.reaction = "haha") AS `haha`, sum(bky_users_likes.reaction = "love") AS `love`, sum(bky_users_likes.reaction = "wow") AS `wow`, sum(bky_users_likes.reaction = "angry") AS `angry`'))
                ->join('bky_user_reviews', 'bky_users_likes.review_id', '=', 'bky_user_reviews.review_id')
                ->where('bky_user_reviews.listing_id','=', $listing_id)
                ->where('bky_users_likes.review_id','=',$rec->review_id)
                ->get()->toArray();

                $rec->review_images =  DB::table('bky_review_images')
                ->select('bky_review_images.*')
                ->join('bky_user_reviews', 'bky_review_images.review_id', '=', 'bky_user_reviews.review_id')
                ->where('bky_user_reviews.listing_id','=', $listing_id)
                ->where('bky_review_images.review_id','=',$rec->review_id)
                ->get()->toArray();
            }

            $list = $reviews;

        } else {

            $reviews = DB::table('bky_user_reviews')
                ->where('listing_id','=',$listing_id)
                ->orderBy('rating', 'asc')
                ->get()->toArray();

            foreach($reviews as &$rec) {

                $rec->count_comments = DB::table('bky_users_comments')
                ->where('review_id','=',$rec->review_id)->count('comment_id');

                $rec->reactions  =  DB::table('bky_users_likes')
                ->select(DB::raw('bky_user_reviews.listing_id, sum(bky_users_likes.reaction = "like") AS `like`, sum(bky_users_likes.reaction = "haha") AS `haha`, sum(bky_users_likes.reaction = "love") AS `love`, sum(bky_users_likes.reaction = "wow") AS `wow`, sum(bky_users_likes.reaction = "angry") AS `angry`'))
                ->join('bky_user_reviews', 'bky_users_likes.review_id', '=', 'bky_user_reviews.review_id')
                ->where('bky_user_reviews.listing_id','=', $listing_id)
                ->where('bky_users_likes.review_id','=',$rec->review_id)
                ->get()->toArray();

                $rec->review_images =  DB::table('bky_review_images')
                ->select('bky_review_images.*')
                ->join('bky_user_reviews', 'bky_review_images.review_id', '=', 'bky_user_reviews.review_id')
                ->where('bky_user_reviews.listing_id','=', $listing_id)
                ->where('bky_review_images.review_id','=',$rec->review_id)
                ->get()->toArray();
            }

            $list = $reviews;
        }

        // dd($list);

        echo json_encode($list);


    }

    public function add_comment(Request $request){

            $userinfo  = $request->session()->get('bkyUser');

            if($userinfo->user_image !=null) {

                $comment['image'] = $userinfo->user_image;

            } else {

                $comment['image'] = 'new_logo.png';

            }

            $comment['review_id']  = $request->input('review_id');
            $listing_id            = $request->input('listing_id');
            $comment['comment']    = $request->input('comment');
            $comment['user_id']    = $userinfo->user_Id;
            $comment['username']   = $userinfo->user_firstname.' '.$userinfo->user_lastname;

            $comment_id = DB::table('bky_users_comments')->insertGetId($comment);

            $commentsList = DB::table('bky_users_comments')
                ->where('review_id','=',$comment['review_id'])
                ->where('comment_id','=',$comment_id)
                ->orderBy('comment_id','desc')
                ->get()->toArray();

            $countComments = DB::table('bky_users_comments')
                ->join('bky_user_reviews', 'bky_users_comments.review_id', '=', 'bky_user_reviews.review_id')
                ->where('bky_user_reviews.listing_id','=', $listing_id)
                ->where('bky_users_comments.review_id','=',$comment['review_id'])
                ->count('bky_users_comments.comment');

            $data = array(
                'commentsList'  => $commentsList,
                'countComments' => $countComments,
                'user_id'       => $userinfo->user_Id
            );

            echo json_encode($data);

    }

    public function get_users_comments($id){

       $userinfo  = session()->get('bkyUser');

       $id         = explode('_', $id);
       $review_id  = $id[0];
       $listing_id = $id[1];

        $result = DB::table('bky_users_comments')
                ->join('bky_user_reviews', 'bky_users_comments.review_id', '=', 'bky_user_reviews.review_id')
                ->where('bky_user_reviews.listing_id','=',$listing_id)
                ->where('bky_users_comments.review_id','=',$review_id)
                ->select('bky_users_comments.*')
                ->orderBy('bky_users_comments.comment_id','desc')
                ->get()->toArray();


        $data = array(
            'result'  => $result,
            'user_id' => $userinfo->user_Id
        );


        echo json_encode($data);

    }
    public function delete_user_comment($comment_id)
    {
        $comment = DB::table('bky_users_comments')
            ->where('comment_id','=',$comment_id)
            ->delete();

        echo json_encode($comment);

    }

    public function upate_user_comment(Request $request)
    {

        $comment    = $request->input('comment');
        $comment_id = $request->input('comment_id');

        $update = DB::table('bky_users_comments')
            ->where('comment_id','=',$comment_id)
            ->update(['comment' => $comment]);

        echo json_encode($update);

    }

    public function add_user_likes(Request $request)
    {
        // dd($request->input());
        $userinfo  = $request->session()->get('bkyUser');

        $likes['review_id']   = $request->input('review_id');
        $likeId               = $request->input('like_id');
        $listing_id           = $request->input('listing_id');
        $likes['reaction']    = $request->input('reaction');
        $likes['image_class'] = $request->input('image_class');
        $likes['text_class']  = $request->input('text_class');
        $likes['user_id']     = $userinfo->user_Id;

        if($likeId == null || $likeId ==""){

            $like_id = DB::table('bky_users_likes')->insertGetId($likes);

        } else{
              $update = DB::table('bky_users_likes')
            ->where('like_id','=',$likeId)
            ->update([
              'reaction'    => $likes['reaction'],
              'image_class' => $likes['image_class'],
              'text_class'  => $likes['text_class']
              ]);

            $like_id = $likeId;
        }


        $reactions_count =  DB::table('bky_users_likes')
            ->select(DB::raw('bky_user_reviews.listing_id, sum(bky_users_likes.reaction = "like") AS `like`, sum(bky_users_likes.reaction = "haha") AS `haha`, sum(bky_users_likes.reaction = "love") AS `love`, sum(bky_users_likes.reaction = "wow") AS `wow`, sum(bky_users_likes.reaction = "angry") AS `angry`'))
            ->join('bky_user_reviews', 'bky_users_likes.review_id', '=', 'bky_user_reviews.review_id')
            ->where('bky_user_reviews.listing_id','=', $listing_id)
            ->where('bky_users_likes.review_id','=',$likes['review_id'])
            ->get()->toArray();

        $data = array(
                'reactions_count'    => $reactions_count,
                'like_id'            => $like_id
        );

        echo json_encode($data);

    }
}
