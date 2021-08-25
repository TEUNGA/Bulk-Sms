<!-- Modal -->
<div class="modal fade" id="editgroupModal{{$group->id}}" tabindex="-1" role="dialog" aria-labelledby="editgroupModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editgroupModalLabel">{{__("Update")}}: {{$group->name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form action="{{ route('pilot.update.subject_groups', $group->id) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                {{ method_field('PATCH') }}           
            <div class="row">

                <div class="col-md-6">
                    <label>{{__("Sub-Section")}}</label>
                    <div class="input-group mb-3">
                        <select id="section{{$group->id}}" class="form-control @error('subsection') is-invalid @enderror" name="section_id" required>
                            <option value="{{$section->id}}">{{ $group->sub_section ?? __("Select Sub-section")}}</option>
                            @foreach($sections as $section)
                            <option value="{{$section->id}}">{{$section->name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('subsection'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('subsection') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>      
                
                <div class="col-md-6">
                    <label>{{__("Subject Group")}}</label>
                    <div class="input-group mb-3">
                        <input type="text" value="{{$group->name}}" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="e.g Compulsory Subjects" id="subject_group{{$group->id}}" required>
                            @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                    </div>
                </div> 
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__("Close")}}</button>
        <button type="submit" class="btn btn-primary">{{__("Save changes")}}</button>
      </div>
        </form>

    </div>
  </div>
</div>