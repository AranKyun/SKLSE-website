<!DOCTYPE html>
<html>
<head>
	<title>
		博客
	</title>
</head>
<body>


	@if(count($users)>0)

	@foreach($users as $user)
	<ul>
		<li>
			<a href="{{URL('/blog/'.$user->id.'/home')}}">{{$user->name}}</a>
		</li>
	</ul>

	@endforeach


	@else
	<h1>暂时没有人开通博客</h1>

	@endif
</body>
</html>

