
@extends('navbar')

@section('title')
研究队伍
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
								<span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
								&nbsp;研究队伍
							</a>
						</div>
						<div class="button-list">
							<a href="{{URL('/study/project')}}">课题研究</a>
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
					<p class="ltittle"> <b>优秀人才</b>
					</p>
					<p> <b>中国工程院院士</b>
						&nbsp;&nbsp;刘经南
					</p>
					<p>
						<b>千人计划专家</b>
						&nbsp;&nbsp;周怀北
					</p>
					<p>
						<b>国家杰出青年科学基金获得者</b>
						&nbsp;&nbsp;徐宝文、刘梦赤
					</p>
					<p>
						<b>青年千人专家</b>
						&nbsp;&nbsp;王骞、陈震中
					</p>
					<p>
						<b>教育部跨世纪人才</b>
						&nbsp;&nbsp;徐宝文、李元香
					</p>
					<p>
						<b>教育部新世纪人才</b>
						&nbsp;&nbsp;彭智勇、刘娟、荆晓远、肖春霞
					</p>
					<p>
						<b>湖北省百人计划专家</b>
						&nbsp;&nbsp;颜松远、刘梦赤
					</p>
					<p>
						<b>湖北省楚天学者</b>
						&nbsp;&nbsp;荆晓远、吴小莹
					</p>
					<p class="ltittle">
						<b>教授</b>
					</p>
					<br>
					<p class="ltittle">
						<b>副教授</b>
					</p>
					<br>
					<p class="ltittle">
						<b>讲师</b>
					</p>

				</div>
			</div>
		</div>



@endsection