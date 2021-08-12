<link href="/select2/css/select2.min.css" rel="stylesheet" />
<script src="/select2/js/select2.min.js"></script>


<!-- Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="addSubjectsModalLabel" aria-hidden="true" id="addSubjectsModal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{__("Add Subject")}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
                <form action="{{ route('admin.assign_subjects') }}" method="post" enctype="multipart/form-data">
                @csrf
            
                    <div class="row col-md-12"> 
                        <div class="col-md-4">
                            <label>{{__("Sub-Section")}}</label>
                            
                            <div class="input-group mb-3">
                                <select id="section" class="form-control @error('section') is-invalid @enderror" name="section"  required>
                                    @foreach($sections as $section)
                                    <option value="{{$section->id}}">{{$section->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('section'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('section') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>      
                        
                        <div class="col-md-4">
                                <label>{{__("Specialty/Series")}}</label>
                                <div class="input-group mb-3">
                                    <select id="specialty" class="form-control @error('specialty') is-invalid @enderror" id="specialty" name="specialty_id" required>
                                        <!-- ajax will dropdown the specialties -->
                                    </select>
                                    @if ($errors->has('specialty_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('specialty_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>
                        
                        <div class="col-md-4">
                            <label>{{__("Main Class")}}</label>
                            
                            <div class="input-group mb-3">
                                <select id="klass" class="select2 form-control @error('klass') is-invalid @enderror" name="klass_id[]" style="width:100% !important" multiple="multiple" data-live-search="true" required>
                                <!-- ajax will dropdown the classes -->
                                </select>
                                @if ($errors->has('klass'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('klass') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                    </div>

                    <div class="row col-md-12"> 
                        <div class="col-md-12">
                            <label>{{__("Select Subjects")}}</label>
                            <select id="multiselect" name="subject[]" class="select2" style="width:100% !important" multiple="multiple" data-live-search="true">
                                  @foreach( $subjects as $subject )
                                    <option value="{{$subject->id}}" data-badge="">{{$subject->name}}</option>
                                  @endforeach 
                            </select>
                        </div>
                    </div>

                            <div class="input-group mb-3">
                                <span class="float-right"> 
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> {{__("Save subjects")}}</button>
                                </span>
                            </div>
    
            
                </form>
            @include('admin.scripts.classes_config')
        </div>
       </div>
    </div>
  </div>
</div>
        
<script>
$('#multiselect').select2();
$('#multiselect').on('select2:opening select2:closing', function( event ) {
    var $searchfield = $(this).parent().find('.select2-search__field');
    $searchfield.prop('disabled', false);
    $searchfield.prop('placeholder', 'select all that apply');
    
});
</script>

<script>
    $('#klass').select2();
    $('#klass').on('select2:opening select2:closing', function( event ) {
    var $searchfield = $(this).parent().find('.select2-search__field');
    $searchfield.prop('disabled', false);
    $searchfield.prop('placeholder', 'select all that apply');
    
});
</script>