@extends('layouts.blog')
@section('title')
{{$data['user']['name']}}的博客
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
          <p>个人简介：{{$data['blog']['introduction']}}</p>
        </div>

        <div class="alert alert-danger" role="alert" style='background-color: #f9f9f9;margin-top: 0px;border-bottom: 1px solid #ddd;border-top:1px solid #ddd;'>
          <a href="{{URL('/blog/'.$data['user']['id'].'/admin')}}">
            <ul>
              <span class="glyphicon glyphicon-home" aria-hidden="true">&nbsp;&nbsp;&nbsp;</span> <font style="font-family:微软雅黑; font-size:16px"><strong>主页</strong></font> 

            </ul>
          </a>
        </div>
        <div class="alert alert-danger" role="alert" style='background-color: #f9f9f9;margin-top: 0px;border-bottom: 1px solid #ddd;border-top:1px solid #ddd;'>
          <a href="{{URL('/blog/'.$data['user']['id'].'/admin/list')}}">
            <ul>
              <span class="glyphicon glyphicon-tasks" aria-hidden="true">&nbsp;&nbsp;&nbsp;</span> <font style="font-family:微软雅黑; font-size:16px"><strong>文章列表</strong></font> 

            </ul>
          </a>
        </div>

        <div class="alert alert-danger" role="alert" style='background-color: #f9f9f9;margin-top: 0px;border-bottom: 1px solid #ddd;border-top:1px solid #ddd;'>

          <a href="{{URL('/blog/'.$data['user']['id'].'/admin/uploads')}}">
            <ul>
              <span class="glyphicon glyphicon-arrow-up" aria-hidden="true">&nbsp;&nbsp;&nbsp;</span>
              <font style="font-family:微软雅黑; font-size:16px">
                <strong>上传中心</strong>
              </font>

            </ul>
          </a>
        </div>
        <div class="alert alert-danger" role="alert" style='background-color: #f9f9f9;margin-top: 0px;border-bottom: 1px solid #ddd;border-top:1px solid #ddd;'>

          <a href="{{URL('/blog/'.$data['user']['id'].'/admin/set')}}">
            <ul>
              <span class="glyphicon glyphicon-cog" aria-hidden="true">&nbsp;&nbsp;&nbsp;</span>
              <font style="font-family:微软雅黑; font-size:16px">
                <strong>个人设置</strong>
              </font>

            </ul>
          </a>
        </div>
      </div>
    </td>
    <td class="col-sm-9">
      <form method="POST" action="{{URL('blog/'.$data['user']->
        id.'/admin/set/store')}}" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="name" value="{{ $data['blog']->
        name }}">
        <input type="hidden" name="user_id" value="{{ $data['blog']->
        user_id }}">
        <input type="hidden" name="old_icon" value="{{ $data['blog']->
        icon }}">
        <div class="blog-block-article">
          <div class="form-group" style="padding: 10px 20px;">
            <label for="exampleInputFile" >更换头像</label>
            <input type="file" name="icon" id="exampleInputFile"></div>
          <div style="font-weight: bold; padding: 1px 20px;">
            <p>性别</p>
            @if($data['blog']->sex=='')
            <label class="radio-inline">
              <input type="radio" name="sex" id="inlineRadio1" value="male">男</label>
            <label class="radio-inline">
              <input type="radio" name="sex" id="inlineRadio2" value="female">女</label>
            <label class="radio-inline">
              <input type="radio" name="sex" id="inlineRadio3" value="" checked="checked">保密</label>
            @elseif($data['blog']->sex=='male')
            <label class="radio-inline">
              <input type="radio" name="sex" id="inlineRadio1" value="male" checked="checked">男</label>
            <label class="radio-inline">
              <input type="radio" name="sex" id="inlineRadio2" value="female">女</label>
            <label class="radio-inline">
              <input type="radio" name="sex" id="inlineRadio3" value="">保密</label>
            @else
            <label class="radio-inline">
              <input type="radio" name="sex" id="inlineRadio1" value="male">男</label>
            <label class="radio-inline">
              <input type="radio" name="sex" id="inlineRadio2" value="female" checked="checked">女</label>
            <label class="radio-inline">
              <input type="radio" name="sex" id="inlineRadio3" value="">保密</label>
            @endif
          </div>
          <div style="font-weight: bold; padding: 15px 20px;">
            <p>自我介绍</p>
            @if($data['blog']->introduction=='')
            <textarea name='introduction' class="form-control" rows="3" >暂无简介</textarea>
            @else
            <textarea name='introduction' class="form-control" rows="3" >{{$data['blog']->introduction}}</textarea>
            @endif
          </div>

          <div style="padding: 15px 20px 20px;">
            <input class="btn btn-default" name="submit" type="submit" value="保存修改"></div>
        </div>
      </form>
    </td>
  </tr>
</table>
@endsection