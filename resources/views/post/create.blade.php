@extends('admins.main')

@section('title', '| Create new post')

@section('stylesheet')

<!-- added to overcome bootstrap load fail -->
<!-- Bootstrap Core CSS -->
<link href="../admins/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="../admins/css/sb-admin.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="../admins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	{!!	Html::style('css/parsley.css')	!!}
	{!!	Html::style('css/select2.min.css')	!!}

	<script src="http://cloud.tinymce.com/stable/tinymce.min.js?apiKey=j2pgd7w5h7sg6k7tqn7c5kvhy6pq44ikq4mt6yj1emaxdpb3"></script>
	<script>
		tinymce.init({
			selector: 'textarea',
			plugins: 'link code',
			menubar: false
		});
	</script>
@endsection

@section('content')
<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header" style="text-align: center;">
		Create New Post
		</h1>
	</div>
</div>
<!-- /.row -->
	<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<hr>
		{!! Form::open(['route' => 'posts.store','data-parsley-validate' => '', 'files' => true]) !!}
    		{{ Form::hidden('user_id', Auth::user()->id, array('class' => 'form-control','required' => '')) }}

    		{{ Form::label('title', 'Title: ') }}
    		{{ Form::text('title', null, array('class' => 'form-control','required' => '','maxlength' => '255')) }}
			{{ Form::label('slug', 'Slug:') }}
			{{ Form::text('slug', null, array('class' => 'form-control','required' => '','minlength' => '5','maxlength' => '255')) }}
			
			{{ Form::label('category_id', 'Category:', ['class' => 'form-spacing-top']) }}
			<select class="form-control" name="category_id">
				@foreach($categories as $category)
					<option value="{{ $category->id }}">{{ $category->name }}</option>
				@endforeach
			</select>

			{{ Form::label('tags', 'Tags:', ['class' => 'form-spacing-top']) }}
				<select class="form-control select2-multi" name="tags[]" multiple="multiple">
					@foreach($tags as $tag)
						<option value='{{ $tag->id }}'>{{ $tag->name }}</option>
					@endforeach

				</select>
			{{ Form::label('featured_image', 'Upload featured Image') }}
			{{ Form::file('featured_image') }}

    		{{	Form::label('body', "Post Body: ", ['class' => 'form-spacing-top'])	}}
    		{{	Form::textarea('body', null, array('class' => 'form-control'))	}}
    		
    		{{	Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block','style' => 'margin-top:20px'))	}}
		{!! Form::close() !!}
	</div>
	</div>
@endsection

@section('scripts')

<!-- jQuery -->
<script src="../admins/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../admins/js/bootstrap.min.js"></script>


	{!!	Html::script('js/parsley.min.js')	!!}
	{!!	Html::script('js/select2.min.js')	!!}

<script type="text/javascript">
	$(".select2-multi").select2({
	  tags: true
	})
</script>
@endsection
