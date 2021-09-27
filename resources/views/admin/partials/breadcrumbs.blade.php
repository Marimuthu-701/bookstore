@if (!empty($breadcrumbs))
<ol class="breadcrumb float-sm-left">
  	<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ trans('common.home') }}</a></li>
	@foreach ($breadcrumbs as $label => $link)
	@if (is_int($label) && !is_int($link))
		<li class="breadcrumb-item active">
		  <span>{{ $link }}</span>
		</li>
	@else
		<li class="breadcrumb-item">
			<a href="{{ $link }}" class="breadcrumb-link">
			  <span class="breadcrumb-link-text">{{ $label }}</span>
			</a>
		</li>
	@endif
	</li>
	@endforeach
</ol>
@endif