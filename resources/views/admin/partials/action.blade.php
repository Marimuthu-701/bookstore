@if(isset($view_btn) && $view_btn)
	<a class="btn btn-info table-edit-btn" href="{{ route('admin.'. $source .'.show', $item->id) }}" data-toggle="tooltip" data-placement="top" title="View">
		<i class="fas fa-eye"></i>
	</a>&nbsp;
@endif

@if(isset($edit_btn) && $edit_btn)
	<a class="btn btn-primary table-edit-btn" href="{{ route('admin.'. $source .'.edit', $item->id) }}" data-toggle="tooltip" data-placement="top" title="Edit">
		<i class="fas fa-edit"></i>
	</a>&nbsp;
@endif

@if(isset($delete_btn) && $delete_btn)
	<form method="POST" action="{{ route('admin.'. $source .'.destroy', $item->id) }}" class="list-inline-item item-delete-form">
	{{ csrf_field() }}
	{{ method_field('DELETE') }}
	<button {{ isset($disabled) && $disabled ? 'disabled' : '' }} class="btn btn-danger table-delete-btn" type="submit" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash-alt"></i></button>
	</form>
@endif

@if(isset($participants) && $participants)
	<a class="btn btn-primary table-edit-btn" href="{{ route('admin.'. $source .'.participants', $item->id) }}" data-toggle="tooltip" data-placement="top" title="Participants">
		<i class="fa fa-users"></i>
	</a>&nbsp;
@endif



