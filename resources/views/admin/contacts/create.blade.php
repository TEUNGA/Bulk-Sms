@extends('layouts.admin-master')
@section('title')
{{__('Bulk-Sms')}} | {{__('Admin| Create CONTACT')}}
@endsection

@section('page-name')
{{__('Admin | ADD CONTACT')}}
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
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-info">
             <div class="card-header">
                <h3 class="card-title">Add Contact </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{ route('admin.store_contact') }}">
                @csrf
                <div class="card-body">

                <div class="row"> 
                        <div class="col-md-4">
                            <label>{{__("Select user")}}</label>
                            <select id="user" name="user_id" class style="width:100% !important">
                                  @foreach( $users as $user )
                                    <option value="{{$user->id}}" data-badge="">{{$user->name}}</option>
                                  @endforeach 
                            </select>
                        </div>
                    

                
                <!-- /.card-body -->
                <div class="card-footer">
                  <span class="float-right"> <button type="submit" class="btn btn-info"><i
                            class="fas fa-plus"></i>
                        Add To Contact</button></span>
                </div>
              </form>
            <!-- /.card -->
          

          </div>
</div>

        <!-- /.row -->
      </div>
      <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="fas fa-import">{{__("List Of Contacts")}} :</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                            <table id="demotable" class="table table-sm table-bordered table-hover dataTable table">
                    <thead class="thead-light">
                        <tr>
                            <th>{{__("Name")}}</th>
                            <th>{{__("Telephone")}}</th>
                                                    
                        
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                        <td> {{$contact->users_name}}</td>
                        <td> {{$contact->users_phone}}</td>
                         <td>
                       <div class="btn-group mx-1">
                                  <!-- delete the contact -->
               <a href="#" data-id="" data-url="#" data-toggle="modal" data-target="#" class="text-danger mr-1 deleteBtn">
                   <i class="fas fa-trash-alt "></i></a>
                              </div>
                       </td>
                        </tr>
                        @endforeach
       </tbody>
                    <tfoot class="tfoot-light">
                        <tr>
                            <th>{{__("Name")}}</th>
                            <th>{{__("Telephone")}}</th>                            
                        </tr>
                    </tfoot>
                </table>
                            </div>
            </div>
                            
                        </div> <!-- end row -->
                    </div><!-- end card-body -->
                </div>
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