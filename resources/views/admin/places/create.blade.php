@extends('admin.layouts.index')
@section('content')
	<div class="page-content">
		<div class="container-fluid">
			<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h3>Place-Create</h3>
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
				<form action="{{route('place.store')}}" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					
					<!-- name-->
					<div class="form-group row">
						<label class="col-sm-2 form-control-label">Name*</label>
						<div class="col-sm-10">
							<p class="form-control-static"><input  value="{{ old('name') }}" type="text" class="form-control" id="inputPassword" name="name" placeholder="Name"></p>
						</div>
					</div>
					<!--/name-->
					<!-- cate-->
					<div class="form-group row">
						<label for="inputPassword" class="col-sm-2 form-control-label">Category*</label>
						<div class="col-sm-10">
							<select class="form-control" name="cate_id" >
								@foreach($cates as $cate)
									<option value="{{$cate->id}}">{{$cate->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<!-- cate-->

					<!-- type-->
					<div class="form-group row">
						<label for="inputPassword" class="col-sm-2 form-control-label">Type</label>
						<div class="col-sm-10">
							<select class="form-control" name="type_id" >
								@foreach($types as $type)
									<option value="{{$type->id}}">{{$type->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<!-- type-->

					<!-- description-->
					<div class="form-group row">
						<label class="col-sm-2 form-control-label">Description*</label>
						<div class="col-sm-10">
							<p class="form-control-static"><input  value="{{ old('description') }}" type="text" class="form-control" id="inputPassword" name="description" placeholder="Description"></p>
						</div>
					</div>
					<!--/description-->

					<!-- latitude-->
					<div class="form-group row">
						<label class="col-sm-2 form-control-label">Latitude*</label>
						<div class="col-sm-10">
							<p class="form-control-static"><input  value="{{ old('latitude') }}" type="text" class="form-control" id="inputPassword" name="latitude" placeholder="Latitude"></p>
						</div>
					</div>
					<!--/latitude-->

					<!-- longitude-->
					<div class="form-group row">
						<label class="col-sm-2 form-control-label">Longitude*</label>
						<div class="col-sm-10">
							<p class="form-control-static"><input  value="{{ old('longitude') }}" type="text" class="form-control" id="inputPassword" name="longitude" placeholder="Longitude"></p>
						</div>
					</div>
					<!--/longitude-->
					<!-- image-->
					<div class="form-group row">
						<label class="col-sm-2 form-control-label">Image</label>
						<div class="col-sm-10">
							<input name="image" id="f" type="file" onchange="file_change(this)" style="display: none" />
							<input type="button" value="Chọn ảnh" onclick="document.getElementById('f').click()" />
							<img id="img" height="150px;" style="display: none" />
						</div>
					</div>
					
					<!--/image-->
					<br>
					<button type="submit" class="btn btn-inline btn-primary">Create</button>
					<button type="reset" class="btn btn-inline btn-default">Reset</button>

				</form>
			</div><!--.box-typical-->
		</div><!--.container-fluid-->
	</div><!--.page-content-->
@endsection
@section('script')
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