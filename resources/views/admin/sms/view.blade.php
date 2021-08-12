@extends('layouts.admin-master')

@section('title')
{{__('Bulk-Sms')}} | {{__('Admin| VIEW SMS')}}
@endsection

@section('page-name')
{{__('Admin | VIEW SMS ')}}
@endsection

@section('main-content')
   <!-- Content Wrapper. Contains page content -->
   
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-12">
          <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">View Sms </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-hover dataTable table">
                    <thead class="thead-light">
                        <tr>
                            <th>Title </th>
                            <th>Created At </th>
                            <th>Updated At </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                         <td>
                       <div class="btn-group mx-1">

                           <!-- view a particular group -->
                           <a href="#" data-id="" data-url="#" data-toggle="modal" data-target="#" class="mx-1">
                                <i class="fas fa-eye text-secondary"></i></a>

                            <!-- edit a particular group -->
                               <a href="#" data-id="" data-url="#" data-toggle="modal" data-target="#" class="mx-1">
                                <i class="fas fa-edit text-secondary"></i></a>

                                  <!-- delete the sms -->
               <a href="#" data-id="" data-url="#" data-toggle="modal" data-target="#" class="text-danger mr-1 deleteBtn">
                   <i class="fas fa-trash-alt "></i></a>
                              </div>
                       </td>
                        </tr>

                        <!-- Edit group modal -->

<div class="modal fade edit-layout-modal" id="" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered " role="document">
      <div class="modal-content p-1">
          <div class="modal-header">
              <h4 class="modal-title" ><i class="fas fa-pen"></i> {{ __('Edit Group') }}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body p-4">
              <!-- class="dropsms" -->
              <form  method="POST" action="#" enctype="multipart/form-data">
              {{ csrf_field() }}
              {{ method_field('PATCH') }}
                <div class="form-group row">
                    <div class="col-md-12 col-xs-12">
                        <label for="title">{{__('Title')}}</label>
                        <input class="form-control" type="text"  name="title" required="required" placeholder="{{__('Title')}}" autofocus>
                      </div>
                      <div class="col-md-12 col-xs-12">
                        <label for="body">{{__('Sms Body')}}</label>
                        <input class="form-control" type="text"   name="title" required="required" placeholder="{{__('Sms Content')}}" autofocus>
                      </div>
     
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-light" data-dismiss="modal">{{ __('Close') }}</button>
              <button  type="submit" class="btn btn-secondary" ><i class="fas fa-pen"></i> {{ __('Update') }}</button>
          </form>
          </div>
      </div>
  </div>
</div>
<!-- end edit Sms modal -->



<!-- Delete Sms modal -->
<div class="modal fade edit-layout-modal" id="" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content p-1">
            <div class="modal-header">
                <h4 class="modal-title" ><i class="fas fa-trash"></i> {{ __('Delete:') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <!-- class="dropsms" -->
                <form  method="POST" action="#" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                  <div class="form-group row">
                      <div class="col-md-12 col-xs-12">
                          <label for="group_name">{{__('Are you sure?')}}</label>
                      </div>
                  </div>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">{{ __('Close') }}</button>
                <button  type="submit" class="btn btn-secondary" ><i class="fas fa-trash"></i> {{ __('Yes, Proceed') }}</button>
            </form>
            </div>
        </div>
    </div>
</div>
<!-- end delete sms modal -->

                    </tbody>
                    <tfoot class="tfoot-light">
                    <tr>
                    
                            <th>Title </th>
                            <th>Created At </th>
                            <th>Updated At </th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
              </div>
          </div>
          

           
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
  <script>
    $(document).ready(function() {
    $('#demotable').DataTable( {
        
        language: {
            url: '/dataTables/{{app()->getLocale()}}.json'
        },
            responsive: true,
            dom: 'Bfrtip',
         buttons: [
            {
                extend:    'copyHtml5',
                // text:      '<i class="fa fa-files-o"></i>',
                titleAttr: 'Copy',
                className: "btn btn-info"
            },
            {
                extend:    'excelHtml5',
                // text:      '<i class="fa fa-file-excel-o"></i>',
                titleAttr: 'Excel',
                className: "btn btn-warning"
            },
            {
                extend:    'csvHtml5',
                // text:      '<i class="fa fa-file-text-o"></i>',
                titleAttr: 'CSV',
                className: "btn btn-info"
            },
            {
                extend:    'pdfHtml5',
                // text:      '<i class="fa fa-file-pdf-o"></i>',
                titleAttr: 'PDF',
                className: "btn btn-warning"
            }
        ]
    } );
    } );
</script>
@endsection
