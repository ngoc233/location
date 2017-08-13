 <div class="container-fluid">
        <div class="row">
			@if(Session::has('success'))
				<div id="notification" class="alert alert-success" role="alert">
					{{ Session::get('success') }}
				</div>
			@endif
			@if(Session::has('errors'))
				<div id="notification" class="alert alert-danger" role="alert">
					{{ Session::get('errors') }}
				</div>
			@endif
			

	</div>
</div>
