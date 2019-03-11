<form method="get" id="updateForm" action="{{route('student_update', $task->id) }}">
  <div class="row">
    {{csrf_field()}}
    <table class="table table-striped" style="width: ;">
      <tr>
        <td>ID</td>
        <td>{{$task->id }}
          <input type="hidden" name="id" value="{{$task->id }}" class="form-control" readonly/>
        </td>
      </tr>
      <tr>
        <td>First Name</td>
        <td><input type="text" name="first_name" value="{{$task->first_name}}" class="form-control" placeholder="Enter First Name"/></td>
      </tr>
      <tr>
        <td>Last Name</td>
        <td><input type="text" name="last_name" value="{{$task->last_name}}" class="form-control" placeholder="Enter Last Name"/></td>
      </tr>
      <tr>
        <td>
          <!-- <a href="{{ url('/view') }}" class="btn btn-info"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Back</a> -->
        </td>
        <td>
          <a href="javascript:{}" class="btn btn-primary" onclick="document.getElementById('updateForm').submit();"><i class="fa fa-edit" aria-hidden="true"></i> Change</a>
        </td>
      </tr>
    </table>
  </div>
</form>