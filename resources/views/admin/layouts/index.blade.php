<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>StartUI - Premium Bootstrap 4 Admin Dashboard Template</title>

	<link href="{{ url('public/admin/img/favicon.144x144.png')}}" rel="apple-touch-icon" type="image/png" sizes="144x144">
	<link href="{{ url('public/admin/img/favicon.114x114.png')}}" rel="apple-touch-icon" type="image/png" sizes="114x114">
	<link href="{{ url('public/admin/img/favicon.72x72.png')}}" rel="apple-touch-icon" type="image/png" sizes="72x72">
	<link href="{{ url('public/admin/img/favicon.57x57.png')}}" rel="apple-touch-icon" type="image/png">
	<link href="{{ url('public/admin/img/favicon.png')}}" rel="icon" type="image/png">
	<link href="{{ url('public/admin/img/favicon.ico')}}" rel="shortcut icon">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
<link rel="stylesheet" href="{{ url('public/admin/css/lib/datatables-net/datatables.min.css')}}">
<link rel="stylesheet" href="{{ url('public/admin/css/separate/vendor/datatables-net.min.css')}}">
    <link rel="stylesheet" href="{{ url('public/admin/css/lib/font-awesome/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ url('public/admin/css/lib/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ url('public/admin/css/main.css')}}">
   
</head>
<body class="with-side-menu">

	<!-- site header -->
	@include('admin.layouts.side_header')
	<!--/site header-->

	<div class="mobile-menu-left-overlay"></div>
	@include('admin.layouts.side_menu')
	<!--.page content-->
	@yield('content')
	<!--/page content -->

	<script src="{{url('public/admin/js/lib/jquery/jquery.min.js')}}"></script>
	<script src="{{url('public/admin/js/lib/tether/tether.min.js')}}"></script>
	<script src="{{url('public/admin/js/lib/bootstrap/bootstrap.min.js')}}"></script>
	<script src="{{url('public/admin/js/plugins.js')}}"></script>
	

	<script src="{{url('public/admin/js/lib/datatables-net/datatables.min.js')}}"></script>
	<script>
		$(function() {
			$('#example').DataTable({
				autoFill: true
			});
		});
	</script>
	<script type="text/javascript">
    $(document).ready(function()
    {
      $('#notification').fadeIn(1).delay(1000).fadeOut(3000);
    });
    
	  function myFunction() {
	    $conf = confirm("You sure??");
	    if ($conf == true)
	    {
	    	document.frm.action  ="http://localhost/webgame/admin/menu/2";
	    	document.frm.submit();
	    }
	    else
	    {
	    	document.frm.method  = "GET";
	    	document.frm.action  ="http://localhost/webgame/admin/menu";
	    	document.frm.submit();
	    }
	}
  	</script>
	<script src="{{url('public/admin/js/app.js')}}"></script>
	

	@yield('script');
	
</body>
</html>