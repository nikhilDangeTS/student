<html>
<head>
	<title>Student</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, intitial-scale=1">

    <link rel="stylesheet" href="<?php echo asset('css/style.css'); ?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo asset('css/dataTables.bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo asset('css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo asset('css/mdb.min.css'); ?>">
    
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
         <main>
            <div class="container mt-4">
              <!--Navbar -->
              <nav class="mb-4 navbar navbar-expand-lg navbar-dark cyan">
                <a class="navbar-brand font-bold" href="#">Student Details</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item {{ Request::path() == '/' ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ url('/') }}"><i class="fa fa-home"></i> Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item {{ Request::path() == 'view' ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ url('/view') }}"><i class="fa fa-database" aria-hidden="true"></i> View Details</a>
                                </li>
                                <li class="nav-item {{ Request::path() == 'logout' ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ url('/logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <!--/.Navbar -->                   
            </main>
    <hr>
    <section class="home">
        @yield('content')
    </section>

<!-- Jquery needed -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="<?php echo asset('js/scripts.js'); ?>"></script>
    <script src="<?php echo asset('js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo asset('js/dataTables.bootstrap.min.js'); ?>"></script>
    <script src="<?php echo asset('js/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?php echo asset('js/mdb.min.js'); ?>"></script>

<script>
  $(document).ready(function() {
    $('#table').DataTable({
      "paging":   true,
      "ordering": true,
      "info":     false,
      stateSave: true
    });
  });

  $(".table").on("click", function(){
  $('#table').DataTable().state.clear();
});
</script>
<script type="text/javascript">
var base_url = '<?php echo url('/'); ?>';
console.log(base_url);

$('table').on('click', '.view_data', function()
{
  var id = $(this).attr("data-id");

  $.ajax({
    url: base_url+"http://local.student.com/resources/views/student/view/"+id,
    method:'GET',
    dataType:'JSON',
    /*data:{ id:id },*/
    success:function(data)
    {
      console.log();
      $('#id').html(data.id);
      $('#first_name').html(data.first_name);
      $('#last_name').html(data.last_name);
      $('#ca').html(data.created_at);
      $('#ua').html(data.updated_at);

      $('#view_detail').html(data);
      $('#PrimaryModalalert').modal("show");

     /* if(data.success)
      {
        $('#id').html(data.data.id);
        $('#first_name').html(data.first_name);
        $('#last_name').html(data.last_name);
        $('#ca').html(data.data.created_at);
        $('#ua').html(data.data.updated_at);
        
        $('#change_detail').html(data);
        $('#PrimaryModalalert').modal("show");
      }*/
    }
  });
});

/*$('table').on('click', '.view_data', function()
{
  $('#PrimaryModalalert').modal('show');
  $('#id').text($(this).data('id'));
  $('#first_name').text($(this).data('first_name'));
  $('#last_name').text($(this).data('last_name'));
  $('#ca').text($(this).data('created_at'));
  $('#ua').text($(this).data('updated_at'));
});*/
</script>

<script type="text/javascript">
$(document).on('click','show-modal',function(){
  $('#show').modal('show');
  $('.modal-title').text('Show Post');
});

$(document).ready(function()
  {
    $(document).on('click', "#edit-item", function()
    {
      $(this).addClass('edit-item-trigger-clicked');
      var options = {'backdrop': 'static'};
      $('#edit-modal').modal(options)
    })

  // on modal show
  $('#edit-modal').on('show.bs.modal', function()
  {
    var el = $(".edit-item-trigger-clicked");
    var row = el.closest(".data-row");
    // get the data
    var id = el.data('item-id');
    var name = row.children(".name").text();
    var description = row.children(".description").text();
    // fill the data in the input fields
    $("#modal-input-id").val(id);
    $("#modal-input-name").val(name);
    $("#modal-input-description").val(description);
  })

  // on modal hide
  $('#edit-modal').on('hide.bs.modal', function()
  {
    $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
    $("#edit-form").trigger("reset");
  })
})
</script>
<script type="text/javascript">
setTimeout(function(){
    $('.alert').hide()
}, 3000)
 </script>
 
 <script type="text/javascript">
 $('table').on('click', '.change_data', function(){
  var id = $(this).attr("id");
  var token = $("input[name='_token']").val();

  //alert(id);
  //alert(token);
  console.log("OK1");

  $.ajax({
    url:"/ajax/updateDetails",
    method:"POST",
    data:{'_token':token,'id':id},
    success:function(data){
        console.log("OK2");
      $('#change_detail').html(data);
      $('#PrimaryModalalert').modal("show");
    }
  });
});
</script>
	</body>
</html>