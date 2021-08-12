@extends('layouts.admin-master')

@section('title')
{{__('SCHOOLY')}} | {{__('BOARD| ADD USER')}}
@endsection

@section('page-name')
{{__('BOARD | ADD USER ')}}
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
                <h3 class="card-title">Add User </h3>
                <span class="float-right"> <a href="/admin/view_users" class="btn btn-secondary"><i
                            class="fas fa-eye"></i>
                        View Users  </a></span>
</div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                    <div class="row">
                <div class="form-group col-md-4">
                  <label>Role</label>
                  <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                    <option selected="selected" >Select Country</option>
                    @foreach($countries as $country)
                    <option value="{{$country->name}}">{{$country->name}}</option>
                    @endforeach

                    
</select>
                  </div>
                  <div class="form-group col-md-4">
                <label>Select Region</label>
                <select class="form-control select2" style="width: 100%;" name="region_id" id="region">
                  <option value="" selected>Select Region</option>
                     @foreach($regions as $region)
                  <option value="{{$region->id}}">{{$region->name}}</option>
                  @endforeach
                </select>
           </div>
            <div class="form-group col-md-4" >
                 <label>Select Division</label>
                <select class="form-control select2" style="width: 100%;" name="division_id" id="division">
               <!--!ajax-->
                </select>
                 </div>


                  <div class="form-group col-md-4" >
                    <label for="exampleInputEmail1">School Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter School Name">
                  </div>
                  <div class="form-group col-md-4" >
                    <label for="exampleInputEmail1">School Moto</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter School Moto">
                  </div>

                  <div class="form-group col-md-4" >
                    <label for="exampleInputEmail1">School P.O.Box</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter School P.O.Box">
                  </div>

                  <div class="form-group col-md-4" >
                    <label for="exampleInputEmail1">Sections</label>
                    <select class="form-control select2" style="width: 100%;" name="section" id="region">
                    <option value="" selected>Select Sections</option>
                  <option value="Anglophone Section">Anglophone General</option>
                  <option value="Francophone General">Francophone General </option>
                  <option value="Bilingual General">Bilingual</option>
                  </div>

                 
                  <div class="form-group col-md-4" >
                    <label for="exampleInputEmail1">Logo</label>
                    <input type="file" class="form-control" id="exampleInputEmail1" >
                  </div>
                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Creation Date</label>
                    <input type="date" class="form-control" id="exampleInputEmail1" >
                  </div>

                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Address</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"  placeholder="Enter Address">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">School Category</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"  value="Nursery School" readonly>
                  </div>

                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <span class="float-right"> <a href="#" class="btn btn-info"><i
                            class="fas fa-plus"></i>
                        Add School </a></span>
                </div>
              </form>
            <!-- /.card -->
          

          </div>
</div>
          <!--/.col (left) -->
          <!-- right column -->
       
               
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

    <script type="text/javascript">
    $('#region').change(function(){
    var regionID = $(this).val();
    if(regionID){
        $.ajax({
           type:"GET",
           url:"{{route('division.drop')}}?region_id="+regionID,
           success:function(res){
            if(res){
                $("#division").empty();
                $("#division").append('<option value="">Select</option>');
                $.each(res,function(key,value){
                    $("#division").append('<option value="'+key+'">'+value+'</option>');
                });

            }else{
               $("#division").empty();
            }
           }
        });
    }else{
        $("#division").empty();
        $("#subdivision").empty();
    }
   });
    
</script>
      @endsection
