@extends('admin.index')

@section('content')
<form action="{{ URL('admin/homepage/news') }}" class="form-horizontal" enctype="multipart/form-data" method="POST" id="form-news">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="panel panel-default">
		<div class="panel-heading"> <strong>图片新闻设置</strong>
		</div>
		<ul class="list-group">
			<li class="list-group-item">请在这里添加图片新闻，需要添加高清图片、文字描述、新闻ID，并选择是否为轮播新闻。</li>
			@if($config->news == null)
			<li class="list-group-item">
				<div class="form-group">
					<label for="text[]" class="col-sm-2 control-label">文字描述</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="text[]"></div>
					<div class="checkbox col-sm-2">
  <label>
    <input type="checkbox" value="true" name="isCarousel[]">选为轮播新闻
  </label>
</div>
				</div>
				<div class="form-group">
					<label for="img[]" class="col-sm-2 control-label">图片</label>
					<div class="col-sm-4">
						<input type="file" class="form-control" name="img[]"></div>
					<label for="newsid[]" class="col-sm-2 control-label">新闻ID</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" name="newsid[]"></div>
					<label for="" class="control-label left-margin">
					<a class="delete-btn" tabindex="0" role="button" data-placement="bottom" data-html="true" data-toggle="popover"  data-content='<p>你确定删除此轮播新闻吗？</p><button type="button" class="btn btn-danger center-block delete-confirm-btn">删除</button>'><span class="glyphicon glyphicon-minus-sign"></span></a>
					</label>
				</div>
			</li>
			@else
			@foreach($config->news as $news)
			<li class="list-group-item">
				<div class="form-group">
					<label for="text[]" class="col-sm-2 control-label">文字描述</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="text[]" value="{{ $news->text }}"></div>
						<div class="checkbox col-sm-2">
  <label>
    <input type="checkbox" value="true" name="isCarousel[]" <?php if ($news->isCarousel == true) {
	echo "checked";
}
?>>选为轮播新闻
  </label>
