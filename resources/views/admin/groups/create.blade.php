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
                <table class="table table-bordered table-hover dataTable table">
                    <thead class="thead-light">
                        <tr>
                            <th>Name </th>
                            <th>Description </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($groups as $group)
                        <tr>
                        <td>{{$group->name}} </td>
                        <td>{{$group->description}} </td>
                         <td>
                       <div class="btn-group mx-1">

                            <!-- edit a particular group -->
                               <a href="#" data-id="" data-url="#" data-toggle="modal" data-target="#edit_group{{$group->id}}" class="mx-1">
                                <i class="fas fa-edit text-secondary"></i></a>

                                  <!-- delete the service group -->
               <a href="#" data-id="" data-url="#" data-toggle="modal" data-target="#deletegroup{{$group->id}}" class="text-danger mr-1 deleteBtn">
                   <i class="fas fa-trash-alt "></i></a>
                              </div>
                       </td>
                        </tr>
                        

                        <!-- Edit group modal -->

<div class="modal fade edit-layout-modal" id="edit_group{{$group->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" data-backdrop="static" data-keyboard="false">
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
              <form  method="POST" action="{{route('admin.edit_group',$group->id)}}" enctype="multipart/form-data">
              {{ csrf_field() }}
              {{ method_field('PATCH') }}
                <div class="form-group row">
                    <div class="col-md-12 col-xs-12">
                        <label for="name">{{__('Name')}}</label>
                        <input class="form-control" type="text" value="{{$group->name}}"  name="name" required="required" autofocus>
                      </div>
                      <div class="col-md-12 col-xs-12">
                        <label for="description">{{__('Description')}}</label>
                        <input class="form-control" type="text" value="{{$group->description}}"  name="description" required="required" autofocus>
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



<!-- Modal -->
<div class="modal fade" id="deletegroup{{$group->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteGroupModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteGroupModalLabel">{{__("Delete")}}  {{$group->name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p> {{__("Are you sure?")}}</p>
         <form id="delete-group-form{{$group->id}}" action="{{route('admin.delete_group',$group->id)}}" method="POST" >
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <div class="align-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Cancel')}}</button>
                <button type="submit" class="btn btn-danger">{{__('Yes, delete it!')}}</button>
            </div>

        </form>
      </div>
       
    </div>
  </div>
</div>

@endforeach

                    </tbody>
                    <tfoot class="tfoot-light">
                    <tr>
                    
                            <th>Name </th>
                            <th>Description </th>
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
@endsection

