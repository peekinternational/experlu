@extends('layouts.app')
@section('content')
<style>
.blog_details {
	border: 1px solid #ddd;
	padding: 15px 15px 21px;
}
.blog_dtl_thumb img {
	width: 100%;
}
.blog-left-side > div {
	background-color: #fff;
	margin-bottom: 30px;
	padding: 15px;
	border: 1px solid #ddd;
}
.recent-post-image img {
	max-width: 100%;
	width: 100%;
	height: auto;
}
.single-widget-item {
	overflow: hidden;
}
.blog-left-side .widget h2 {
	margin-top: 0;
}
.recent-post-item {
	clear: both;
	-webkit-transition: .5s;
	-o-transition: .5s;
	transition: .5s;
}
.recent-post-image {
	float: left;
	margin-right: 10px;
}
.recent-post-image a {
	display: inline-block;
	margin-top: 6px;
	margin-bottom: 5px;
}
.recent-post-text {
	overflow: hidden;
}
.blog-grid .recent-post-text>h4 {
	margin-bottom: 3px;
	line-height: 18px;
}
.recent-post-text h4 a {
	color: #333;
	font-size: 14px;
	-webkit-transition: all 0.3s ease 0s;
	-o-transition: all 0.3s ease 0s;
	transition: all 0.3s ease 0s;
}
</style>
<section class="we-offer-area text-center bg-gray">
	<div class="container">
<!-- <div class="breatcome_area" style="background-image: url({{url('images/brd-bg.jpg')}})">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="breatcome_title">
							<div class="breatcome_title_inner">
								<h2>{{$post->title}}</h2>
								<div class="breatcome_content">
									<ul>
										<li><a href="#">home <i class="fa fa-angle-right"></i></a>show</li>
									</ul>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> -->

	<div class="blog_area blog-grid blog-details-area" id="blog">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-7 col-xs-12">
					<div class="row">
						<div class="col-md-12">
							<div class="blog_details">
								<div class="blog_dtl_thumb">
									<img src="{{asset('frontend-assets/dashboard/post/'.$post->blog_image)}}" alt="">
								</div>
								<div class="blog_dtl_content">
									<h2>{{$post->title}}</h2>
									<!-- BLOG META -->
									<div class="turner-blog-meta">
										<div class="turner-blog-meta-left">
											<?php
											$date =$post->updated_at;
											$show_date =date("l M, d, Y", strtotime($date));
											?>
											<span><i class="fa fa-calendar"></i>{{$show_date}}</span>
											<span><i class="fa fa-user"></i>{{$post->user->name}}</span>
										</div>
									</div>

									<p style="margin-top: 30px;">{!!$post->body!!}</p>
									<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- header ad -->
<!-- <ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-5526721257079100"
     data-ad-slot="8989678011"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script> -->

								</div>
							</div>
						</div>
					</div>
				</div>
				<div class=" col-lg-4 col-md-4 col-sm-5 col-xs-12 sidebar-right content-widget pdsr">
					<div class="blog-left-side widget">
						<!-- <div id="search-3" class="widget widget_search">
							<div class="search">
								<form action="#" method="get">
									<input type="text" name="s" value="" placeholder="Type Your Keyword" title="Search for:">
									<button type="submit" class="icons">
										<i class="fa fa-search"></i>
									</button>
								</form>
							</div>
						</div> -->
						<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- header ad -->
						<ins class="adsbygoogle"
						     style="display:block"
						     data-ad-client="ca-pub-5526721257079100"
						     data-ad-slot="8989678011"
						     data-ad-format="auto"
						     data-full-width-responsive="true"></ins>
						<script>
						     (adsbygoogle = window.adsbygoogle || []).push({});
						</script>
						<div id="em_recent_post_widget-8" class="widget widget_recent_data">
							<div class="single-widget-item">
								<h2 class="widget-title">Popular Post</h2>
								@if(count($top_three_posts) > 0)
                                @foreach($top_three_posts as $item)

								<div class="recent-post-item">
									<div class="recent-post-image">
										<a href="{{url('blog/show/'.$item->id)}}">
											<img width="100" height="80" src="{{asset('frontend-assets/dashboard/post/'.$item->blog_image)}}" alt="">
										</a>
									</div>
									<div class="recent-post-text">
										<h4><a href="{{url('blog/show/'.$item->id)}}">
											<!-- {{$item->title}} -->
											</a>
										</h4>
										<span class="rcomment">{{date_format($item->updated_at,'d M Y')}}</span>
									</div>
								</div>
								@endforeach
								@endif
							</div>
						</div>
						<!-- <div id="categories-3" class="widget widget_categories">
							<h2 class="widget-title">Categories</h2>
							<ul>
								@foreach($categories as $cat)
								<li class="cat-item cat-item-8"><a href="{{url('single-category')}}?skill={{$cat->skill_name}}">{{$cat->skill_name}}</a>
								</li>
								@endforeach
							</ul>
						</div> -->

						<!-- <div id="tags" class="widget tagcloud">
							<h2 class="widget-title">Archives</h2>
								<a href="">Event</a>
								<a href="">Food</a>
								<a href="">Water</a>
								<a href="">Glass</a>
								<a href="">Ciramic</a>
								<a href="">Plastic</a>
								<a href="">Polite</a>
								<a href="">Modern</a>
						</div> -->

					</div>
				</div>

			</div>
		</div>
	</div>
</div>
</section>


@endsection
@section('script')
@endsection
