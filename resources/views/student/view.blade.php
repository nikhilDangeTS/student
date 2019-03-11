@extends('nav')

@section('content')

@if(count($errors) > 0)
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
      <p>{{$error}}</p>
    @endforeach
</div>
@endif
@if(\Session::has('succes_add'))
<div class="alert alert-success">
  <p>{{\Session::get('succes_add')}}</p>
</div>
@endif
@if(\Session::has('success_update'))
<div class="alert alert-success">
  <p>{{\Session::get('success_update')}}</p>
</div>
@endif

<button type="button" class="btn btn-success btn-lg" id="edit-item" data-item-id="1" style="position: absolute; right: 0; font-size: .7rem;"><i class="fas fa-plus-circle"></i> Add Student</button>
<br/>
  <!-- <p style="text-align:center;">Student Info</p> -->
  <table class="table table-striped table-bordered" id="table" style="width: %">
    <thead>
      <tr>
        <th class="text-center">Sr. No.</th>
        <th class="text-center">ID</th>
        <th class="text-center">First Name</th>
        <th class="text-center">Last Name</th>
        <th class="text-center">Created At</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    <?php $i=0; ?>
    @foreach ($tasks as $task)
    <?php $i++ ?>
    <tr>      
      <td style="width: 10%; text-align: center;">
        {{ $i }}
      </td>
      <td>
        <p>{{ $task -> id }}</p>
      </td>
      <td>
        <p>{{ $task -> first_name }}</p>
      </td>
      <td>
        <p>{{ $task -> last_name }}</p>
      </td>
      <td>
        <p>{{ $task -> created_at }}</p>
      </td>
      <td>
        <center>
          <table style="text-decoration: none; color: inherit; font-weight: 500;">
            <tr>
              <td>
                <a href="{{ route('student_details', $task->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Details</a>
              </td>

              <td>
                <!-- <a href="{{ route('student_edit', $task->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-user-edit"></i> Update</a> -->
                <button type="button" id="{{ $task -> id }}" class="btn btn-primary btn-sm change_data" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-center" style='line-height: 16px;font-size: 12px;'>
                  <i class="fas fa-user-edit"></i>{{ csrf_field() }} Change
                </button>
              </td>

              <td>
                <form method="POST" action="{{ route('student_view', [$task->id]) }}">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('You want to delete?');"><i class="fas fa-trash-alt"></i> Delete</button>
                </form>
              </td>
            </tr>
          </table>
          </center>
        
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
        <h5 class="modal-title" id="edit-modal-label"><b>Add Student Detail</b></h5>
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
            <button type="submit" name="" class="btn btn-primary"/>
              <i class="fa fa-plus-square" aria-hidden="true"></i> Save
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade bs-example-modal-center" id="PrimaryModalalert" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
              <br>
              <h5 class="modal-title" id="edit-modal-label"><b>Update Detail</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body" id="change_detail">
            </div>
        </div>
    </div>
</div>

<!-- /Attachment Modal -->
<!-- <div class="modal fade bs-example-modal-center" id="PrimaryModalalert" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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
     /.modal-dialog 
</div> -->

@endsection