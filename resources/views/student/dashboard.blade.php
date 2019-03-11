@extends('nav')

@section('content')
<center>
	<h1>Welcome, <b>{{ Auth::user()->name }}</b></h1><br>

<footer>
	<p>Last Sign in at {{ auth()->user()->update_sign_in }}</p>
</footer>

</center>
@endsection