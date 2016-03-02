<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="{{asset("assets/bootstrap/css/bootstrap.min.css")}}">
	<link rel="stylesheet" href="{{asset("assets/website/navbar.css")}}">
	<script src="{{asset("assets/jquery.min.js")}}"></script>
	<script src="{{asset("assets/bootstrap/js/bootstrap.min.js")}}"></script>
	@yield('extra-link')
</head>
<body>
<div class="blue-bar">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="top-header">
						<img class="img-responsive" src="{{ asset('assets/images/website/sklse_top.png') }}" alt='软件工程国家重点实验室'></div>
				</div>
				<div class="col-sm-6 text-right">
					<div class="top-header">
						<a href="#" class="yuyan" >▼English</a>
						<form class="navbar-form navbar-right" role="search">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Search"></div>
							<button type="button" class="btn btn-default" aria-label="Left Align">
								<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
							</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="header-row">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="logo">
						<img src="{{ asset('assets/images/website/sklse_logo.png')}}"></div>
				</div>

				<div class="col-md-6">
					<div class="nav-bar">
						<ul class="nav nav-pills nav-justified">
							<li role="presentation" active":"" }}">
								<a href="{{ URL('/') }}">主页</a>
							</li>
							<li role="presentation" active":"" }}">
								<a href="{{ URL('/lab') }}">实验室概况</a>
							</li>
							<li role="presentation" active":"" }}">
								<a href="{{ URL('/study') }}">科学研究</a>
							</li>
							<li role="presentation" active":"" }}">
								<a href="{{ URL('/news') }}">工作动态</a>
							</li>
						</ul>
					</div>
				</div>

			</div>
		</div>
	</div>
	@yield('content')
	<div class="bottombar">
		<div class="container">
			<h4>>>快速链接</h4>

			<div class="col-md-4">
				<ul class="fastlink">
					<li>
						<a href="">软件工程国家重点实验室</a>
					</li>
					<li>
						<a href="">实验室概况</a>
						<ul>
							<li>
								<a href="">实验室简介</a>
							</li>
							<li>
								<a href="">基础设施</a>
							</li>
							<li>
								<a href="">人才培养</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="">科学研究</a>
						<ul>
							<li>
								<a href="">研究队伍</a>
							</li>
							<li>
								<a href="">课题研究</a>
							</li>
							<li>
								<a href="">研究成果</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			<div class="col-md-4">
				<ul class="fastlink">
					<li>
						<a href="">工作动态</a>
						<ul>
							<li>
								<a href="">新闻动态</a>
							</li>
							<li>
								<a href="">通知公告</a>
							</li>
							<li>
								<a href="">人才招聘</a>
							</li>
							<li>
								<a href="">举办会议</a>
							</li>
							<li>
								<a href="">学术报告</a>
							</li>
							<li>
								<a href="">外出交流</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			<div class="col-md-4">
				<img src="{{ asset('assets/images/website/sklse_bottom.png') }}" alt="" class="bottomlogo"></div>
		</div>
	</div>
</body>
</html>