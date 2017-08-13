<div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                    <label id="album">ALBUM</label>
                    <div class="grid">
                       <img class="grid-sizer">
                       @for($i=1;$i<=16;$i+=5)
                       <a href="#"><img class="grid-item grid-item--width2" src="{{url('public/home/img').'/img-demo-'.$i.'.jpg'}}"></a>
                       <a href="#"><img class="grid-item grid-item--height2" src="{{url('public/home/img').'/img-demo-'.($i+1).'.jpg'}}"></a>
                       <a href="#"><img class="grid-item" src="{{url('public/home/img').'/img-demo-'.($i+2).'.jpg'}}"></a>
                       <a href="#"><img class="grid-item" src="{{url('public/home/img').'/img-demo-'.($i+3).'.jpg'}}"></a>
                       <a href="#"><img class="grid-item grid-item--width2" src="{{url('public/home/img').'/img-demo-'.($i+4).'.jpg'}}"}}"></a>
                       @endfor
                       <a href="#"><img class="grid-item" src="{{url('public/home/img/img-demo-10.jpg')}}"></a>
                       <a href="#"><img class="grid-item" src="{{url('public/home/img/img-demo-11.jpg')}}"></a>
                       <a href="#"><img class="grid-item" src="{{url('public/home/img/img-demo-15.jpg')}}"></a> 
                    </div>
                </div>
            </div>
        </div>