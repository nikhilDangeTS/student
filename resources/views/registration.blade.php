@extends('header')

@section('content')
<html>
	<head>
		<title>Registration</title>
	</head>

<body>

<center>
	<h2>Registration Form</h2>
	<form method="POST" action="{{ route('register_student')}}">

	<table class="table table-striped" style="width: 40%">
		<tr>
			<td><b>Name :</b></td>
			<input type="hidden" name="_token" value="{{ csrf_token() }}"> 
			<td><input type="text" name="user_name" class="form-control" placeholder="Enter Your Name" required></td>
		</tr>
		<tr>
			<td><b>Email ID :</b></td>
			<td><input type="email" name="email_id" class="form-control" placeholder="Enter Email ID" required></td>
		</tr>
		<tr>
			<td><b>Password :</b></td>
			<td><input type="password" name="user_password" class="form-control" placeholder="Enter Password" required></td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="submit" name="submit" value="Submit" class="btn btn-primary">
				<input type="reset" name="reset" value="Clear" class="btn btn-primary"><br>
				<a href="{{ url('/login') }}" class="btn btn-success">Login</a>
			</td>
		</tr>
	</table>
	</form>
</center>

<!-- @if(count($errors) > 0)
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
      <p>{{$error}}</p>
    @endforeach
</div>
@endif -->
@if(\Session::has('successs'))
<div class="alert alert-success">
  <p>{{\Session::get('successs')}}</p>
</div>
@endif

</body>
</html>
@endsection