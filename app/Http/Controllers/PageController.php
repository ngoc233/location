<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Cate;
use App\Place;
use App\User;

class PageController extends Controller
{
    
    public function __construct()
    {
    	$cates = Cate::all();
	    $places = Place::all();
	    $users  = User::all();
	    $arrays = array('cates' =>$cates ,'places'=>$places,'users'=>$users);
	    view()->share('arrays',$arrays);
    }
    public function index()
    {
        return view('user.index');
    }
    public function content($id)
    {
        $cate = Cate::find($id);
        return view('user.content',['cate'=>$cate]);
    }
    public function ajax()
    {
        $tphcm = DB::table('cates')->where('alias','mien-nam')->first();
        return view('user.ajax_index',['tphcm'=>$tphcm]);
    }

}
