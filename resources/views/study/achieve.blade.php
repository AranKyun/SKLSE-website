
@extends('navbar')

@section('title')
科研成果
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
							<a href="{{URL('/study')}}">研究队伍</a>
						</div>
						<div class="button-list">
							<a href="{{URL('/study/project')}}">课题研究</a>
						</div>
						<div class="button-list">
							<a href="{{URL('/study/achieve')}}">
								<span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
								&nbsp;科研成果
							</a>
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
					<p class="ltittle"> <b>承担项目</b>
					</p>
					<table class="table table-hover">
						<tr>
							<td width="80%">
								<a href="#">何炎祥教授获2014年湖北省科技进步一等奖</a>
							</td>
							<td>2014-9-10</td>
						</tr>
					</table>
					<p class="ltittle"> <b>发表论文</b>
					</p>
					<table class="table table-hover">
						<tr>
							<td width="80%">
								<a href="#">2012年实验室发表CCF论文清单</a>
							</td>
							<td>2015-01-16</td>
						</tr>
						<tr>
							<td>
								<a href="#">2013年实验室发表CCF论文清单</a>
							</td>
							<td>2015-01-16</td>

						</tr>
						<tr>
							<td>
								<a href="#">2014年实验室发表CCF论文清单</a>
							</td>
							<td>2015-01-16</td>

						</tr>
					</table>

					<p class="ltittle">
						<b>获奖情况</b>
					</p>
					<p class="ltittle">
						<b>专利软件</b>
					</p>
					<p class="ltittle">
						<b>制定标准</b>
					</p>
					<table class="table table-hover">
						<tr>
							<td width="80%">
								<a href="#">实验室主持制定的国际标准</a>
							</td>
							<td>2015-01-15</td>
						</tr>
						<tr>
							<td>
								<a href="#">实验室主持制定的国家标准</a>
							</td>
							<td>2015-01-15</td>

						</tr>
						<tr>
							<td>
								<a href="#">实验室主持制定的行业标准</a>
							</td>
							<td>2015-01-15</td>

						</tr>
						<tr>
							<td>
								<a href="#">实验室主持制定的地方标准</a>
							</td>
							<td>2015-01-15</td>

						</tr>
					</table>

				</div>
			</div>
		</div>
@endsection