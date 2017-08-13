@extends('admin.layouts.index')
@section('content')
<div class="page-content">
		<div class="container-fluid">
			<header class="section-header">
				<div class="tbl">
					@include('admin.message.notifications')
					<div class="tbl-row">
						<div class="tbl-cell">
							<h2>Places</h2>
							<a href="{{route('place.create')}}" class="btn btn-rounded btn-inline btn-success">Create</a>
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
							<th>Image</th>
							<th>Latitude</th>
							<th>Longitude</th>
							<th>Created_at</th>
							<th>Updated_at</th>
							<th>Action</th>
						</tr>
						</thead>
						<tbody>
							@foreach($places  as $place)
							<tr>
								<td>{{$place->name}}</td>
								<td>
									<img height="50px;" width="100px;" src="{{url('public/admin/image_place'.'/'.$place->image)}}">
								</td>
								<td>{{$place->latitude}}</td>
								<td>{{$place->longitude}}</td>
								<td>{{$place->created_at}}</td>
								<td>{{$place->updated_at}}</td>
								<td>
									{!! Form::open(
										[
											'route' =>['place.destroy',$place->id],
											'method'=>'DELETE',
											'name'	=>'frm',
											'id' => 'FormDeleteTime',
											'onsubmit' => 'return ConfirmDelete()'
										]
									) !!}
									<a  class="btn  btn-inline btn-primary" role="button" href="{{route('place.edit',$place->id)}}">Edit</a>
									<a data-toggle="modal" data-target="#myModal"  class="btn  btn-inline btn-success" role="button" onclick="ajax_show({{$place->id}})" >Show</a>
									<button style="float: left" type="submit" class="btn  btn-inline btn-danger" >Delete</button>
									{!! Form::close() !!}
								</td>
							@endforeach
						</tbody>
					</table>
				</div>
			</section>
		</div><!--.container-fluid-->
	</div>

	<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div style="margin-left: -200px;margin-top: -29px;
    margin-right: -200px;background-color: #eceff4;padding-left: 100px;padding-top: 50px;" class="modal-content" id="content">
        
      </div>
      
    </div>
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
<!-- ajax show a place-->
@section('script')
	<script type="text/javascript">
		function ajax_show(id){
			$.ajax({
				url : 'place/'+id,
				type : "get",
				data :{},
				dataType:"text",
				success : function (data)
				{
					$('#content').html(data);
				}

			});
		}
	</script>
<!--/ajax show a place-->

@endsection
