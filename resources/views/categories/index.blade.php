@extends('admins.main')

@section('title', '| Category')

@section('content')
<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">

		Categories
		</h1>
		<ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="/admin">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-tasks"></i> Category
            </li>
        </ol>
		</h1>

	</div>
</div>
<!-- /.row -->
<div class="row">
	<div class="col-md-8">
		<table class="table table-hover">
			<thead>
				<tr>
					<td>#</td>
					<td>Name</td>
				</tr>
			</thead>
			<tbody>
			@foreach($categories as $category)
				<tr>
					<td>{{ $category->id }}</td>
					<td>{{ $category->name }}</td>
	
					<td><a href="{{ route('categories.edit', $category->id) }}" class="btn btn-default btn-sm">Edit</a>
					{!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'DELETE']) !!}
					{{ Form::submit('Delete', ['class' => 'btn btn-sm btn-default']) }}
					{{ Form::close() }}
					</td>
	
					<td><a href="{{ route('categories.show', $category->id) }}" class="btn btn-default btn-sm">View</a><a href="{{ route('categories.edit', $category->id) }}" class="btn btn-default btn-sm">Edit</a></td>
	
				</tr>
			@endforeach
			</tbody>
		</table>
	</div> <!-- end of md 8 !-->
	<div class="col-md-4">
		<div class="well">
			{!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
			<h2> Create Category </h2>
			 {{ Form::label('name', 'Name: ') }}
			 {{ Form::text('name', null, ['class' => 'form-control']) }}
			  
			 {{ Form::submit('Add Category', ['class' => 'btn btn-success btn-block btn-h1-spacing']) }}

			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection