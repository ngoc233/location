		<div>
			<b>Id</b>: 
			<span style="margin-left: 50px;">{{$place->id}}</span>
		</div>
		<br>
		<div >
			<b>Name</b>: <span style="margin-left: 50px;">{{$place->name}}</span>
		</div>
		<br>
		<div >
			<b>Alias</b>: <span style="margin-left: 50px;">{{$place->alias}}</span>
		</div>
		<br>
		<div >
			<b>Category</b>: <span style="margin-left: 50px;">{{$place->Cate->name}}</span>
		</div>
		<br>
		<div >
			<b>Type</b>: <span style="margin-left: 50px;">{{$place->Type->name}}</span>
		</div>
		<br>
		<div >
			<b>Latitude</b>: <span style="margin-left: 50px;">{{$place->latitude}}</span>
		</div>
		<br>
		<div >
			<b>Longitude</b>: <span style="margin-left: 50px;">{{$place->longitude}}</span>
		</div>
		<br>
		<div >
			<b>Created At</b>: <span style="margin-left: 50px;">{{$place->created_at}}</span>
		</div>
		<br>
		<div >
			<b>Updated At</b>: <span style="margin-left: 50px;">{{$place->updated_at}}</span>
		</div>
		<br>
		<div >
			<b>Image</b>: 
			<br>
			<span style="margin-left: 50px;"><img width="80%" src="{{url('public/admin/image_place'.'/'.$place->image)}}"></span>
		</div>
		<br>
