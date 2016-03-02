@extends('download')

@section('content')


<form method="GET" action="{{url('blog/'.$data['id'].'/home/download/file/zip')}}" name="fileform">
	<input type="hidden" name="id" value="{{$data['id']}}">

		@if(count($data['files'])>0)
			@foreach($data['files'] as $file)
				<input name='file[]' type="checkbox" value="{{$file->new_name}}" >
					<a href="{{url('blog/'.$data['id'].'/home/download/'.$file->new_name)}}">{{basename($file->original_name,'.'.substr(strrchr($file->original_name, '.'), 1)) }}</a>
				</input>
			<br>
			@endforeach
		@endif
	<input type="submit" value="下载" name="submit"></input>
</form>
	



@endsection
