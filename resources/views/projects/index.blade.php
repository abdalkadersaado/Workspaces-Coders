@extends('layouts.app')


@section('content')
	<div class="card" style="background-image: url('/imgs/image2.jpg'); margin:-50px">
		
		@foreach($workspaces as $workspace)

		<div class="card m-5 p-4">
			<div class="card-header">
				<div class="text-right" id="project-author">
					Created By 
					<span class="fa fa-user-circle"></span> 
					{{$workspace->author->name}}
				</div>
	
				<h2><a href="{{route('workspace.show',['user'=> $workspace->author->username, 'workspace' => $workspace->id])}}">{{$workspace->title}}</a> 
				</h2>
				<span class="pull-right"><span class="fa fa-eye"></span> {{$workspace->views}}</span>
			</div>
			<div class="card-body">
				<p>{{$workspace->description}}</p>
			</div>
	
		</div>
	
		@endforeach
	</div>

@endsection

@section('scripts')
<script>
	@if(session('flash'))

		window.alertify.success("{{session('flash')}}"); 


	@endif
</script>
@endsection