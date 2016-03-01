<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="http://cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<title>
		{{$data['user']['name']}}の文件中心
	</title>
</head>
<body>
<div>

	<form action="{{URL('blog/'.$data['user']['id'].'/admin/uploads')}}" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="user_id" value="{{ $data['user']['id'] }}">
    	<input type="file" name="myfile" />
		<input type="submit" name="submit" value="上传" />

	</form>
	
		@if(count($data['files'])>0)
			@foreach($data['files'] as $file)
			<ul>
				<li>{{basename($file->original_name,'.'.substr(strrchr($file->original_name, '.'), 1)) }}</li>

				<form action="{{ URL('blog/'.$data['user']['id'].'/admin/uploads/'.$file->id) }}" method="POST" name="deleteform">
					<input type="hidden" name="_method" value="DELETE">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="submit" name="submit" value="删除">
				</form>
			</ul>
			<br>
			@endforeach
		@endif
</div>

</body>
</html>