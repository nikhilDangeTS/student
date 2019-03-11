<html>
<head>
  <title>View</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />

</head>
<body>

@if(count($errors) > 0)
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
      <p>{{$error}}</p>
    @endforeach
</div>
@endif
@if(\Session::has('success'))
<div class="alert alert-success">
  <p>{{\Session::get('success')}}</p>
</div>
@endif
<br/>

<button type="button" class="btn btn-success" id="edit-item" data-item-id="1" style="position: absolute; right: 0;"><i class="fas fa-plus-circle"></i> Add Student</button>
<br/>
  <!-- <p style="text-align:center;">Student Info</p> -->
  <table class="table table-striped table-bordered" id="table" style="width: %">
    <thead>
      <tr>
        <td class="text-center">Sr. No.</td>
        <td class="text-center">Name</td>
        <td class="text-center">Created At</td>
        <td class="text-center">Action</td>
      </tr>
    </thead>
    <?php $i=0 ?>
    @foreach ($tasks as $task)
    <?php $i++ ?>
    <tr>      
      <td style="width: 10%; text-align: center;">
        {{ $i }}
      </td>
      <td>
        <p>{{ $task -> first_name }}</p>
      </td>
      <td>
        <p>{{ $task -> created_at }}</p>
      </td>
      <td style="text-align: center;">
        <table class="">
          <tr>
            <td>
              <!-- <a href="{{ route('student_details', $task->id) }}" class="btn btn-info"><i class="fa fa-eye"></i> Details</a> -->
              <!-- <a href="#" class="show-modal btn btn-info btn-sm" data-id="{{$task->id}}" data-title="{{$task->first_name}}" data-body="{{$task->last_name}}">
                <i class="fa fa-eye"></i> View
              </a> -->
              <!-- <button data-id="{{ $task -> id }}" class="btn btn-block btn-info" onClick="open_container2(this);" ><i class="fa fa-fw fa-eye"></i> View </button> -->
              
              <button type="button" data-id="{{ $task->id }}" data-first_name="{{ $task->first_name }}" data-last_name="{{ $task->last_name }}" data-created_at="{{ $task->created_at }}" data-updated_at="{{ $task->updated_at }}" class="btn btn-info view_data" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-center" style='line-height: 16px;font-size: 12px;'><i class="fas fa-eye"></i> View</button>

            </td>
            <td>
              <button type="button" class="btn btn-success"> <i class="fas fa-user-edit"></i> Update</button>
            </td>
            <td>
              <form method="POST" action="{{ route('student_view', [$task->id]) }}">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <button type="submit" class="btn btn-danger" onclick="return confirm('You want to delete?');"><i class="fas fa-trash-alt"></i> Delete</button>
              </form>
            </td>
          </tr>
        </table>
        
        <!-- <input type="button" value="Delete" class="btn btn-danger"> -->
      </td>     
    </tr>
    @endforeach
  </table>

<!-- Attachment Modal -->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit-modal-label">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="attachment-body-content">
        <form method="POST" action="{{ route('student_store') }}">
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
  </div>
</div>

<!-- /Attachment Modal -->
<div class="modal fade bs-example-modal-center" id="PrimaryModalalert" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body" id="view_detail">
              <table class="table table-striped">
                <tr>
                  <td>ID :</td>
                  <td><b id="id"/></td>
                </tr>
                <tr>
                  <td>First Name :</td>
                  <td><b id="first_name"/></td>
                </tr>
                <tr>
                  <td>Last Name :</td>
                  <td><b id="last_name"/></td>
                </tr>
                <tr>
                  <td>Created At :</td>
                  <td><b id="ca"/></td>
                </tr>
                <tr>
                  <td>Updated At :</td>
                  <td><b id="ua"></td>
                </tr>
              </table>
            </div>
        </div>
    </div>
    <!-- /.modal-dialog -->
</div>


<script src="<?php echo asset('js/jquery.min.js'); ?>"></script>
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

<script>
  $(document).ready(function() {
    $('#table').DataTable();
} );
</script>
<script type="text/javascript">
var base_url = '<?php echo url('/'); ?>';
console.log(base_url);

$('table').on('click', '.view_data', function()
{
  var id = $(this).attr("data-id");

  $.ajax({
    url: base_url+"http://local.student.com/resources/views//student/view/"+id,
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

</body>
</html>