</div>
				</div>
				<div class="form-group">
					<label for="img[]" class="col-sm-2 control-label">图片</label>
					<div class="col-sm-4">
						<p class="form-control-static">{{ $news->imgFilename }} <a class="change-img-btn">更改</a></p>
						<input type="file" class="form-control" style="display: none;" name="img[]"></div>
					<label for="newsid[]" class="col-sm-2 control-label">新闻ID</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" value="{{ $news->newsid }}" name="newsid[]"></div>
					<label for="" class="control-label left-margin">
						<a class="delete-btn" tabindex="0" role="button" data-placement="bottom" data-html="true" data-toggle="popover"  data-content='<p>你确定删除此轮播新闻吗？</p><button type="button" class="btn btn-danger center-block delete-confirm-btn">删除</button>'><span class="glyphicon glyphicon-minus-sign"></span></a>

					</label>
				</div>
			</li>
			@endforeach
			@endif
			<li class="list-group-item">
				<a id="btn-addCarousel">
					<span class="glyphicon glyphicon-plus-sign right-padding left-margin-xlg"></span>
					添加新的轮播图片新闻
				</a>
				<script>
					$(function(){
						$('#btn-save-carousel').click(function(){
							$('input[name="isCarousel[]"]').not(":checked").val("false");
							$('input[name="isCarousel[]"]').not(":checked").attr("checked", true);
							$('#form-news').submit();
						});

						$('#btn-addCarousel').click(function(){
							var html = '<li class="list-group-item"><div class="form-group"><label for="text[]" class="col-sm-2 control-label">文字描述</label><div class="col-sm-8"><input type="text" class="form-control" name="text[]"></div><div class="checkbox col-sm-2"><label><input type="checkbox" value="true" name="isCarousel[]">选为轮播新闻</label></div></div><div class="form-group"><label for="img[]" class="col-sm-2 control-label">图片</label><div class="col-sm-4"><input type="file" class="form-control" name="img[]"></div><label for="newsid[]" class="col-sm-2 control-label">新闻ID</label><div class="col-sm-2"><input type="text" class="form-control" name="newsid[]"></div><label for="" class="control-label left-margin"><a class="delete-btn" tabindex="0" role="button" data-placement="bottom" data-html="true" data-toggle="popover"  data-content=\'<p>你确定删除此轮播新闻吗？</p><button type="button" class="btn btn-danger center-block delete-confirm-btn">删除</button>\'><span class="glyphicon glyphicon-minus-sign"></span></a></label></div></li>';
							$(this).parent().before(html);
							$('[data-toggle="popover"]').popover();
							$('.delete-btn').click(function(){
							$(this).popover();
							will_delete = $(this);
							$('.delete-confirm-btn').click(function(){
								will_delete.popover();
								will_delete.parent().parent().parent().remove();
							});
						});
						});

						$('#add-spotlight-btn').click(function(){
							var html = '<div class="form-group"><label for="newsid[]" class="col-sm-2 control-label">新闻ID</label><div class="col-sm-3"><input type="text" class="form-control" name="newsid[]"></div><label for="" class="control-label left-margin"><a class="delete-btn-spotlight" tabindex="0" role="button" data-placement="bottom" data-html="true" data-toggle="popover"  data-content=\'<p>你确定删除这条Spotlight吗？</p><button type="button" class="btn btn-danger center-block delete-confirm-btn">删除</button>\'><span class="glyphicon glyphicon-minus-sign"></span></a></label></div>';

							$(this).before(html);
							$('[data-toggle="popover"]').popover();
							$('.delete-btn-spotlight').click(function(){
							$(this).popover();
							will_delete = $(this);
							$('.delete-confirm-btn').click(function(){
								will_delete.popover();
								will_delete.parent().parent().remove();
							});
						});

						});

						$('#add-blog-btn').click(function(){
							var html = '<div class="form-group"><label for="blogid[]" class="col-sm-2 control-label">空间ID</label><div class="col-sm-3"><input type="text" class="form-control" name="blogid[]"></div><label for="" class="control-label left-margin"><a class="delete-btn-blog" tabindex="0" role="button" data-placement="bottom" data-html="true" data-toggle="popover"  data-content=\'<p>你确定删除这条空间展示吗？</p><button type="button" class="btn btn-danger center-block delete-confirm-btn">删除</button>\'><span class="glyphicon glyphicon-minus-sign"></span></a></label></div>';
							$(this).before(html);
							$('[data-toggle="popover"]').popover();
							$('.delete-btn-blog').click(function(){
							$(this).popover();
							will_delete = $(this);
							$('.delete-confirm-btn').click(function(){
								will_delete.popover();
								will_delete.parent().parent().remove();
							});
						});

						});

						$('[data-toggle="popover"]').popover();

						var will_delete = null;

						$('.delete-btn').click(function(){
							$(this).popover();
							will_delete = $(this);
							$('.delete-confirm-btn').click(function(){
								will_delete.popover();
								will_delete.parent().parent().parent().remove();
							});
						});

						$('.delete-btn-spotlight').click(function(){
							$(this).popover();
							will_delete = $(this);
							$('.delete-confirm-btn').click(function(){
								will_delete.popover();
								will_delete.parent().parent().remove();
							});
						});

						$('.delete-btn-blog').click(function(){
							$(this).popover();
							will_delete = $(this);
							$('.delete-confirm-btn').click(function(){
								will_delete.popover();
								will_delete.parent().parent().remove();
							});
						});

						$('.change-img-btn').click(function(){
							$(this).parent().hide();
							$(this).parent().siblings().eq(0).show();
						});



					});
				</script>
			</li>
			<li class="list-group-item" id="btn-save-carousel">
				<button class="btn btn-success left-margin-xlg">保存</button>
			</li>
		</ul>
	</div>
