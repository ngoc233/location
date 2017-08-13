@extends('admin.layouts.index')
@section('content')
<div class="page-content">
		<div class="container-fluid">
			<header class="section-header">
				<div class="tbl">
					@include('admin.message.notifications')
					<div class="tbl-row">
						<div class="tbl-cell">
							<h2>Users</h2>
							<a href="{{route('user.create')}}" class="btn btn-rounded btn-inline btn-success">Create</a>
						</div>
					</div>
				</div>
			</header>
			<section class="card">
				<div class="card-block">
					<table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Created_at</th>
							<th>Updated_at</th>
							<th>Action</th>
						</tr>
						</thead>
						<tbody>
							@foreach($users  as $user)
							<tr>
								<td>{{$user->name}}</td>
								<td>{{$user->email}}</td>
								<td>{{$user->created_at}}</td>
								<td>{{$user->updated_at}}</td>
								<td>
									{!! Form::open(
										[
											'route' =>['user.destroy',$user->id],
											'method'=>'DELETE',
											'name'	=>'frm',
											'id' => 'FormDeleteTime',
											'onsubmit' => 'return ConfirmDelete()'
										]
									) !!}
									<!-- Decentralization-->
									@if(Auth::user()->id != 1)
										{{'no action'}}
									@elseif(Auth::user()->id = $user->id && $user->id  == 1 )
										<a  class="btn  btn-inline btn-primary" role="button" href="{{route('user.edit',$user->id)}}">Edit</a>
									@else
									<!--/Decentralization-->
										<button style="float: left" type="submit" class="btn  btn-inline btn-danger" >Delete</button>
										<a  class="btn  btn-inline btn-primary" role="button" href="{{route('user.edit',$user->id)}}">Edit</a>
									@endif

									{!! Form::close() !!}
								</td>
							@endforeach
						</tbody>
					</table>
				</div>
			</section>
		</div><!--.container-fluid-->
	</div>
		<!-- check confirm when click delete-->
 	 <script>

		function ConfirmDelete()
		{
		 var x = confirm("Bạn có chắc chắn xóa không?? Cảnh báo dữ liệu xẽ không được phục hồi");
		if (x)
		   return true;
		else
		   return false;
		}
	</script>
	<!--/check confirm when click delete-->
@endsection