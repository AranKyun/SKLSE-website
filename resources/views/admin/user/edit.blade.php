@extends('admin.index')
@section('title')
用户编辑
@endsection
@section('content')
<?php $selected = 2;?>
<div class="panel panel-default">
	<div class="panel-heading">编辑用户{{$user->id}}</div>
	<form class="form-horizontal" action="{{ URL('admin/user/'.$user->id) }}" method="POST">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<ul class="list-group">
		<li class="list-group-item">

				<div class="form-group">
					<label class="col-sm-2 control-label">用户名称</label>
					<div class="col-sm-10">
						<p class="form-control-static">{{$user->name}}</p>
					</div>
					<label class="col-sm-2 control-label">用户ID</label>
					<div class="col-sm-10">
						<p class="form-control-static">{{$user->id}}</p>
					</div>
					<label class="col-sm-2 control-label">用户邮箱</label>
					<div class="col-sm-10">
						<p>{{$user->email}}</p>
					</div>
					<label class="col-sm-2 control-label">用户类型</label>
					<div class="col-sm-4">
						@if($user->tag == 'admin')
						<p class="form-control-static">{{ $user->tag }}</p>
						@else
						<select class="form-control" name="tag">
							<option value="default" <?php if ($user->tag == 'default') {
	echo 'selected';
}
?>>default</option>
							<option value="teacher" <?php if ($user->tag == 'teacher') {
	echo 'selected';
}
?>>teacher</option>
						</select>
						@endif

					</div>
					<div class="col-sm-6"></div>

				</div>

		</li>
		<li class="list-group-item">
		@if($user->tag == 'admin')
			<p class="text-danger">管理员帐户不可编辑，如需重置管理员账户的邮箱及口令，请在用户管理界面点击重置按钮。</p>
		@else
			<button class="btn btn-success" type="submit">保存</button>
		@endif
		</li>
	</ul>
</form>
</div>
@endsection