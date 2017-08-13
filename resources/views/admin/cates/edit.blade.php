@extends('admin.layouts.index')
@section('content')
	<div class="page-content">
		<div class="container-fluid">
			<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h3>Cate-Edit</h3>
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
			<div class="box-typical box-typical-padding">
				{!! Form::open(
					[
						'route' => ['cate.update',$cate->id],
						'method'=> 'PUT'
					]

				) !!}
					<!-- name-->
					<div class="form-group row">
						<label class="col-sm-2 form-control-label">Name</label>
						<div class="col-sm-10">
							<p class="form-control-static"><input type="text" class="form-control" id="inputPassword"  name="name" value="{{$cate->name}}"></p>
						</div>
					</div>
					<!--/name-->

					<!-- latitude-->
					<div class="form-group row">
						<label class="col-sm-2 form-control-label">Latitude</label>
						<div class="col-sm-10">
							<p class="form-control-static"><input type="text" class="form-control" id="inputPassword"  name="latitude" value="{{$cate->latitude}}"></p>
						</div>
					</div>
					<!--/latitude-->

					<!-- longitude-->
					<div class="form-group row">
						<label class="col-sm-2 form-control-label">Longitude</label>
						<div class="col-sm-10">
							<p class="form-control-static"><input type="text" class="form-control" id="inputPassword"  name="longitude" value="{{$cate->longitude}}"></p>
						</div>
					</div>
					<!--/longitude-->

					<!-- zoom-->
					<div class="form-group row">
						<label class="col-sm-2 form-control-label">Zoom</label>
						<div class="col-sm-10">
							<p class="form-control-static"><input type="number" class="form-control" id="inputPassword"  name="zoom" value="{{$cate->zoom}}"></p>
						</div>
					</div>
					<!--/zoom-->
						<input type="reset" name="" value="Reset" class="btn btn-inline btn-secondary">
						<button type="submit" class="btn btn-inline btn-primary">Update</button>
				{!! Form::close() !!}
			</div><!--.box-typical-->
		</div><!--.container-fluid-->
	</div><!--.page-content-->
@endsection