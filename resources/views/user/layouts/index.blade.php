<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        
        <title>Location</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!--icon marker -->
        <link rel="stylesheet" type="text/css" href="{{url('public/home/icon/dist/css/map-icons.css')}}">
        <!--/iconmarker -->
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" type="text/css" href="{{url('public/home/css/font-awesome.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('public/home/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{url('public/home/css/normalize.css')}}">
        <link rel="stylesheet" href="{{url('public/home/css/main.css')}}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="{{url('public/home/js/vendor/modernizr-2.8.3.min.js')}}"></script>
        <script src="{{url('public/home/js/vendor/jquery-1.12.0.min.js')}}"></script>
        <!-- iconmarker-->
        <script src="{{url('public/home/icon/dist/js/map-icons.js')}}"></script>
        <!--/iconmarker-->
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- nav-->
       	@include('user.layouts.nav')
        <!--/nav-->
        <!-- carousel-->
      	@include('user.layouts.carousel')
        <!--/carousel-->

        <!-- album-->
        @include('user.layouts.album')
        <!--/album-->
        <div class="container">
        <!-- cate-->
        @include('user.layouts.cate')
        <!--/cate-->
        <!-- content-->
        <div id="content">
      	 @yield('content')
        </div>
        <!--/content-->

        <!-- note-->
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-0 col-xs-0 col-lg-12">
                    <h3>Chú thích</h3>
                    <img src="https://maps.gstatic.com/mapfiles/ms2/micons/tree.png"> <span class="note"><b>: Rừng núi</b></span>
                    <img src="https://maps.gstatic.com/mapfiles/ms2/micons/rangerstation.png"> <span class="note"><b>: Thủ Đô</b></span>
                    <img src="https://maps.gstatic.com/mapfiles/ms2/micons/sailing.png"> <span class="note"><b>: Biển - Sông Nước</b></span>
                    <img src="https://maps.gstatic.com/mapfiles/ms2/micons/homegardenbusiness.png"> <span class="note"><b>: Thành PHố</b></span>
                    <img src="https://maps.gstatic.com/mapfiles/ms2/micons/blue-dot.png"> <span class="note"><b>: Khác (tỉnh,huyện,xã...)</b></span>

                </div>
            </div>
        </div>
        <!--/note-->

        <!-- footer-->
        <div class="container-fluid">
            <div class="row">
                <div id="fotter" class="col-md-12 col-sm-0 col-xs-0 col-lg-12">
                    Bản quyển thuộc về Nguyễn Đại Ngọc Uneti
                </div>
            </div>
        </div>
        <!--/footer-->

        
        <!-- Add your site or application content here -->
        <script src="{{url('public/home/js/jquery-3.2.1.min.js')}}"></script>
        <script src="{{url('public/home/js/bootstrap.min.js')}}"></script>
        <script src="{{url('public/home/js/plugins.js')}}"></script>
        <script src="{{url('public/home/js/main.js')}}"></script>
        <script src="{{url('public/home/js/isotope.pkgd.min.js')}}"></script>

        <script type="text/javascript">
            $('.grid').isotope({
                // set itemSelector so .grid-sizer is not used in layout
                itemSelector: '.grid-item',
                percentPosition: true,
                masonry: {
                // use element for option
                columnWidth: '.grid-sizer'
            }
             })
        </script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
        <!-- nav-croll-->
        <script type="text/javascript">
            $(document).ready(function(){       
            var scroll_start = 0;
            var startchange = $('#nav');
            var offset = startchange.offset();
            if (startchange.length){
            $(document).scroll(function() { 
                    scroll_start = $(this).scrollTop();
                    if(scroll_start > offset.top) {
                       $(".navbar").css('background-color', 'rgba(0, 170, 131, 0.60)');
                    }
                    else if (scroll_start == 0)
                    {
                        $(".navbar").css('background-color', 'rgba(76, 175, 80, 0.0)');
                    }   
                    else
                    {
                       $('.navbar').css('background-color', 'rgba(0, 170, 131, 0.64))');
                    }
                });
            }

        });
        </script>
        <!--/nav-scroll-->
        <!-- ajax-map-->
        <script type="text/javascript">
            function ajax_map(id)
            {
                $.ajax({
                        url : "cate/"+id,
                        type : "get",
                        data : {
                        },
                        dataType:"text",
                        success : function (data){
                            $('#content').html(data);
                        }
                    });   
            }
        </script>
        <!--/ajax-map-->
        <!-- ajax-all-map-->
        <script type="text/javascript">
            function ajax_all_map()
            {
                $.ajax({
                        url : "cateAjax",
                        type : "get",
                        data : {
                        },
                        dataType:"text",
                        success : function (data){
                            $('#content').html(data);
                        }
                    });   
            }
        </script>
        <!--/ajax-all-map-->
    </body>
</html>

