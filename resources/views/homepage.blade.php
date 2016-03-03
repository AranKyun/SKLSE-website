@extends('navbar')
@section('title')
SKLSE软件工程国家重点实验室
@endsection
@section('extra-link')
<link rel="stylesheet" href="{{ asset('assets/website/homepage.css') }}">
<script src="{{ asset('assets/jquery-migrate-1.2.1.js') }}"></script>
<script src="{{ asset('assets/jquery.timers.js') }}"></script>
@endsection
@section('content')
<div class="container-fluid heading-pic">
	<div class="row" id="imgviewer">
		<div class="col-sm-8 imgviewer-container">
		@if($config->news == null)
		<div class="imgviewer-img" src="{{ asset('assets/images/website/test_carousel.jpg') }}"></div>
		@else
			<?php $num_carousel = 0;?>
			@foreach($config->news as $news)
			@if($news->isCarousel == true)
			<?php $num_carousel++;?>
			<div class="imgviewer-img" src="{{ asset('assets/images/website/Uploaded/'.$news->imgFilename) }}"></div>
			@endif
			@endforeach
			@if($num_carousel == 0)
			<div class="imgviewer-img" src="{{ asset('assets/images/website/test_carousel.jpg') }}"></div>
			@endif
			@endif

		</div>
		<div class="col-sm-4 imgviewer-text">
		@if($config->news == null)
			<div>
				<div>请设置需展示的图片。</div>
			</div>
		@else

		@foreach($config->news as $news)
			@if($news->isCarousel == true)
			<div>
				<div>{{ $news->text }}</div>
			</div>
			@endif
			@endforeach
			@if($num_carousel == 0)
			<div>
				<div>请设置需展示的图片。</div>
			</div>
			@endif
@endif
		</div>
	</div>
</div>
<script>

	$(function(){
		var imgObj = $("#imgviewer").children(".imgviewer-container").children(".imgviewer-img");
		var textObj = $("#imgviewer").children(".imgviewer-text").children();

		var alter_num = imgObj.length;
		imgObj.each(function(){
			$(this).css("background-image", "url("+$(this).attr("src")+")");
		});

		imgObj.eq(0).siblings().hide();
		textObj.eq(0).siblings().hide();

		var img_now = 0;
		var sliding = false;

		function switchTo(next) {
			if(sliding == true) return;
			sliding = true;
			if(next > img_now) {
				imgObj.eq(next).show();
				imgObj.eq(img_now).animate({top:"-100%"}, "slow");
				imgObj.eq(next).animate({top:"-100%"}, "slow");
				textObj.eq(next).show();
				textObj.eq(img_now).animate({top:"-450px"}, "slow");
				textObj.eq(next).animate({top:"-450px"}, "slow", function(){
					imgObj.eq(img_now).hide();
					imgObj.css("top", "0");
					textObj.eq(img_now).hide();
					textObj.css("top", "0px");
					img_now = next;
					sliding = false;
				});
			}
			else if(next < img_now) {
				imgObj.eq(next).css("top", "100%");
				imgObj.eq(img_now).css("top", "-100%");
				imgObj.eq(next).show();
				imgObj.eq(img_now).animate({top:"-200%"}, "slow");
				textObj.eq(next).css("top", "450px");
				textObj.eq(img_now).css("top", "-450px");
				textObj.eq(next).show();
				textObj.eq(img_now).animate({top:"-900px"}, "slow");
				textObj.eq(next).animate({top:"0"}, "slow");
				imgObj.eq(next).animate({top:"0"}, "slow", function(){
					imgObj.eq(img_now).hide();
					imgObj.css("top", "0");
					textObj.eq(img_now).hide();
					textObj.css("top", "0");
					img_now = next;
					sliding = false;
				});
			}

		}

		$("body").everyTime("5s", function(){
			switchTo(img_now + 1 >= alter_num ? 0 : img_now + 1);
		});

		$(".slide-block").mouseenter(function(){
				$(this).children(".blockfader").stop(true);
				$(this).children(".blockfader").animate({top:"0"}, "fast");
			});
			$(".slide-block").mouseleave(function(){
				$(this).children(".blockfader").stop(true);
				$(this).children(".blockfader").animate({top:"-180px"}, "fast");
			});
	});
</script>

<div class="container heading-pic ">
	<div class="col-md-7" style="background-color: white">
		<h3> <b>NEWS</b>
		</h3>
		<div class="row text-center">
		@if($config->news == null)
			<div class="col-sm-6">
				<div class="slide-block center-block" style="background-image: url({{ asset('assets/images/website/test_news.jpg') }})">
					<div class="blockfader">请设置一个新闻</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="slide-block center-block" style="background-image: url({{ asset('assets/images/website/test_news.jpg') }})">
					<div class="blockfader">请设置一个新闻</div>
				</div>
			</div>
		@else
		<?php $num_news = 0;?>
		@foreach($config->news as $news)
		@if($num_news < 4)
		@if($news->isCarousel == false)
		<?php $num_news++;?>
		<div class="col-sm-6">
			<div class="slide-block center-block" style="background-image: url({{ asset('assets/images/website/Uploaded/'.$news->imgFilename) }});">
					<div class="blockfader">{{ $news->text }}</div>
				</div>
		</div>
		@endif
		@endif
		@endforeach
		@if($num_news == 0)
		<div class="col-sm-6">
				<div class="slide-block center-block" style="background-image: url({{ asset('assets/images/website/test_news.jpg') }})">
					<div class="blockfader">请设置一个新闻</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="slide-block center-block" style="background-image: url({{ asset('assets/images/website/test_news.jpg') }})">
					<div class="blockfader">请设置一个新闻</div>
				</div>
			</div>
		@endif
		@endif

		</div>
		<a href="/news" class="moreee">>>MORE</a>

		<h3> <b>FACULTY</b>
		</h3>

			<div class="row text-center">
		@for($i = 0; $i < 3; $i++)
		@if($config->blogs[$i] != null)
			<div class="col-md-4">
				<div class="blog center-block">
					<img src="img/facu.jpg" alt="">
					<div class="blockfader"></div>
			</div>
		</div>
		@else
			<div class="col-md-4">
				<div class="facuslide center-block" style="background-image: url({{ asset('assets/images/website/default_user.jpg') }})">

					<div class="blogname">请设置用户</div>
			</div>
		</div>
		@endif
		@endfor

	</div>
	<div class="row text-center">
		@for($i = 3; $i < 6; $i++)
		@if($config->blogs[$i] != null)
			<div class="col-md-4 text-center">
				<div class="facuslide">
					<img src="img/facu.jpg" alt="">
					<div class="blockfader"></div>
			</div>
		</div>
		@endif
		@endfor
	</div>
	<a href="/blog" class="moreee">>>MORE</a>

</div>
<div class="col-md-offset-1 col-md-4">
	<h3>
		<b>SPOTLIGHT</b>
	</h3>
	@if(count($config->spotlights) == 0)
	<div class="spotblock">
		<div class="spotdate text-center">
			<div class="topblock">JAN.</div>
			<div class="downblock">1ST</div>
		</div>
		<div class="spotcontent">请设置Spotlight内容</div>
	</div>
	@else
	@foreach($config->spotlights as $spotlight)
	<div class="spotblock">
		<div class="spotdate text-center">
			<div class="topblock">{{ $spotlight->month }}</div>
			<div class="downblock">{{ $spotlight->day }}</div>
		</div>
		<div class="spotcontent">{{ $spotlight->title }}</div>
	</div>
	@endforeach
	@endif

	<br>
	<a href="/news" class="moreee">>>MORE</a>
</div>
</div>
@endsection