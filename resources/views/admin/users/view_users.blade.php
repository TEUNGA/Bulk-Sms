@extends('layouts.admin-master')

@section('title')
{{__('SCHOOLY')}} | {{__('BOARD| VIEW NURSERY SCHOOLS')}}
@endsection

@section('page-name')
{{__('BOARD | VIEW NURSERY SCHOOLS ')}}
@endsection

@section('main-content')
   <!-- Content Wrapper. Contains page content -->
   
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
         <div class="col-md-12 col-sm-12">
            <div class="card card-info card-outline card-tabs">
              
              <div class="card-body">
                  <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-info">
             <div class="card-header">
                <h3 class="card-title">View Nursery Schools </h3>
                <div>
                <span class="float-right"> <a href="/admin/add_nursery_school" class="btn btn-secondary"><i
                            class="fas fa-plus"></i>
                        Add School  </a></span>
                </div>
               
</div>
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped" >
                    <thead >
                        <tr>
                            <th>Country</th>
                            <th>Region</th>
                            <th>Division</th>
                            <th>School Name</th>
                            <th>School Motto</th>
                            <th>P.O.Box</th>
                            <th>Section</th>
                            <th>Type</th>
                            <th>Creation Date</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                     <tr>
                         <td>a</td>
                         <td>a</td>
                         <td>a</td>
                         <td>a</td>
                         <td>a</td>
                         <td>a</td>
                         <td>a</td>
                         <td>a</td>
                         <td>a</td>
                         <td>a</td>
                         <td></td>
                     </tr>
                     
                    </tbody>
                    <tfoot>
                    <tr>
                    
                    <th>Country</th>
                            <th>Region</th>
                            <th>Division</th>
                            <th>School Name</th>
                            <th>School Motto</th>
                            <th>P.O.Box</th>
                            <th>Section</th>
                            <th>Type</th>
                            <th>Creation Date</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
                 
          </div>
         
               
              <!-- /.card -->
            </div>
          </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
      <!-- Main content -->
      
  <!-- /.card-body -->
          </div>
        </div>
      </div>
    
      </div>
      <!-- /.card -->
      </div></div>

        
    <!-- /.content -->
  </div>
  
  <!-- /.content-wrapper -->
@endsection

    @section('special-scripts')
    <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
      @endsection
