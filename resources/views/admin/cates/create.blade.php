@extends('admin.layouts.index')
@section('content')
	<div class="page-content">
		<div class="container-fluid">
			<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h3>Cate-Create</h3>
						</div>
					</div>
				</div>
			</header>
			@if(count($errors) > 0 )
                <div class="alert alert-danger">
                    @foreach($errors -> all() as $err)
                        {{$err}}<br>    
                    @endforeach
                </div>
            @endif
            @if(session('regular'))
            	<div class="alert alert-danger">
            		{{session('regular')}}
            	</div>
            @endif
			<div class="box-typical box-typical-padding">
				<form action="{{route('cate.store')}}" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					
					<!-- name-->
					<div class="form-group row">
						<label class="col-sm-2 form-control-label">Name</label>
						<div class="col-sm-10">
							<p class="form-control-static"><input  value="{{ old('name') }}" type="text" class="form-control" id="inputPassword" name="name" placeholder="Name"></p>
						</div>
					</div>
					<!--/name-->

					<!-- latitude-->
					<div class="form-group row">
						<label class="col-sm-2 form-control-label">Latitude</label>
						<div class="col-sm-10">
							<p class="form-control-static"><input  value="{{ old('latitude') }}" type="text" class="form-control" id="inputPassword" name="latitude" placeholder="Latitude"></p>
						</div>
					</div>
					<!--/latitude-->

					<!-- longitude-->
					<div class="form-group row">
						<label class="col-sm-2 form-control-label">Longitude</label>
						<div class="col-sm-10">
							<p class="form-control-static"><input  value="{{ old('longitude') }}" type="text" class="form-control" id="inputPassword" name="longitude" placeholder="Longitude"></p>
						</div>
					</div>
					<!--/longitude-->
					<!-- zoom-->
					<div class="form-group row">
						<label class="col-sm-2 form-control-label">Zoom</label>
						<div class="col-sm-10">
							<p class="form-control-static"><input  value="{{ old('zoom') }}" type="number" class="form-control" id="inputPassword" name="zoom" placeholder="Zoom"></p>
						</div>
					</div>
					<!--/zoom-->

					<button type="submit" class="btn btn-inline btn-primary">Create</button>
					<button type="reset" class="btn btn-inline btn-default">Reset</button>

				</form>
			</div><!--.box-typical-->
		</div><!--.container-fluid-->
	</div><!--.page-content-->
@endsection