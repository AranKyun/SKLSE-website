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
	<div>
		{{$data['blog']->name}}
		{{$data['blog']->sex}}
		{{$data['blog']->introduction}}
		@if($data['blog']->icon!='')
		<img src="{{URL('/assets/images/icon/'.$data['blog']->icon)}}">
		@else
		<img src="/assets/images/icon/default.jpg">
		@endif
	</div>
	<form action="{{ URL('blog/'.$data['user']['id'].'/admin/create/') }}" method="GET" name="createform">
		<input type="submit" name="submit" value="增加">
	</form>
	
		@if(count($data['articles'])>0)
			@foreach($data['articles'] as $article)
			<ul>
				<a href="{{URL('/blog/'.$data['user']['id'].'/admin/'.$article->id )}}">{{ $article->title }}</a>
				<li>{!! str_replace("_public_path/", asset(""), $article->content); !!}</li>
				<li><a href="{{ URL('blog/'.$data['user']['id'].'/admin/'.$article->id.'/edit') }}">编辑</a></li>
				<form action="{{ URL('blog/'.$data['user']['id'].'/admin/'.$article->id) }}" method="POST" name="deleteform">
					<input type="hidden" name="_method" value="DELETE">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="submit" name="submit" value="删除">
				</form>
			</ul>
			<br>
			@endforeach
		@endif
		<a href="{{URL('blog/'.$data['user']['id'].'/admin/uploads')}}">文件中心</a>

		<a href="{{URL('blog/'.$data['user']['id'].'/admin/set')}}">个人设置</a>
	</div>


</body>
</html>