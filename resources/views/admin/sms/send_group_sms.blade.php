@extends('layouts.admin-master')

@section('title')
{{__('Bulk-Sms')}} | {{__('Admin| SEND SMS')}}
@endsection

@section('page-name')
{{__('Admin | SEND SMS ')}}
@endsection


@section('main-content')

   
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
                <h3 class="card-title">Send Sms To Group</h3>
              </div>
            </div>
              <!-- /.card-header -->
              <!-- /.contact or group card body -->
              <div class="card-body">
                <a href="{{route('admin.send_sms')}}"> <button class="float-left">Send to a contact</button></a>
                <a href="{{route('admin.send_group_sms')}}"> <button class="float-right">Send to a group</button></a>
              </div>
              <!-- /.contact or group card body ends here -->
              <!-- form start -->
              <form role="form" method="post" action="{{ route('admin.store_sms')}}">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="form-group">
                        <label>Select Groups</label>
                        <select id="group" name="group[]" class="select2" style="width:100% !important" multiple="multiple" data-live-search="true">
                            @foreach($groups as $group)
                           <option value="{{$group->id}}"> {{$group->name}} </option>
                            @endforeach 
                            </select>
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
                <table id="demotable" class="table table-bordered table-hover dataTable table">
                    <thead class="thead-light">
                        <tr>
                            <th>Title </th>
                            <th>Sent to </th>
                            <th>At </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($messages as $message)
                      
                        <tr>
                        <td><a href="{{route('admin.view_sms',$message->id)}}">{{$message->sms_title}}</a></td>
                        <td>{{$message->group_name}}</td>
                        <td>{{$message->created_at}}</td>
                         <td>
                       <div class="btn-group mx-1">

                           <!-- view a particular group -->
                           <a href="{{route('admin.view_sms',$message->id)}}">
                                <i class="fas fa-eye text-secondary"></i></a>
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
@endforeach

                    </tbody>
                    <tfoot class="tfoot-light">
                    <tr>
                    
                            <th>Title </th>
                            <th>Sent to </th>
                            <th>At</th>
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
@endsection
