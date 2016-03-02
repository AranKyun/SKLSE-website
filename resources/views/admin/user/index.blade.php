@extends('admin.index')

@section('content')
<?php $selected = 2;?>
<div class="panel panel-default">
	<div class="panel-heading">账号管理</div>
	<div class="list-group">
		<div class="list-group-item">这里可以对注册过的用户进行操作。</div>
	</div>
			<table class="table table-striped">
			<tr>
				<th>用户ID</th>
				<th>用户名</th>
				<th>邮箱</th>
				<th>用户类型</th>
				<th>操作</th>
			</tr>

		@foreach($users as $user)
			<tr>
				<td>{{ $user->id }}</td>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				<td>{{ $user->tag }}</td>
				<td>
					<a href="{{ URL('admin/user/'.$user->id."/edit") }}">
						<span class="glyphicon glyphicon-pencil"></span>
					</a>
					<a href="{{ URL('admin/user/'.$user->id."/delete") }}">
						<span class="glyphicon glyphicon-remove left-margin-lg"></span>
					</a>
				</td>
			</tr>
		@endforeach


		</table>
		@if(count($users) == 0)
		<ul class="list-group">
			<li class="list-group-item text-center">没有符合要求的数据</li>
		</ul>
		@endif
		@if($users->render() != null)
		<ul class="list-group">
			<li class="list-group-item text-center">
			{!! $news->render() !!}

			</li>
		</ul>
		@endif
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				重置后台管理账号
			</div>
			<div class="panel-body">
				<p>点击下面按钮会重置账号，新的账户和口令将在服务器根目录的admin.txt文件中。</p>
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">重置账号
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">你确定要重置账号吗？</h4>
      </div>
      <div class="modal-body">
        一旦重置，不可以恢复。
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <a class="btn btn-primary" href="{{ URL('admin/user/reset') }}">确定</a>
      </div>
    </div>
  </div>
</div>
			</div>
		</div>
@endsection