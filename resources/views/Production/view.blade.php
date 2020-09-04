@extends('layouts.backend.app')
@push('css')
<link rel="stylesheet" href="{{ asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Inventry Product List</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Product Category List</h3>
        <span align-left>
          <a class="btn btn-action btn-primary float-right" href="{{route('product.create')}}" title="Create">Create</a>
        </span>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
          <div>
        <table id="example1" class="table table-bordered table-striped" style="width: 100%">
          <thead>
          <tr>
            <th>ID</th>
            <th>Category</th>
            <th>Action</th>
          </tr>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
    
   
</div>

            <!-- /.card -->
  @endsection
  @push('js')
  <script src="{{ asset('asset/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('asset/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      processing:true,
      responsive:true,
      pagingType:'full_numbers',
      stateSave:false,
      scrollY:true,
      scrollX:true,
      ajax:"{{ url('product/datatable') }}",
      columns:[
        {data:'id', name:'id'},
        {data:'type', name:'type'},
        {data:'action', name:'action', width:"100px"},

              ]
    });
  });
</script>
<script>
  function deleteData(dt){
    if (confirm("Confirm Delete")) {
      $.ajax({
        type:"DELETE",
        url:$(dt).data("url"),
        data:{
          "_token":"{{ csrf_token() }}"
        },
        success:function(response) {
          if(response.status){
            location.reload();
          }
        },
        error:function(response){
            console.log(response);
          }
        
      });
      
    }
    return false;
  }
</script>
@endpush

