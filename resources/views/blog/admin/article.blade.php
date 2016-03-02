@extends('_layouts.default')

@section('content')

  <h1 style="text-align: center; margin-top: 50px;">{{ $data['article']->title }}</h1>
  <hr>
  <div id="date" style="text-align: right;">
    {{ $data['article']->updated_at }}
  </div>
  <div id="content" style="padding: 50px;">
    <p>
      {!! str_replace("_public_path/", asset(""), $data['article']->content); !!}
    </p>
  </div>
  <div id="comments" style="margin-bottom: 100px;">

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
    
    <div class="conmments" style="margin-top: 100px;">
      @foreach ($data['article']->comments as $comment)

        <div class="one" style="border-top: solid 20px #efefef; padding: 5px 20px;">
          <div class="username" data="{{ $comment->username }}">
            <h3>{{ $comment->username }}</h3>
            <h6>{{ $comment->created_at }}</h6>
          </div>
          <div class="content">
            <p style="padding: 20px;">
              {{ $comment->content }}
            </p>
          </div>
          <div class="reply" style="text-align: right; padding: 5px;">
            <a href="#new" onclick="reply(this);">回复</a>
          </div>
        </div>

      @endforeach
    </div>
  </div>


    <div id="new">
      <form action="{{ URL('blog/'.$data['id'].'/home/'.$data['article']->id.'/comment') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="article_id" value="{{ $data['article']->id }}">
        <div class="form-group">
          <label>Nickname</label>
          <input type="text" name="username" class="form-control" style="width: 300px;" required="required">
        </div>
        <div class="form-group">
          <label>Email address</label>
          <input type="email" name="email" class="form-control" style="width: 300px;">
        </div>
        <div class="form-group">
          <label>Content</label>
          <textarea name="content" id="newFormContent" class="form-control" rows="10" required="required"></textarea>
        </div>
        <button type="submit" class="btn btn-lg btn-success col-lg-12">Submit</button>
      </form>
    </div>

<script>
function reply(a) {
  var nickname = a.parentNode.parentNode.firstChild.nextSibling.getAttribute('data');
  var textArea = document.getElementById('newFormContent');
  textArea.innerHTML = '@'+nickname+' ';
}
</script>


