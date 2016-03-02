@extends('navbar')

@section('extra-link')
<link rel="stylesheet" href="{{ asset('assets/website/subpage.css') }}">
@endsection

@section('content')

		<div class="container menu-container">
			<div class="col-md-3">
				<div class="downdown center-block">
					<div class="stayaway">
						<div class="button-list">
							<a href="{{URL('/news?tag=全部动态')}}">{!! ($tag_selection == 0)?'<span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
								&nbsp;':"" !!}全部动态</a>
						</div>
						<div class="button-list">
							<a href="{{URL('/news?tag=新闻动态')}}">{!! ($tag_selection == 1)?'<span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
								&nbsp;':"" !!}
								新闻动态
							</a>
						</div>
						<div class="button-list">
							<a href="{{URL('/news?tag=通知公告')}}">{!! ($tag_selection == 2)?'<span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
								&nbsp;':"" !!}通知公告</a>
						</div>
						<div class="button-list">
							<a href="{{URL('/news?tag=人才招聘')}}">{!! ($tag_selection == 3)?'<span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
								&nbsp;':"" !!}人才招聘</a>
						</div>
						<div class="button-list">
							<a href="{{URL('/news?tag=合作交流')}}">{!! ($tag_selection == 4)?'<span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
								&nbsp;':"" !!}合作交流</a>
						</div>
						<div class="button-list">
							<a href="{{URL('/news?tag=举办会议')}}">{!! ($tag_selection == 5)?'<span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
								&nbsp;':"" !!}举办会议</a>
						</div>
						<div class="button-list">
							<a href="{{URL('/news?tag=学术报告')}}">{!! ($tag_selection == 6)?'<span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
								&nbsp;':"" !!}学术报告</a>
						</div>
						<div class="button-list">
							<a href="{{URL('/news?tag=外出交流')}}">{!! ($tag_selection == 7)?'<span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
								&nbsp;':"" !!}外出交流</a>
						</div>
						<script>
							$(function(){
								$('.button-list').mouseenter(function(){
									$(this).stop(true);
									$(this).animate({left:"10px"}, "fast");
								});
								$('.button-list').mouseleave(function(){
									$(this).stop(true);
									$(this).animate({left:"0px"}, "fast");
								});
							});

							$(function(){
								$('.newsblock').mouseenter(function(){
									$(this).children().first().stop(true);
									$(this).children().first().animate({left:"-5px", "background-color" : "#000"}, "fast");
								});
								$('.newsblock').mouseleave(function(){
									$(this).children().first().stop(true);
									$(this).children().first().animate({left:"0px"}, "fast");
								});
							});
						</script>
					</div>
				</div>
			</div>
			<?php
$week_arr = array("日", "一", "二", "三", "四", "五", "六");
?>
			<div class="col-md-9 news-content">
				<h3 class="text-center">{{$news->title}}</h3>
				<h4 class="text-right"><small>{{ $news->created_at->year."年".$news->created_at->month."月".$news->created_at->day."日 (星期".$week_arr[$news->created_at->dayOfWeek].") " }}</small></h4>
				<hr>
				 {!! $news->content !!}
			</div>
		</div>

@endsection