@extends('layouts.admin-master')

@section('title')
{{__('Bulk-Sms')}} | {{__('Admin| ADD Group')}}
@endsection

@section('page-name')
{{__('Admin | ADD GROUP ')}}
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
            @include('includes.messages')
              <div class="card-body">
                  <div class="row">
          <!-- left column -->
          <div class="col-md-4">
            <!-- general form elements -->
            <div class="card card-info">
             <div class="card-header">
                <h3 class="card-title">Add Group </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{ route('admin.store_group') }}">
                @csrf
                <div class="card-body">

                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Group Name">
                  </div>

                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="" cols="5" rows="2" class="form-control" ></textarea>
                  </div>
                  <input type="hidden" name="group_id">
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <span class="float-right"> <button type="submit" class="btn btn-info"><i
                            class="fas fa-plus"></i>
                        Add Group</button></span>
                </div>
              </form>
            <!-- /.card -->
          

          </div>
</div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-8">
          <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">View Groups </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="demotable" class="table table-bordered table-hover dataTable table">
                    <thead class="thead-light">
                        <tr>
                            <th>Name </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($groups as $group)
                        <tr>
                        <td><a style="color:blue !important" href="#" data-id="" data-url="#" data-toggle="modal" data-target="#view_group{{$group->id}}" class="mx-1">{{$group->name}}</a>
 <a href="#" data-id="" data-url="#" data-toggle="modal" data-target="#add_contact{{$group->id}}" class="mx-1"><button class="btn btn-info float-right"><i style="color:red !important;" class="fas fa-user-plus nav-icon" ></i></button></a>
                      </td>
                      @include('admin.modals.group_contacts.create')
                        <td>
                       <div class="btn-group mx-1">
                       <?php 
                            $group_ref = DB::table('contact_group')->where('group_id', $group->id);
                            ?>
                            <div class="btn-group mx-1">
                                @if($group_ref->doesntExist())
                                     <!-- delete the service group -->
                            <a href="#" data-id="" data-url="#" data-toggle="modal" data-target="#deletegroup{{$group->id}}" class="text-danger mr-1 deleteBtn">
                                <i class="fas fa-trash-alt "></i></a>
                                @else
                               <span class="mx-1"> <i class="fas fa-lock "></i></span>
                                @endif
                            </div>
                          <!-- view a particular group contacts -->
                          <a href="{{route('admin.view_one_group',$group->id)}}" class="mx-1">
                                <i class="fas fa-eye text-secondary"></i></a>

                            <!-- edit a particular group -->
                               <a href="#" data-id="" data-url="#" data-toggle="modal" data-target="#edit_group{{$group->id}}" class="mx-1">
                                <i class="fas fa-edit text-secondary"></i></a>
                                @include('admin.modals.group_contacts.edit')
                            
                                            </div>
                       </td>
                        </tr>
                         <!-- View group description modal -->

<div class="modal fade edit-layout-modal" id="view_group{{$group->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered " role="document">
      <div class="modal-content p-1">
          <div class="modal-header">
              <h4 class="modal-title" ><i class="fas fa-eye"></i> {{ __('View Description') }}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body p-4">
              <!-- class="dropzone" -->
                <div class="form-group row">
                      <div class="col-md-12 col-xs-12">
                        <label for="description">{{__('Description')}}</label>
                        <input class="form-control" type="text" value="{{$group->description}}"readonly>
                      </div>
     
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-light" data-dismiss="modal">{{ __('Close') }}</button>
          </div>
      </div>
  </div>
</div>

<!-- end view Group modal -->

@endforeach
@include('admin.modals.group_contacts.delete')
                    </tbody>
                    <tfoot class="tfoot-light">
                    <tr>
                    
                            <th>Name </th>
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
                extend:    'excelHtml5',
                // text:      '<i class="fa fa-file-excel-o"></i>',
                titleAttr: 'Download Template',
                text: 'Download Contact List Template',
                className: "btn btn-default"
            },
           
        ]
    } );
    } );
</script>

@endsection

