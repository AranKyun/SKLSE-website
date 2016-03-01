<!DOCTYPE html>
<html>
<head>
	<title>
		搜索
	</title>
</head>
<body>
@if(count($articles)>0)
<div>

@foreach($articles as $article)
	<div>
		<a href="{{url('/blog/'.$id.'/home/'.$article->id)}}">{{$article->title}}</a>
	</div>
@endforeach

	<div>
		{!! $articles->render() !!}
	</div>
</div>

@else
<div>
	暂无相关博文
</div>
@endif

</body>
</html>




