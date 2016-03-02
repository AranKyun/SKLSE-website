<!DOCTYPE html>
<html>
<head>
	<title>
		个人设置
	</title>
</head>
<body>
<p>{{$user->name}}</p>
<p>{{$user->email}}</p>
<form method="POST" action="{{URL('blog/'.$user->id.'/admin/set/store')}}" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="name" value="{{ $blog->name }}">
<input type="hidden" name="user_id" value="{{ $blog->user_id }}">
<input type="hidden" name="old_icon" value="{{ $blog->icon }}">
<input type="file" name="icon" />

@if($blog->sex=='')
保密：<input type="radio" checked="checked" name="sex" value="male" />
<br />
男性：<input type="radio"  name="sex" value="male" />
<br />
女性：<input type="radio" name="sex" value="female" />
<br/>
@elseif($blog->sex=='male')
保密：<input type="radio"  name="sex" value="male" />
<br />
男性：<input type="radio"  name="sex" value="male" checked="checked" />
<br />
女性：<input type="radio" name="sex" value="female" />
<br/>
@else
保密：<input type="radio" checked="checked" name="sex" value="male" />
<br />
男性：<input type="radio"  name="sex" value="male" />
<br />
女性：<input type="radio" name="sex" value="female" checked="checked" />
<br/>
@endif



@if($blog->introduction=='')
	<textarea name='introduction'>
			暂无简介
	</textarea>
@else
	<textarea name='introduction'>
			{{$blog->introduction}}
	</textarea>
@endif


<input type="submit" name="submit" value="上传" />	
</form>


</body>
</html>