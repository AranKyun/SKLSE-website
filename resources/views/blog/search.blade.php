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
      <div class="blog-block-light" style="box-shadow: 0 0 4px #777; padding-left: 15px;">
        <h4>
          <span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>
          &nbsp;搜索结果
        </h4>
      </div>
      @if(count($articles)>0)
        @foreach($articles as $article)
      <div class="blog-block-article">
        <div class="bbtittle">
          <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
          &nbsp;{{$article->title}}
        </div>
        <div class="bbsubtittle">{{$article->created_at}}</div>
        <div class="bbabstract">此处应有文章简介，然而还没有实现</div>
        <hr class="smaller">
        <a href="{{url('/blog/'.$id.'/home/'.$article->id)}}" class="aticlemore">点击查看更多>></a>
      </div>
      @endforeach
        @else
      <div class="bbtittle">
        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
        &nbsp;暂无相关博文
      </div>
      @endif
    </td>
  </tr>
</table>
@endsection