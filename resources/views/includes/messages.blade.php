@if(count($errors) > 0)
  @foreach($errors->all() as $error)
    <div class="alert alert-danger">
      {{$error}}
    </div>
  @endforeach
@endif

@if(session('success'))
    <div class="alert alert-card alert-info text-center" role='alert'>
        <strong class="text-capitalize">{{session('success')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-card alert-danger" role='alert'>
        <strong class="text-capitaize">{{session('error')}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
@endif

@if( session('modal_message_success'))

   <div class="modal fade" id="popupmodal" tabindex="-1" role="dialog" aria-labelledby="myNewsletter">
	<div class="modal-dialog" role="document">
		<div class="modal-content modal-popup">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Newsletter Subscription</h4>
			</div>
			<div class="modal-body">
				<form method="GET" action="#">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
                <p class="text-white">
                  <b>{{ session('modal_message_success')}}</b>
                </p>
        	    </div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
                <p class="text-white">
                  You'll always be the first to know of our amazing deals!
                </p>
              </div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div> 
    <script type="text/javascript">
        $(document).ready(function() {
            $('#popupmodal').modal('show');
        });
    </script>
@endif



@if( session('modal_recommend_success'))

   <div class="modal fade" id="popupmodal" tabindex="-1" role="dialog" aria-labelledby="myNewsletter">
	<div class="modal-dialog" role="document">
		<div class="modal-content modal-popup">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Restaurant Recommendation Successful</h4>
			</div>
			<div class="modal-body">
				<form method="GET" action="#">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
                <p class="text-white">
                  <b>{{ session('modal_recommend_success')}}</b>
                </p>
        	    </div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
                <p class="text-white">
                  Your opinion always Counts
                </p>
              </div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div> 
    <script type="text/javascript">
        $(document).ready(function() {
            $('#popupmodal').modal('show');
        });
    </script>
@endif


	

@if( session('review'))

<div class="modal fade" id="reviewmodal" tabindex="-1" role="dialog" aria-labelledby="myNewsletter">
<div class="modal-dialog" role="document">
 <div class="modal-content modal-popup">
	 <div class="modal-header">
		 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		 <h4 class="modal-title" id="myModalLabel">Thanks for Rating</h4>
	 </div>
	 <div class="modal-body">
		 <form method="GET" action="#">
			 <div class="row">
				 <div class="col-md-12">
					 <div class="form-group">
						 <p class="text-white">
							 <b>{{ session('review')}}</b>
						 </p>
					 </div>
				 </div>
				 <div class="col-md-12">
					 <div class="form-group">
						 <p class="text-white">
							 Your opinion always Counts!
						 </p>
					 </div>
				 </div>
			 </div>
		 </form>
	 </div>
	 <div class="modal-footer">
		 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	 </div>
 </div>
</div>
</div> 
 <script type="text/javascript">
		 $(document).ready(function() {
				 $('#reviewmodal').modal('show');
		 });
 </script>

@endif