<html>
<head>
    <title>Details of {{ $task->first_name }} {{ $task->last_name }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, intitial-scale=1">
    <link rel="stylesheet" href="<?php echo asset('css/style.css'); ?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/css/mdb.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"> -->
    <style type="text/css">
    html
    {
      font-size: 0.91rem;
    }
    .btn {
      border-radius: 1px;
      font-size: 10px;
      color: ;
      margin: 0px;
    }
    .navbar {
        font-weight: 600;
        padding-right: 1rem!important;
    }
    table.table td, table.table th
    {
        padding-top: 0.1rem;
        padding-bottom: 1rem;
    }
    </style>
</head>
<body>

@if(count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
@if(\Session::has('success_msg'))
<div class="alert alert-success">
    <p>{{\Session::get('success_msg')}}</p>
</div>
@endif
<br/>

<center>
    <h3>Update Details of {{ $task->first_name }}</h3><br/>
    <form method="get" action="{{ route('student_update', $task->id) }}">
        {{csrf_field()}}
        <table class="table table-striped" style="width: 50%">
            <tr>
                <td>ID</td>
                <td><input type="text" name="id" value="{{ $task->id }}" class="form-control" readonly/></td>
            </tr>
            <tr>
                <td>First Name</td>
                <td><input type="text" name="first_name" value="{{ $task->first_name }}" class="form-control" placeholder="Enter First Name"/></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><input type="text" name="last_name" value="{{ $task->last_name }}" class="form-control" placeholder="Enter Last Name"/></td>
            </tr>
            <tr>
                <td><a href="{{ url('/view') }}" class="btn btn-info"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Back</a></td>
                <td><button type="submit" name="submit" class="btn btn-primary" value="Change"/><i class="fa fa-edit" aria-hidden="true"></i> Change</button></td>
            </tr>
        </table>
    </form>
</center>

<script type="text/javascript">
setTimeout(function(){
    $('.alert').hide()
}, 3000)
 </script>

</body>
</html>