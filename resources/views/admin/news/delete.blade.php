@extends("admin.index")

@section("content")
<?php $selected = 1; ?>
<ol class="breadcrumb">
	<li>
		<a href="{{ URL("admin/news") }}">新闻列表</a>
	</li>
	<li><a href="{{ URL("admin/news/".$news->id) }}">{{ $news->id }}</a></li>
	<li class="active">删除新闻</li>
</ol>

<div class="panel panel-default">
	<div class="panel-heading">删除新闻</div>
	<ul class="list-group">
		<li class="list-group-item">
			<p>你将要删除下面这条新闻，请确认。</p>
			<form action="{{ URL('admin/news/'.$news->id) }}" method="POST">
				<input type="hidden" name="_method" value="DELETE">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="submit" class="btn btn-danger" value="确认删除">
			</form>
		</li>
		<li class="list-group-item">
			<h3 class="text-center">{{ $news->title }}</h3>
		<h4 class="text-right"><small>{{ $news->created_at }}</small></h4>
		<hr>
		{!! str_replace('_public_path', asset("/"), $news->content) !!}
		</li>
	</ul>
</div>

@endsection