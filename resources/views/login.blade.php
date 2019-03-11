@extends('header')

@section('content')
<html>
	<head>
		<title>Login</title>
	</head>

<body>

<center>
	<h2>Login</h2>
	<form method="POST" action="{{ route('login_student')}}">
		{{ csrf_field() }}
	<table class="table table-striped" style="width: 40%">
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
			<td><input type="submit" name="submit" value="Login" class="btn btn-primary">
				<input type="reset" name="reset" value="Clear" class="btn btn-primary"><br>
				<a href="{{ url('/registrations') }}" class="btn btn-success">Register</a>
			</td>
		</tr>
	</table>
	</form>
</center>

@if(\Session::has('login_error'))
<div class="alert alert-danger">
  <p>{{\Session::get('login_error')}}</p>
</div>
@endif

</body>
</html>
@endsection('content')