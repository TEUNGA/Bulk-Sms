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