</form>

<form action="{{ URL('admin/homepage/spotlight') }}" method="POST" class="form-horizontal">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="panel panel-default">
		<div class="panel-heading"> <strong>Spotlight新闻管理</strong>
		</div>
		<ul class="list-group">
			<li class="list-group-item">只需要输入新闻ID。</li>
			<li class="list-group-item">
			@if($config->spotlights == null)
				<div class="form-group">
					<label for="newsid[]" class="col-sm-2 control-label">新闻ID</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" name="newsid[]"></div>
					<label for="" class="control-label left-margin">
						<a class="delete-btn-spotlight" tabindex="0" role="button" data-placement="bottom" data-html="true" data-toggle="popover"  data-content='<p>你确定删除这条Spotlight吗？</p><button type="button" class="btn btn-danger center-block delete-confirm-btn">删除</button>'><span class="glyphicon glyphicon-minus-sign"></span></a>
					</label>
				</div>
			@else
			@foreach($config->spotlights as $spotlight)
				<div class="form-group">
					<label for="newsid[]" class="col-sm-2 control-label">新闻ID</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" name="newsid[]" value="{{ $spotlight->newsid }}"></div>
					<label for="" class="control-label left-margin">
						<a class="delete-btn-spotlight" tabindex="0" role="button" data-placement="bottom" data-html="true" data-toggle="popover"  data-content='<p>你确定删除这条Spotlight吗？</p><button type="button" class="btn btn-danger center-block delete-confirm-btn">删除</button>'><span class="glyphicon glyphicon-minus-sign"></span></a>
					</label>
				</div>
			@endforeach
			@endif
				<a id="add-spotlight-btn">
					<span class="glyphicon glyphicon-plus-sign right-padding left-margin-xlg"></span>
					添加新的Spotlight
				</a>
			</li>
			<li class="list-group-item">
				<button type="submit" class="btn btn-success left-margin-xlg">保存</button>
			</li>
		</ul>
	</div>
</form>

<form action="{{ URL('admin/homepage/blog') }}" class="form-horizontal" method="POST">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="panel panel-default">
		<div class="panel-heading">
			<strong>主页个人空间管理</strong>
		</div>
		<ul class="list-group">
			<li class="list-group-item">只需输入空间ID，不可以超过6个。</li>
			<li class="list-group-item">
				@if($config->blogs == null)
				<div class="form-group">
					<label for="blogid[]" class="col-sm-2 control-label">空间ID</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" name="blog[]"></div>
					<label for="" class="control-label left-margin">
						<a class="delete-btn-blog" tabindex="0" role="button" data-placement="bottom" data-html="true" data-toggle="popover"  data-content='<p>你确定删除这条空间展示吗？</p><button type="button" class="btn btn-danger center-block delete-confirm-btn">删除</button>'><span class="glyphicon glyphicon-minus-sign"></span></a>
					</label>
				</div>
			@else
			@foreach($config->blogs as $blog)
				<div class="form-group">
					<label for="blogid[]" class="col-sm-2 control-label">用户ID</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" name="blogid[]" value="{{ $blog->blogid }}"></div>
					<label for="" class="control-label left-margin">
						<a class="delete-btn-blog" tabindex="0" role="button" data-placement="bottom" data-html="true" data-toggle="popover"  data-content='<p>你确定删除这条空间展示吗？</p><button type="button" class="btn btn-danger center-block delete-confirm-btn">删除</button>'><span class="glyphicon glyphicon-minus-sign"></span></a>
					</label>
				</div>
			@endforeach
			@endif
				<a id="add-blog-btn">
					<span class="glyphicon glyphicon-plus-sign right-padding left-margin-xlg"></span>
					添加新的主页个人空间
				</a>
			</li>
			<li class="list-group-item">
				<button type="submit" class="btn btn-success left-margin-xlg">保存</button>
			</li>
		</ul>
	</div>
</form>
@endsection