@extends('layouts.admin-master')

@section('title')
{{__('Bulk-Sms')}} | {{__('Admin| SEND SMS')}}
@endsection

@section('page-name')
{{__('Admin | SEND SMS ')}}
@endsection


@section('main-content')
<link href="/select2/css/select2.min.css" rel="stylesheet" />
<script src="/select2/js/select2.min.js"></script>
   
   <!-- Content Wrapper. Contains page content -->
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
         <div class="col-md-12 col-sm-12">
            <div class="card-info card-outline card-tabs">
            @include('includes.messages')
              <div class="card-body">
                  <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-info">
             <div class="card-header">
                <h3 class="card-title">Send Sms </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="#">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label>{{__('Group')}}</label>
                                <select name="klass_id" id="group" class="select2 form-control @error('klass_id') is-invalid @enderror" style="width:100% !important" multiple="multiple" data-live-search="true" required>
                                </select>
                        </div>
                        <div class="col-md-4">
                            <label>{{__('Contact')}}</label>
                                <select name="contact_id" id="contact1" class="select2 form-control @error('contact_id') is-invalid @enderror" style="width:100% !important" multiple="multiple" data-live-search="true" required>
                                </select>
                         </div>
                    </div>

                  <div class="form-group">
                    <label for="name">Title</label>
                    <input type="text" class="form-control" id="title" name="sms_title" placeholder="Enter Sms Title">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Body</label>
                    <textarea name="sms_body" id="body" cols="5" rows="5" class="form-control" ></textarea>
                  </div>
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <span class="float-right"> <button type="submit" class="btn btn-info">
                        Send <i class="fas fa-paper-plane"></i></button></span>
                </div>
              </form>
            <!-- /.card -->
          

          </div>
</div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
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

<script>
$('#group').select2();
$('#group').on('select2:opening select2:closing', function( event ) {
    var $searchfield = $(this).parent().find('.select2-search__field');
    $searchfield.prop('disabled', false);
    $searchfield.prop('placeholder', 'select all that apply');
    
});
</script>

<script>
    $('#contact1').select2();
    $('#contact1').on('select2:opening select2:closing', function( event ) {
    var $searchfield = $(this).parent().find('.select2-search__field');
    $searchfield.prop('disabled', false);
    $searchfield.prop('placeholder', 'select all that apply');
    
});
</script>
@endsection
