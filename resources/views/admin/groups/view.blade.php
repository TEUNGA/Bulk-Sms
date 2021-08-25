@extends('layouts.admin-master')

@section('title')
{{__('Bulk-Sms')}} | {{__('Admin| VIEW GROUP')}}
@endsection

@section('page-name')
{{__('Admin | VIEW GROUP')}}
@endsection

@section('main-content')
   <!-- Content Wrapper. Contains page content -->
   
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-12">
          <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">View Groups </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="demotable" class="table table-bordered table-hover dataTable table">
                    <thead class="thead-light">
                        <tr>
                            <th># </th>
                            <th>Group name </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @php 
                        $count = 1;
                    @endphp
                    <tbody>
                        @foreach($contact_groups as $contact_group)
                        <tr>
                        <td>{{$count}} </td>
                        <td>{{$contact_group->group_name}}  </td>
                         <td>
                       <div class="btn-group mx-1">
                            <!-- view a particular group -->
                          <a href="{{route('admin.view_one_group', $contact_group->group_id)}}" class="mx-1">
                                <i class="fas fa-eye text-secondary"></i></a>

                            <!-- edit a particular group -->
                               <a href="#" data-id="" data-url="#" data-toggle="modal" data-target="#" class="mx-1">
                                <i class="fas fa-edit text-secondary"></i></a>
                              </div>
                              <div class="btn-group mx-1">
                       <?php 
                            $contact_group_ref = DB::table('sms');
                            ?>
                            <div class="btn-group mx-1">
                                @if($contact_group_ref->doesntExist())
                                     <!-- delete the service group -->
                            <a href="#" data-id="" data-url="#" data-toggle="modal" data-target="" class="text-danger mr-1 deleteBtn">
                                <i class="fas fa-trash-alt "></i></a>
                                @else
                               <span class="mx-1"> <i class="fas fa-lock "></i></span>
                                @endif
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
              <!-- class="dropzone" -->
              <form  method="POST" action="" enctype="multipart/form-data">
              {{ csrf_field() }}
              {{ method_field('PATCH') }}
                <div class="form-group row">
                    <div class="col-md-12 col-xs-12">
                        <label for="name">{{__('Name')}}</label>
                        <input class="form-control" type="text"  name="name" required="required" placeholder="{{__('Name')}}" autofocus>
                      </div>
                      <div class="col-md-12 col-xs-12">
                        <label for="description">{{__('Description')}}</label>
                        <input class="form-control" type="text"   name="description" required="required" placeholder="{{__('Description')}}" autofocus>
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
<!-- end edit Group modal -->



<!-- Delete Group modal -->
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
                <!-- class="dropgroup" -->
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
<!-- end delete group modal -->
                    @php 
                    $count = $count+1;
                    @endphp
@endforeach

                    </tbody>
                    <tfoot class="tfoot-light">
                    <tr>
                    
                            <th># </th>
                            <th>Group name </th>
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

