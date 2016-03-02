
@extends('navbar')

@section('title')
个人博客
@endsection

@section('extra-link')
<link rel="stylesheet" href="{{ asset('assets/website/subpage.css') }}">
@endsection

@section('content')

        <div style='height:20px;'></div>
        @foreach($users as $user)
		<div class="username" style='height:50px;background-color:white;width:80%;margin-left:25%;margin-bottom:3%; border-left: 5px solid #003262;'><h3  style='padding:10px;margin:5px;'><span><b>姓名：</b></span><span><b><a style="text-decoration: none;" href="{{URL('/blog/'.$user->id.'/home')}}">{{$user->name}}</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></span><span style='width:20px;'></span><span><b>邮箱：</b></span><span><b>{{$user->email}}</b></span></h3>
			</div>
		@endforeach


@endsection