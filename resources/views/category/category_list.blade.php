@extends("backend_master")

@section('content')
<main class="app-content">
      <div class="app-title">
    <div>
        <h1> <i class="icofont-list"></i> Categories </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <a href="category/create" class="btn btn-outline-primary">
            <i class="icofont-plus">Add New</i>       
        </a>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered dataTable" id="sampleTable">
                        <thead>
                            <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                      	@foreach($categories as $row)
                      	<tr>
                      	<td></td>
                      	<td>{{$row->name}}</td>
                      	<td>
                      		<a href="{{route('category.edit',$row->id)}}" class="btn btn-warning">Edit</a>
                      		<a href="{{route('category.show',$row->id)}}" class="btn btn-success">Show</a>
                          <form method="post" action="{{route('category.destroy',$row->id)}}" class="d-inline-block" onsubmit="return confirm('Are you Sure to Delete?')">
                            @csrf
                            @method('DELETE')
                            <input type="submit" name="btnsubmit" value="Delete" class="btn btn-danger">
                          </form>
                        </td>
                        </tr>
                          @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div> 

    </main>

@endsection


@section('script')
  <script type="text/javascript" src="{{asset('backend_asset/js/plugins/jquery.dataTables.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('backend_asset/js/plugins/dataTables.bootstrap.min.js')}}"></script>
  <script type="text/javascript">
    $('.dataTable').DataTable();
  </script>
@endsection