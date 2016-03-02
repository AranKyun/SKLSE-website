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
          <img src="/assets/images/icon/{{$data['blog']['icon']}}" class="img-circle center-block" style="width:200px;height:200px">
          <h3 class="text-center"> <strong>{{$data['user']['name']}}</strong>
          </h3>
        </div>
        <div class="blog-block-line">
          <div class="info text-center">
            <p>性别：{{$data['blog']['sex']}}</p>
            <p>邮箱：{{$data['user']['email']}}</p>
            <p>
              {{$data['blog']['introduction']}}
            </p>
          </div>

          <div class="alert alert-danger" role="alert" style='background-color: #f9f9f9;margin-top: 0px;border-bottom: 1px solid #ddd;border-top:1px solid #ddd;'>
            <a href="/blog/{{$data['user']['id']}}/home">
              <ul>
                <span class="glyphicon glyphicon-home" aria-hidden="true">&nbsp;&nbsp;&nbsp;</span> <font style="font-family:微软雅黑; font-size:16px"><b>主页</b></font> 

              </ul>
            </a>
          </div>
          <div class="alert alert-danger" role="alert" style='background-color: #f9f9f9;margin-top: 0px;border-bottom: 1px solid #ddd;border-top:1px solid #ddd;'>
            <a href="/blog/{{$data['user']['id']}}/articles">
              <ul>
                <span class="glyphicon glyphicon-tasks" aria-hidden="true">&nbsp;&nbsp;&nbsp;</span> <font style="font-family:微软雅黑; font-size:16px"><strong>文章列表</strong></font> 

              </ul>
            </a>
          </div>

          <div class="alert alert-danger" role="alert" style='background-color: #f9f9f9;margin-top: 0px;border-bottom: 1px solid #ddd;border-top:1px solid #ddd;'>

            <a href="{{URL('/blog/'.$data['user']['id'].'/home/download')}}">
              <ul>
                <span class="glyphicon glyphicon-arrow-down" aria-hidden="true">&nbsp;&nbsp;&nbsp;</span>
                <font style="font-family:微软雅黑; font-size:16px">
                  <strong>下载中心</strong>
                </font>

              </ul>
            </a>
          </div>
        </div>
      </td>

          <td class="col-sm-9">
      <div class="blog-block-light" style="box-shadow: 0 0 4px #777">
        <h4> ●          欢迎</h4>
      </div>

      <div class="article_page">
      <div style='height:60%'>{!! str_replace("_public_path/", asset(""), $data['article']->content); !!}
      </div>
  @if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
      <div class="input-group" style='width:50%;'>
         <span class="input-group-addon" id="basic-addon1">评论</span>
                <input type="text" class="form-control" placeholder="写点什么吧" aria-describedby="basic-addon1">
              </div>
               @foreach ($data['article']->comments as $comment)
               <div>
                  <ul>
                    <li>
                      <a href="#">{{ $comment->username }}</a>   {{ $comment->created_at }}
                    </li>{{ $comment->content }}
                  </ul>
               </div>
               @endforeach
               
      
</div>

    </td>

    </tr>
  </table>
@endsection