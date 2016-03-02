@extends('admin.index')
@section('title')
新闻管理
@endsection
@section('content')
<?php $selected = 1;?>
<div class="panel panel-default">
	<div class="panel-heading">新闻列表</div>
	<ul class="list-group">
		<li class="list-group-item">
			<ul class="list-inline">
			<li>
				<button class="btn btn-success" onClick="location.href='{{ URL('admin/news/create') }}'">
					<span class="glyphicon glyphicon-plus right-margin"></span>
					添加新闻
				</button>
			</li>
			<li>
				<div class="dropdown">
					<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
						{{ $tag == null ? "全部分类" : $tag }}
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
						<li>
							<a href="{{ URL('admin/news?tag=全部分类') }}">全部分类</a>
						</li>
						<li>
							<a href="{{ URL('admin/news?tag=新闻动态') }}">新闻动态</a>
						</li>
						<li>
							<a href="{{ URL('admin/news?tag=通知公告') }}">通知公告</a>
						</li>
						<li>
							<a href="{{ URL('admin/news?tag=人才招聘') }}">人才招聘</a>
						</li>
						<li><a href="{{ URL('admin/news?tag=合作交流') }}">合作交流</a></li>
						<li><a href="{{ URL('admin/news?tag=举办会议') }}">举办会议</a></li>
						<li><a href="{{ URL('admin/news?tag=学术报告') }}">学术报告</a></li>
						<li><a href="{{ URL('admin/news?tag=外出交流') }}">外出交流</a></li>
					</ul>
				</div>
				</li>
			</ul>
		</li>
	</ul>
		<table class="table table-striped">
		<tr>
				<th>新闻ID</th>
				<th>新闻分类</th>
				<th>新闻标题</th>
				<th>操作</th>
			</tr>

		@foreach($news as $simple_news)
			<tr>
				<td><a href="{{ URL('admin/news/'.$simple_news->id) }}">{{ $simple_news->id }}</a></td>
				<td>{{ $simple_news->tag }}</td>
				<td><a href="{{ URL('admin/news/'.$simple_news->id) }}">{{ $simple_news->title }}</a></td>
				<td>
					<a href="{{ URL('admin/news/'.$simple_news->id."/edit") }}">
						<span class="glyphicon glyphicon-pencil"></span>
					</a>
					<a href="{{ URL('admin/news/'.$simple_news->id."/delete") }}">
						<span class="glyphicon glyphicon-remove left-margin-lg"></span>
					</a>
				</td>
			</tr>
		@endforeach


		</table>
		@if(count($news) == 0)
		<ul class="list-group">
			<li class="list-group-item text-center">没有符合要求的数据</li>
		</ul>
		@endif
		@if($news->render() != null)
		<ul class="list-group">
			<li class="list-group-item text-center">
			{!! $news->appends(['tag' => $tag])->render() !!}

			</li>
		</ul>
		@endif
	</div>
	@endsection