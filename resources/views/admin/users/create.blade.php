@extends('admin.layouts.index')
@section('content')
	<div class="page-content">
		<div class="container-fluid">
			<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h3>User-Create</h3>
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
				<form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					
					<!-- name-->
					<div class="form-group row">
						<label class="col-sm-2 form-control-label">Name</label>
						<div class="col-sm-10">
							<p class="form-control-static"><input  value="{{ old('name') }}" type="text" class="form-control" id="inputPassword" name="name" placeholder="Name"></p>
						</div>
					</div>
					<!--/name-->
					<!-- email-->
					<div class="form-group row">
						<label class="col-sm-2 form-control-label">Email</label>
						<div class="col-sm-10">
							<p class="form-control-static"><input  value="{{ old('email') }}" type="email" class="form-control" id="inputPassword" name="email" placeholder="Email"></p>
						</div>
					</div>
					<!--/email-->
					<!-- password-->
					<div class="form-group row">
						<label class="col-sm-2 form-control-label">Password</label>
						<div class="col-sm-10">
							<p class="form-control-static"><input  value="{{ old('password') }}" type="password" class="form-control" id="inputPassword" name="password" placeholder="Password"></p>
						</div>
					</div>
					<!--/password-->
					<button type="submit" class="btn btn-inline btn-primary">Create</button>
					<button type="reset" class="btn btn-inline btn-default">Reset</button>

				</form>
			</div><!--.box-typical-->
		</div><!--.container-fluid-->
	</div><!--.page-content-->
@endsection