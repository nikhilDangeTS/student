@extends('master')

@section('content')
<div class="row">
	<div class="col-md-12">
		<br/>
		<h3 align="center">Add Data</h3>
		<a href="{{ url('/') }}">View List</a>
		<br/>
		@if(count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif
		@if(\Session::has('success'))
		<div class="alert alert-success">
			<p>{{\Session::get('success')}}</p>
		</div>
		@endif
		<br/>
		<form method="POST" action="{{ route('student_store')}}">
			{{csrf_field()}}
			<div class="form-group">
				<input type="text" name="first_name" class="form-control" placeholder="Enter First Name"/>
			</div>
			<div class="form-group">
				<input type="text" name="last_name" class="form-control" placeholder="Enter Last Name"/>
			</div>
			<div class="form-group">
				<input type="submit" name="" class="btn btn-primary"/>
			</div>
		</form>
	</div>
</div>
@endsection