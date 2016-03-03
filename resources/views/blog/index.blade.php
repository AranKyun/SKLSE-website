
@extends('navbar')

@section('title')
个人空间列表
@endsection

@section('extra-link')
<link rel="stylesheet" href="{{ asset('assets/website/subpage.css') }}">
@endsection

@section('content')
<div class="container">
	<div class="row" style="margin-top: 20px;">
		<div class="col-sm-offset-1 div col-sm-6">
			<p class="ltittle">个人空间列表</p>
		</div>
	</div>
	<div class="row">
	<?php use App\Blog;?>
	@foreach($users as $user)
	<?php $blog = Blog::where('user_id', $user->id)->first();?>
	<div class="col-sm-4">

		<div class="media">
  <div class="media-left">
    <a href="{{ URL('blog/'.$user->id.'/home') }}">
    @if($blog->icon == null)
		<img src="{{asset('assets/images/website/default_user.jpg')}}" alt="" class="media-object">
		@else
		<img src="{{asset('assets/images/icon/'.$blog->icon)}}" alt="" class="media-object">
		@endif
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading">{{$blog->name}}</h4>
    {{$blog->introduction}}
  </div>
</div>
	</div>
	@endforeach
	</div>
	<div class="row text-center">
		{!! $users->render() !!}
	</div>
</div>


@endsection