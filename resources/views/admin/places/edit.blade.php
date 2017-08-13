@extends('admin.layouts.index')
@section('content')
	<div class="page-content">
		<div class="container-fluid">
			<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h3>Place-Edit</h3>
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
						'route' => ['place.update',$place->id],
						'method'=> 'PUT',
						'files' => 'true'
					]

				) !!}
					<!-- name-->
					<div class="form-group row">
						<label class="col-sm-2 form-control-label">Name</label>
						<div class="col-sm-10">
							<p class="form-control-static"><input  value="{{$place->name}}" type="text" class="form-control" id="inputPassword" name="name" placeholder="Name"></p>
						</div>
					</div>
					<!--/name-->
					<!-- cate-->
					<div class="form-group row">
						<label for="inputPassword" class="col-sm-2 form-control-label">Category*</label>
						<div class="col-sm-10">
							<select class="form-control" name="cate_id" >
								@foreach($cates as $cate)
									<option
									@if($cate->id == $place->cate_id)
										{{"selected = 'selected'"}}
									@endif
									 value="{{$cate->id}}">{{$cate->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<!-- cate-->
					<!-- type-->
					<div class="form-group row">
						<label for="inputPassword" class="col-sm-2 form-control-label">Type*</label>
						<div class="col-sm-10">
							<select class="form-control" name="type_id" >
								@foreach($types as $type)
									<option
									@if($type->id == $place->type_id)
										{{"selected = 'selected'"}}
									@endif
									 value="{{$type->id}}">{{$type->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<!-- type-->

					<!-- latitude-->
					<div class="form-group row">
						<label class="col-sm-2 form-control-label">Latitude</label>
						<div class="col-sm-10">
							<p class="form-control-static"><input  value="{{$place->latitude}}" type="text" class="form-control" id="inputPassword" name="latitude" placeholder="Latitude"></p>
						</div>
					</div>
					<!--/latitude-->
					<!-- longitude-->
					<div class="form-group row">
						<label class="col-sm-2 form-control-label">Longitude</label>
						<div class="col-sm-10">
							<p class="form-control-static"><input  value="{{$place->longitude}}" type="text" class="form-control" id="inputPassword" name="longitude" placeholder="Longitude"></p>
						</div>
					</div>
					<!--/longitude-->
					<!-- iamge-->
					<div class="form-group row">
						<label class="col-sm-2 form-control-label">Image</label>
						<div class="col-sm-10">
							<div class="files-manager-header-left">
								<input name="image" id="f" type="file" onchange="file_change(this)" style="display: none" />
								<input type="button" value="Chọn ảnh" onclick="document.getElementById('f').click()" />
								<img id="img" height="150px;" style="display: none" />
							</div>
							<img width="300px;" src="{{url('public/admin/image_place').'/'.$place->image}}">
						</div>
					</div>
					<!--/image-->
					<button type="submit" class="btn btn-inline btn-primary">Update</button>
				{!! form::close() !!}
			</div><!--.box-typical-->
		</div><!--.container-fluid-->
	</div><!--.page-content-->
	<!-- preview image -->
	<script type="text/javascript">

		function file_change(f){

		    var reader = new FileReader();

		    reader.onload = function (e) {

		        var img = document.getElementById("img");

		        img.src = e.target.result;

		        img.style.display = "inline";

		    };

		    reader.readAsDataURL(f.files[0]);

		}

	</script>
	<!--/preview image-->
@endsection