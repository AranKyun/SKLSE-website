<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>

		<!-- 新 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="http://cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="{{ asset('assets/summernote/summernote.css') }}" />
<script src="{{ asset('assets/summernote/summernote.js') }}"></script>
</head>
<body>
<div class="container">
<form action="{{ URL('/admin/news') }}" method="POST" >
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="text" name="title">
	<div id="summernote"></div>
	<button id="submit">Submit</button>
	<input type="hidden" name="content" id="content">
</form>
	<script>
		$(function(){
			$('#summernote').summernote();

			$('#submit').click(function(){
				$('#content').attr('value', $('#summernote').summernote('code'));
				$('#form').submit();
			});
		});
	</script>
</div>
	
</body>
</html>