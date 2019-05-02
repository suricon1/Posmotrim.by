@if ($errors->any())
<div class="container-fluid">
	<div class="row">
		<div class="col">
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{!! $error  !!}</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</div>
@endif