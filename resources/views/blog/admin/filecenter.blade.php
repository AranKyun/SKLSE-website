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
          <p>{{$data['blog']['introduction']}}</p>
        </div>
        <div class="alert alert-danger" role="alert" style='background-color: #f9f9f9;margin-top: 0px;border-bottom: 1px solid #ddd;border-top:1px solid #ddd;'>
          <a href="{{URL('/blog/'.$data['user']['id'].'/admin')}}">
            <ul>
              <span class="glyphicon glyphicon-home" aria-hidden="true">&nbsp;&nbsp;&nbsp;</span> <font style="font-family:微软雅黑; font-size:16px"><b>主页</b></font> 

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
      <div class="blog-block-light" style="box-shadow: 0 0 4px #777; padding-left: 15px; margin-bottom: 20px;">
        <h4>
          <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>
          &nbsp;个人设置
        </h4>
      </div>
      <div class="blog-block-article">

        <form action="{{URL('blog/'.$data['user']['id'].'/admin/uploads')}}" method="POST" enctype="multipart/form-data" name="fileform" class="list-group">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="user_id" value="{{ $data['user']['id'] }}">
          <input type="file" name="myfile" />
          <div class="stayaway" style="padding: 10px 20px 10px;">
            <input class="btn btn-default" name="submit" type="submit" value="上传"></div>

        </div>
      </form>
      @if(count($data['files'])>0)
      @foreach($data['files'] as $file)
      <li>
        {{basename($file->original_name,'.'.substr(strrchr($file->original_name, '.'), 1)) }}
      </li>

      <form action="{{ URL('blog/'.$data['user']['id'].'/admin/uploads/'.$file->
        id) }}" method="POST" name="deleteform">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="submit" name="submit" value="删除"></form>
      <br>
      @endforeach
    @endif
    </td>

  </tr>
</table>
@endsection