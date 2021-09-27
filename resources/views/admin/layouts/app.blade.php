@extends('adminlte::page')
@push('css')
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<link rel="stylesheet" href="{{ asset('css/admin/style.css') }}" />
@endpush

@section('footer')
<body onunload="">
	<div id="delete-confirm-modal" class="modal fade">
		<div class="modal-dialog modal-confirm">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Are you sure?</h4>
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<p>Do you really want to delete this record? This process cannot be undone.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-danger" id="delete-confirmed">Delete</button>
				</div>
			</div>
		</div>
	</div>
	<!-- User Statu Activation confirm Moddal -->
	<div id="user-verify-modal" class="modal fade">
		<div class="modal-dialog modal-confirm">
			<div class="modal-content">
				<form method="post" class="user-approve-reject-form">
					@csrf
					<div class="modal-header">
						<h4 class="modal-title">Approve/Reject</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<input type="hidden" name="is_approve" value="0" id="is_approve">
						<input type="hidden" name="is_reject"  value="0" id="is_reject">
						<label for="exampleFormControlTextarea1">Comments</label>
						<textarea class="form-control" name="comments"rows="3"></textarea>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary d-none" data-dismiss="modal">No</button>
						<button type="submit" class="btn btn-danger"  id="reject-btn">Reject</button>
						<button type="submit" class="btn btn-success" id="approve-btn">Approve</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>

@stop
@push('js')
       
<script type="text/javascript">
	var admin_base_url = "{{ url(config('app.prefixes.admin')) }}/";
	var js_date_time_format = "{{ config('app.js_date_time_format') }}";
</script>

<script type="text/javascript">
	/* Validation for User Status Approve and Reject modal form */
	function formValidation(form_element) {
		form_element.validate({
			errorClass: "invalid-feedback",
			errorElement: "strong",
			rules: {
				comments: "required",
			},
			highlight: function(element) {
				$(element).addClass("is-invalid");
			},
			unhighlight: function(element) {
				$(element).removeClass("is-invalid");
			},
			submitHandler: function(form) {
				form.submit();
                $('#user-verify-modal').hide();
			}
		});
	}

	$(document).ready(function() {
		$('body').on('click', '.item-delete-form button', function(e) {
			var $form = $(this).closest('form');
			e.preventDefault();
			$('#delete-confirm-modal').modal({
				backdrop: 'static',
				keyboard: false
			})
			.on('click', '#delete-confirmed', function(e) {
				$form.trigger('submit');
			});
		});

		$('body').on('click', '.user-approve-btn', function(e) {
			var approve_form = $(".user-approve-reject-form");
			approve_form.attr('action', admin_base_url+ 'users/approve/' + $(this).attr('data-id'))
			e.preventDefault();
			$('#user-verify-modal').modal({
				backdrop: 'static',
				keyboard: false
			}).on('click', '#approve-btn', function(e) {
				$('#is_approve').val(1);
				$('#is_reject').val(0);
				formValidation(approve_form);

			}).on('click', '#reject-btn', function(e) {
				$('#is_reject').val(1);
				$('#is_approve').val(0);
				formValidation(approve_form);
			});
		});
        $('body').tooltip({selector: '[data-toggle="tooltip"]'});
	});
</script>
@endpush
