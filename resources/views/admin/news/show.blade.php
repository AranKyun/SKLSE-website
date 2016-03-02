@extends('admin.index')

@section('content')
<?php $selected = 1; ?>

<ol class="breadcrumb">
	<li><a href="{{ URL('admin/news') }}">新闻列表</a></li>
	<li class="active">{{ $news->id }}</li>
</ol>

<div class="panel panel-default">
	<div class="panel-heading">新闻详情</div>
	<div class="panel-body">
		<h3 class="text-center">{{ $news->title }}</h3>
		<h4 class="text-right"><small>{{ $news->created_at }}</small></h4>
		<hr>
		{!! str_replace('_public_path', asset("/"), $news->content) !!}
	</div>
</div>

@endsection