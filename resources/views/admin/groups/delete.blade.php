<!-- Modal -->
<div class="modal fade" id="deleteClassModal{{$subklass->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteClassModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteClassModalLabel">{{__("Delete")}}  {{$subklass->name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p> {{__("Are you sure?")}}</p>
         <form id="delete-group-form{{$subklass->id}}" action="#" method="POST" >
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