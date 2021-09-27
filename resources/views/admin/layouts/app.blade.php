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
</body>

@stop
@push('js')
       
<script type="text/javascript">
	var admin_base_url = "{{ url(config('app.prefixes.admin')) }}/";
	var js_date_time_format = "{{ config('app.js_date_time_format') }}";
</script>

<script type="text/javascript">
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
        $('body').tooltip({selector: '[data-toggle="tooltip"]'});
	});
</script>
@endpush
