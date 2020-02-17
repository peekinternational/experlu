@extends('layouts.app')
@section('content')
<style>
.turner-single-blog {
	background-color: #fff;
	overflow: hidden;
	text-align: left;
	-webkit-transition: all 0.3s ease-in-out 0s;
	-o-transition: all 0.3s ease-in-out 0s;
	transition: all 0.3s ease-in-out 0s;
	margin-bottom: 30px;
	-webkit-box-shadow: 0 0 4px rgba(0, 0, 0, 0.20);
	box-shadow: 0 0 4px rgba(0, 0, 0, 0.20);
}
.turner-blog-thumb img {
	width: 100%;
}
.blog-page-title h2 a {
	color: #333;
	font-weight: 600;
}
.blog_btn a {
	font-size: 15px;
	font-weight: 500;
	-webkit-transition: .5s;
	-o-transition: .5s;
	transition: .5s;
	display: inline-block;
	border: 2px solid #626b72;
	padding: 7px 21px;
	background: transparent;
	color: #626b72;
	border-radius: 30px;
	margin-top: 22px;
}
.blog_btn a:hover {
	color: #fff;
	border-color: #072f44;
	background-color: #072f44;
}
.em-blog-content-area {
	padding: 30px 20px 35px;
	text-align: left;
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
<?php $page_name = array('blog','pagename'); ?>
<section class="we-offer-area text-center bg-gray">
	<div class="container">
		<div class="blog_area blog-grid" id="blog">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-8 col-sm-7 col-xs-12">
						<div class="row">
							@if(count($blogs) > 0)
							@foreach($blogs as $item)



							<div class="col-md-12 col-sm-12 col-xs-12">
								<!-- turner SINGLE BLOG -->
								<div class="turner-single-blog ">
									<!-- BLOG THUMB -->
									<div class="blog_thumb_inner">
										<div class="turner-blog-thumb ">
											<a href="{{url('blog/show/'.$item->id)}}">
												<img src="{{asset('frontend-assets/dashboard/post/'.$item->blog_image)}}" alt="blog1">
											</a>
											<!-- <div class="blog_thum_content">
											<a href="{{url('blog/show/'.$item->id)}}">Bar &amp; Club</a>
										</div> -->
									</div>

								</div>
								<div class="em-blog-content-area ">
									<!-- BLOG META -->
									<div class="turner-blog-meta">
										<div class="turner-blog-meta-left">
											<?php
											$date =$item->updated_at;
											$show_date =date("l M, d, Y", strtotime($date));
											?>
											<!-- <span><i class="fa fa-calendar"></i>{{date_format($item->updated_at,'d M Y')}}</span> -->
											<span><i class="fa fa-calendar"></i>{{$show_date}}</span>
											<a href="{{url('blog/show/'.$item->id)}}"><span><i class="fa fa-user"></i><?php //echo $item->user->name ?> </span></a>
										</div>
									</div>
									<!-- BLOG TITLE -->
									<div class="blog-page-title ">
										<h2><a href="{{url('blog/show/'.$item->id)}}">{{$item->title}}</a></h2>
									</div>
									<div class="blog_btn">
										<a href="{{url('blog/show/'.$item->id)}}">Read More</a>
									</div>
								</div>

							</div>

						</div>

						@endforeach
						@endif

					</div>

					<!-- start pagination -->
					{{ $blogs->links() }}



				</div>

				<div class=" col-lg-4 col-md-4 col-sm-5 col-xs-12 sidebar-right content-widget pdsr">
					<div class="blog-left-side widget">
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
									<span class="rcomment">{{date_format($item->created_at,'d M Y')}}</span>
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
		</div>
		<div id="tags" class="widget tagcloud">
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
