
@extends('navbar')

@section('title')
基础设施
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
							<a href="{{URL('/lab')}}">实验室简介</a>
						</div>
						<div class="button-list">
							<a href="{{URL('/lab/facility')}}">
								<span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
								&nbsp;基础设施
							</a>
						</div>
						<div class="button-list">
							<a href="{{URL('/lab/talent')}}">人才培养</a>
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
						</script>
					</div>
				</div>
			</div>
		</div>
@endsection