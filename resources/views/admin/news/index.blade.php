<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="http://cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		@if(count($news)>0)
			@foreach($news as $singlenews)
			<ul>
				<li>{{ $singlenews->title }}</li>
				<li>{!! str_replace("_public_path/", asset(""), $singlenews->content); !!}</li>
				<li><a href="{{ URL('admin/news/'.$singlenews->id.'/edit') }}">编辑</a></li>
				<li><a href="{{ URL('admin/news/'.$singlenews->id.'/delete') }}">删除</a></li>
			</ul>
			<br>
			@endforeach
		@endif
	</div>
</body>
</html>