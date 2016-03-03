<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!-- 新 Bootstrap 核心 CSS 文件 -->
	<link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/website/main.css">

	<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
	<script src="/assets/jquery.min.js"></script>

	<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
	<script src="/assets/bootstrap/js/bootstrap.min.js"></script>
	@yield('head')
	<title>@yield('title')</title>
</head>

	<script>var navigation = responsiveNav("#nav");</script>

<body>

	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

					<a class="navbar-brand" href="/blog/{{$data['user']['id']}}/home">@yield('host')的个人空间</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="active">
							<a href="#">
								实验室主页
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<li>
							<a href="{{URL('/lab')}}">实验室概况</a>
						</li>

						<li>
							<a href="#">工作动态</a>
						</li>
					</ul>

					<ul class="nav navbar-nav navbar-right">
						<li><form name="search" method="GET" action="{{url('blog/'.$data['user']['id'].'/home/search')}}" class="navbar-form" role="search">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="user_id" value="{{ $data['user']['id'] }}">
						<div class="form-group">
							<input name="searchtit" type="text" class="form-control" placeholder="Search" required="required"></div>
						<button type="submit" class="btn btn-default">Submit</button>
					</form></li>
					@if(Auth::check())
					<li class="navbar-text">你好,
					@if(Auth::user()->isTeacher())
					<a href="{{URL('/blog/'.Auth::user()->id.'/home')}}" class="blog-btn">{{ Auth::user()->name }}</a>
					@else
					{{ Auth::user()->name }}
					@endif
					</li>
					<li><a href="{{URL('/logout')}}">登出</a></li>
					@else
					<li><a href="{{URL('/login')}}">登录</a></li>
					@endif
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container-fluid -->
		</div>

	</nav>
	@yield('content')
	<div class="container">
		<div class="blog-block" style='text-align: center;text-decoration-color: #999999; padding-top: 30px; padding-bottom: 20px;'>@copyright</div>
	</div>

</body>
</html>