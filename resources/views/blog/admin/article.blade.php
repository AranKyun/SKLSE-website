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
          <p>性别：{{$data['blog']['sex']}}</p>
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
          <a href="{{URL('/blog/'.$data['user']['id'].'/admin/list')}}">
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
      <div class="blog-block-light" style="box-shadow: 0 0 4px #777; padding-left: 15px;">
        <h4>
          <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
          &nbsp;文章正文
        </h4>
      </div>

      <div class="blog-block-article">
        <div class="bbtittle">{{ $data['article']->title }}</div>
        <div class="bbsubtittle">{{ $data['article']->created_at }}</div>
        <div class="bbabstract">
          {!! str_replace("_public_path/", asset(""), $data['article']->content); !!}
        </div>
      </div>
      @if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Whoops!</strong>
        There were some problems with your input.
        <br>
        <br>
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

    @foreach ($data['article']->comments as $comment)
      <div class="blog-block-article" style="padding: 10px 20px">

        <p style="font-size: 15px; color: #233;">{{ $comment->username }}</p>
        <p style="color: #999; font-size: 10px; padding-top: 0px;">{{ $comment->created_at }}</p>
        <p style="padding-right: 30px; font-size: 17px;">{{ $comment->content }}</p>
      </div>
      @endforeach
      <form method="POST" action="{{URL('blog/'.$data['user']['id'].'/home/'.$data['article']['id'].'/comment')}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="article_id" value="{{ $data['article']->
        id }}">
        <div class="blog-block-article">
          <div class="bbtittle">
            <span  class="glyphicon glyphicon-comment" aria-hidden="true"></span>
            &nbsp;评论
          </div>
          <div class="stayaway" style="padding: 5px 20px 5px 20px;">
            <textarea name="content" class="form-control" rows="3"></textarea>
          </div>
          <div class="stayaway" style="padding: 10px 20px 10px;">
            <input class="btn btn-default" type="submit" value="提交评论"></div>
        </div>
      </form>
    </td>

  </tr>
</table>
@endsection