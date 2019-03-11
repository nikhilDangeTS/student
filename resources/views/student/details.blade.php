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
    <center><h3>View Details of {{ $task->first_name }}</h3><br/>
        <table class="table table-striped" style="width: 60%;">
            <tr>
                <td><b>ID</b></td>
                <td>: {{ $task->id }}</td>
            </tr>
            <tr>
                <td><b>First Name</b></td>
                <td>: {{ $task->first_name }}</td>
            </tr>
            <tr>
                <td><b>Last Name</b></td>
                <td>: {{ $task->last_name }}</td>
            </tr>
            <tr>
                <td><b>Created On</b></td>
                <td>: {{ $task->created_at }}</td>
            </tr>
            <tr>
                <td><b>Updated On</b></td>
                <td>: {{ $task->updated_at }}</td>
            </tr>
            <tr>
                <td></td>
                <td><a href="{{ url('/view') }}" class="btn btn-info"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Back</a></td>
            </tr>
        </table>
    </center>
</body>
</html>