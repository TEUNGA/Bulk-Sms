
                                                 <!-- Add contact to group description modal -->

<div class="modal fade edit-layout-modal" id="add_contact{{$group->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered " role="document">
      <div class="modal-content p-1">
          <div class="modal-header">
              <h4 class="modal-title" ><i class="fas fa-plus"></i> {{ __('Add Contact') }}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body p-4">
              <!-- class="dropzone" -->
              <form  method="POST" action="{{route('admin.assign_contact')}}" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="row"> 
                        <div class="col-md-12">
                            <label>{{__("Select Contact")}}</label>
                            <select id="multiselect{{$group->id}}" name="contact[]" class="select2" style="width:100% !important" multiple="multiple" data-live-search="true">
                                  @foreach( $contacts as $contact )
                                    <option value="{{$contact->id}}" data-badge="">{{$contact->users_name}}</option>
                                  @endforeach 
                            </select>
                            <input type="hidden" name="group_id" value="{{$group->id}}">
                        </div>
     
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-light" data-dismiss="modal">{{ __('Close') }}</button>
              <button  type="submit" class="btn btn-secondary" ><i class="fas fa-plus"></i> {{ __('Add') }}</button>
          </form>
          </div>
      </div>
  </div>
</div>



<script>
    $('#multiselect{{$group->id}}').select2();
    $('#multiselect{{$group->id}}').on('select2:opening select2:closing', function( event ) {
    var $searchfield = $(this).parent().find('.select2-search__field');
    $searchfield.prop('disabled', false);
    $searchfield.prop('placeholder', 'select all that apply');
    
});
</script>

<!-- end Add Contact to group modal -->