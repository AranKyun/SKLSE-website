@extends("admin.index")

@section("extra-head")
<link rel="stylesheet" href="{{ asset('assets/summernote/summernote.css') }}">
<script src="{{ asset('assets/summernote/summernote.js') }}"></script>
<script src="{{ asset('assets/summernote/lang/summernote-zh-CN.js') }}"></script>
@endsection

@section("content")
<?php $selected = 1;?>

<ol class="breadcrumb">
	<li>
		<a href="{{ URL('admin/news') }}">新闻列表</a>
	</li>
	<li class="active">添加新闻</li>
</ol>
<form action="{{ URL('/admin/news') }}" class="form-horizontal" id="editor-form" method="POST">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div id="summernote"></div>
	<input type="hidden" name="content" id="news-content">
	<script>
		$(function(){
			$('#summernote').summernote({
				lang: 'zh-CN',
				height: 400
			});
			var title = '<div class="panel-heading">添加新闻</div>';
			var input_title = '<ul class="list-group"><li class="list-group-item"><div class="form-group no-margin"><label for="" class="col-sm-2 control-label">新闻标题</label><div class="col-sm-4"><input type="text" class="form-control" name="title"/></div><label for="" class="col-sm-2 control-label">新闻分类</label><div class="col-sm-4"><select name="tag" id="" class="form-control"><option value="新闻动态">新闻动态</option><option value="通知公告">通知公告</option><option value="人才招聘">人才招聘</option><option value="合作交流">合作交流</option><option value="举办会议">举办会议</option><option value="学术报告">学术报告</option><option value="外出交流">外出交流</option></select></div></div></li></ul>';
			var button_submit = '<ul class="list-group"><li class="list-group-item"><button id="btn-submit" class="btn btn-success">保存</button></li></ul>';
			$('.note-editor.panel').prepend(title, input_title).append(button_submit);

			$('#btn-submit').click(function(){

				$('#news-content').val($('#summernote').summernote('code'));
				$('#editor-form').submit();
			});
		});
	</script>
</form>

@endsection