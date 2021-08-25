@extends('layouts.admin-master')
@section('title')
{{__('Bulk-Sms')}} | {{__('Admin| UPLOAD CONTACT')}}
@endsection

@section('page-name')
{{__('Admin | UPLOAD CONTACT')}}
@endsection
@section('main-content')
      <!-- =============== Left side End ================-->
      <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <!-- <h1 class="mr-2">Home</h1> -->
                    <ul>
                        <li><a href="#">{{__('Manage Contacts')}}</a></li>
                        <li>{{__('Upload Contact List')}}</li>
                    </ul>
                </div>
               

<div class="container-fluid">
    <div class="row">
<div class="col-md-12 col-sm-12">
   
    <div class="card card-info card-outline card-tabs">
        @include('includes.messages')
            <div class="card-body">
            <div class="row col-md-12">
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="card-title mb-3">{{__("Upload Contact List")}}
                          
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.import_contact')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-12 form-group mb-3">
                                    <label for="website2"> {{__("Import Contact List")}}</label>
                                    <input type="file" name="file" class="form-control form-control-rounded" id="website2" required />
                                </div>
                                <div class="col-md-12 mt-2">
                                    <button class="btn btn-info  btn-rounded" type="submit"><i class="fas fa-upload nav-icon"></i>{{__("Import")}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
            <div class="card mb-8">
                    <div class="card-header">
                        <h4 class="text-info">{{__("Contact LIST TEMPLATE DOWNLOAD")}}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
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
                            <td>{{$contact->users_name}}</td>
                            <td>{{$contact->users_phone}}</td>
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
        </div>
    </div>

   
</div>
<!-- /.row -->

<!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
</div>

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
