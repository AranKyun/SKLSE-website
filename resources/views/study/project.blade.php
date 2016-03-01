
@extends('navbar')

@section('title')
课题研究
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
							<a href="{{URL('/study')}}">

								研究队伍
							</a>
						</div>
						<div class="button-list">
							<a href="{{URL('/study/project')}}"><span class="glyphicon glyphicon-tags" aria-hidden="true"></span>&nbsp;课题研究</a>
						</div>
						<div class="button-list">
							<a href="{{URL('/study/achieve')}}">科研成果</a>
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
			<script>
				$(function () {
  $('[data-toggle="popover"]').popover()
})
			</script>
			<div class="col-md-9">
				<div class="allcontent">
					<p class="ltittle"> <b>自主课题</b>
					</p>
					<table class="table table-hover">
						<tr>
							<td width="20%">第一批</td>
							<td><a href="#">暂无</a></td>
						</tr>
						<tr>
							<td>第二批</td>
							<td><a href="#">暂无</a></td>
						</tr>
					</table>
					<p class="ltittle">
						<b>开放课题</b>
					</p>
					<table class="table table-hover">
						<tr>
							<td width="20%">第九批</td>
							<td><a href="#">暂无</a></td>
						</tr>
						<tr>
							<td>第十批</td>
							<td><a href="#">软件工程国家重点实验室（武汉大学）第10批开放课题指南</a></td>
						</tr>
					</table>
				</div>
			</div>
		</div>

@endsection