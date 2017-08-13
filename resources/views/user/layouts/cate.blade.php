<div id="cate">
            <ul>
              <li><button onclick="ajax_all_map()">Việt Nam</button></li>
              @foreach($arrays['cates'] as $cate)
              <li><button onclick="ajax_map({{$cate->id}})">{{$cate->name}}</button></li>
              @endforeach
            </ul>
        </div>