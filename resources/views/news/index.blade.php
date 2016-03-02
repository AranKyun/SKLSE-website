@extends('navbar')
@section('title')
{{$tag_selection}}
@endsection
@section('extra-link')
<link rel="stylesheet" href="{{ asset('assets/website/subpage.css') }}">
@endsection

@section('content')

		<div class="container menu-container">
			<div class="col-md-3">
				<div class="downdown center-block">
					<div class="stayaway">
						<div class="button-list">
							<a href="{{URL('/news?tag=全部动态')}}">{!! ($tag_selection == "全部动态")?'<span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
								&nbsp;':"" !!}全部动态</a>
						</div>
						<div class="button-list">
							<a href="{{URL('/news?tag=新闻动态')}}">{!! ($tag_selection == "新闻动态")?'<span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
								&nbsp;':"" !!}
								新闻动态
							</a>
						</div>
						<div class="button-list">
							<a href="{{URL('/news?tag=通知公告')}}">{!! ($tag_selection == "通知公告")?'<span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
								&nbsp;':"" !!}通知公告</a>
						</div>
						<div class="button-list">
							<a href="{{URL('/news?tag=人才招聘')}}">{!! ($tag_selection == "人才招聘")?'<span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
								&nbsp;':"" !!}人才招聘</a>
						</div>
						<div class="button-list">
							<a href="{{URL('/news?tag=合作交流')}}">{!! ($tag_selection == "合作交流")?'<span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
								&nbsp;':"" !!}合作交流</a>
						</div>
						<div class="button-list">
							<a href="{{URL('/news?tag=举办会议')}}">{!! ($tag_selection == "举办会议")?'<span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
								&nbsp;':"" !!}举办会议</a>
						</div>
						<div class="button-list">
							<a href="{{URL('/news?tag=学术报告')}}">{!! ($tag_selection == "学术报告")?'<span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
								&nbsp;':"" !!}学术报告</a>
						</div>
						<div class="button-list">
							<a href="{{URL('/news?tag=外出交流')}}">{!! ($tag_selection == "外出交流")?'<span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
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
			<div class="col-md-9">
				<div class="allcontent">
				<?php
$week_arr = array("日", "一", "二", "三", "四", "五", "六");
?>
					<p class="ltittle"> <b>{{ $tag_selection }}</b>
					</p>
					<?php setlocale(LC_TIME, 'zh')?>
					@foreach($news as $simple_news)
					<div class="newsblock">
					<div class="blockcover">
						<div class="all-viewblock text-right">
							<div class="viewblock-a">{{$simple_news->visit}}</div>
							<div class="viewblock-b">浏览量</div>
						</div>
					</div>

						<div class="trendsoverview">
							<div class="trends-tittle">
								<a href="{{ URL('/news/'.$simple_news->id) }}">{{ $simple_news->title }}</a>
							</div>
							<p><small><span>{{ $simple_news->created_at->year."年".$simple_news->created_at->month."月".$simple_news->created_at->day."日 (星期".$week_arr[$simple_news->created_at->dayOfWeek].") " }}</span><a href="{{URL('/news?tag='.$simple_news->tag)}}"><span class="label label-primary">{{ $simple_news->tag }}</span></a></small></p>
							<div>{{ mb_substr(str_replace('&nbsp;', ' ', strip_tags($simple_news->content)), 0, 100)."..." }}</div>
						</div>
					</div>
					@endforeach
				<div class="text-center">
					{!! $news->render() !!}
				</div>

				</div>
			</div>
		</div>

@endsection