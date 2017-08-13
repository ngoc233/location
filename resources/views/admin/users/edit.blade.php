@extends('admin.layouts.index')
@section('content')
	<div class="page-content">
		<div class="container-fluid">
			<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h3>User-Edit</h3>
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
						'route' => ['user.update',$user->id],
						'method'=> 'PUT'
					]

				) !!}
					<!-- name-->
					<div class="form-group row">
						<label class="col-sm-2 form-control-label">Name</label>
						<div class="col-sm-10">
							<p class="form-control-static"><input type="text" class="form-control" id="inputPassword"  name="name" value="{{$user->name}}"></p>
						</div>
					</div>
					<!--/name-->
					<!-- email-->
					<div class="form-group row">
						<label class="col-sm-2 form-control-label">Email</label>
						<div class="col-sm-10">
							<p class="form-control-static"><input type="email" class="form-control" id="inputPassword"  name="email" value="{{$user->email}}"></p>
						</div>
					</div>
					<!--/email-->
					<!-- password-->
					<div class="form-group row">
						<label class="col-sm-2 form-control-label">Password</label>
						<div class="col-sm-10">
							<p class="form-control-static"><input type="password" class="form-control" id="inputPassword"  name="password" value="{{$user->password}}"></p>
						</div>
					</div>
					<!--/password-->

				
						<input type="reset" name="" value="Reset" class="btn btn-inline btn-secondary">
						<button type="submit" class="btn btn-inline btn-primary">Update</button>
				{!! Form::close() !!}
			</div><!--.box-typical-->
		</div><!--.container-fluid-->
	</div><!--.page-content-->
@endsection