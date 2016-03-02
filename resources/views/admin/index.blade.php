<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="{{asset("assets/bootstrap/css/bootstrap.min.css")}}">
	<link rel="stylesheet" href="{{asset("assets/admin/admin.css")}}">
	<script src="{{asset("assets/jquery.min.js")}}"></script>
	<script src="{{asset("assets/bootstrap/js/bootstrap.min.js")}}"></script>
	@yield('extra-head')
</head>
<body>
	<div class="topbar">
		<div class="container">
			<span class="glyphicon glyphicon-education right-padding"></span>
			<span>SKLSE Administration Control Panel</span>
			<a href="#" class="return-btn">退出返回主页</a>
		</div>
	</div>
	<div class="container">
		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title"> <strong>后台信息管理</strong>
					</div>
				</div>
				<div class="list-group">
					<a href="{{ URL("admin/homepage") }}" class="list-group-item <?php if ($selected == 0) {
	echo "selected-item";
}
?>">
						<span class="glyphicon glyphicon-home right-padding"></span>
						主页内容管理
					</a>
					<a href="{{ URL("admin/news") }}" class="list-group-item <?php if ($selected == 1) {
	echo "selected-item";
}
?>">
						<span class="glyphicon glyphicon-globe right-padding"></span>
						新闻管理
					</a>
					<a href="{{ URL('admin/user') }}" class="list-group-item <?php if ($selected == 2) {
	echo "selected-item";
}
?>">
						<span class="glyphicon glyphicon-user right-padding"></span>
						用户账号管理
					</a>
					<a href="" class="list-group-item <?php if ($selected == 3) {
	echo "selected-item";
}
?>">
						<span class="glyphicon glyphicon-file right-padding"></span>
						教师个人空间管理
					</a>
					<a href="" class="list-group-item <?php if ($selected == 4) {
	echo "selected-item";
}
?>">
						<span class="glyphicon glyphicon-download-alt right-padding"></span>
						下载文件库管理
					</a>
				</div>
			</div>
		</div>
		<div class="col-md-9">
			@yield('content')
		</div>


	</div>
</body>
</html>