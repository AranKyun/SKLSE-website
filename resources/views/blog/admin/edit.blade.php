@extends('layouts.blog')
@section('title')
{{$data['user']['name']}}的博客
@endsection

@section('head')
<link rel="stylesheet" href="{{ asset('assets/summernote/summernote.css') }}" />
<script src="{{ asset('assets/summernote/summernote.js') }}"></script>
@endsection

@section('host')
{{$data['user']['name']}}
@endsection

@section('content')
<table class="container blog-table">
  <tr class=" blog-block-dark">
    <td class="col-sm-3" style='height:60%;'>
      <div class="blog-block-box" style="padding:30px;">
        @if($data['blog']->icon!='')
        <img src="/assets/images/icon/{{$data['blog']['icon']}}" class="img-circle center-block" style="width:200px;height:200px">
        @else
        <img src="/assets/images/website/default_user.jpg" class="img-circle center-block" style="width:200px;height:200px">
        @endif
        <h3 class="text-center"> <strong>{{$data['user']['name']}}</strong>
        </h3>
      </div>
      <div class="blog-block-line">
        <div class="info text-center">
          @if($data['blog']['sex']=='')
          <p>性别：保密</p>
          @else
          <p>性别：{{$data['blog']['sex']}}</p>
          @endif
          <p>邮箱：{{$data['user']['email']}}</p>
          <p>{{$data['blog']['introduction']}}</p>
        </div>
                <div class="selection-btn text-center">
          <a href="{{URL('/blog/'.$data['user']['id'].'/admin')}}">
            <h4 class="container-fluid">
              <div class="col-xs-4 text-right"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></div>
              <div class="col-xs-8"><strong>主页</strong></div>
            </h4>
          </a>
        </div>
        <div class="selection-btn text-center">
          <a href="{{URL('/blog/'.$data['user']['id'].'/admin')}}">
          <h4 class="container-fluid">
              <div class="col-xs-4 text-right"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span></div>
              <div class="col-xs-8"><strong>文章列表</strong></div>
            </h4>
          </a>
        </div>
        <div class="selection-btn text-center">
          <a href="{{URL('/blog/'.$data['user']['id'].'/admin/uploads')}}">
          <h4 class="container-fluid">
              <div class="col-xs-4 text-right"><span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span></div>
              <div class="col-xs-8"><strong>上传中心</strong></div>
            </h4>
          </a>
        </div>
        <div class="selection-btn text-center">
          <a href="{{URL('/blog/'.$data['user']['id'].'/admin/set')}}">
          <h4 class="container-fluid">
              <div class="col-xs-4 text-right"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></div>
              <div class="col-xs-8"><strong>个人设置</strong></div>
            </h4>
          </a>
        </div>
      </div>
    </td>

    <td class="col-sm-9">
      <form action="{{ URL('/blog/'.$data['id'].'/admin/'.$data['article']->
        id )}}" method="POST" >
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="user_id" value="{{ $data['id'] }}">
        <input type="text" name="title" value="{{ $data['article']->
        title }}">
        <div id="summernote">
          {!! str_replace("_public_path/", asset(""), $data['article']->content) !!}
        </div>
        <button id="submit">Submit</button>
        <input type="hidden" name="content" id="content"></form>
      <script>
    $(function(){
      $('#summernote').summernote();

      $('#submit').click(function(){
        $('#content').attr('value', $('#summernote').summernote('code'));
        $('#form').submit();
      });
    });
  </script>

    </td>

  </tr>
</table>
@endsection