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

        
        <div class="selection-btn text-center">
          <a href="/blog/{{$data['user']['id']}}/home">
            <h4 class="container-fluid">
              <div class="col-xs-4 text-right">
                <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
              </div>
              <div class="col-xs-8"> <strong>主页</strong>
              </div>
            </h4>
          </a>
        </div>
        <div class="selection-btn text-center">
          <a href="/blog/{{$data['user']['id']}}/home/articles">
            <h4 class="container-fluid">
              <div class="col-xs-4 text-right">
                <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
              </div>
              <div class="col-xs-8">
                <strong>文章列表</strong>
              </div>
            </h4>
          </a>
        </div>
        <div class="selection-btn text-center">
          <a href="{{URL('/blog/'.$data['user']['id'].'/home/download')}}">
            <h4 class="container-fluid">
              <div class="col-xs-4 text-right">
                <span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span>
              </div>
              <div class="col-xs-8">
                <strong>下载中心</strong>
              </div>
            </h4>
          </a>
        </div>
      </div>
    </td>
    <td class="col-sm-9">
      <div class="blog-block-light" style="box-shadow: 0 0 4px #777; padding-left: 15px; margin-bottom: 20px;">
        <h4>
          <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>
          &nbsp;下载中心
        </h4>
      </div>
      <div class="blog-block-article">

        <form method="GET" action="{{url('blog/'.$data['id'].'/home/download/file/zip')}}" name="fileform" class="list-group">
          <input type="hidden" name="id" value="{{$data['id']}}">
          @if(count($data['files'])>0)
            @foreach($data['files'] as $file)
          <div class="checkbox" style="padding: 5px 20px">
            <label>
              <input name='file[]' type="checkbox" value="{{$file->
              new_name}}" type="checkbox" id="blankCheckbox" aria-label="...">
              <a href="{{url('blog/'.$data['id'].'/home/download/'.$file->
                new_name)}}">{{basename($file->original_name,'.'.substr(strrchr($file->original_name, '.'), 1)) }}
              </a>
            </label>
          </div>
          @endforeach
          @endif
          <div class="stayaway" style="padding: 10px 20px 10px;">
            <input class="btn btn-default" name="submit" type="submit" value="下载"></div>

        </div>
      </form>

    </td>

  </tr>
</table>
@endsection