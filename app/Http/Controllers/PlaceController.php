<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Place;
use App\Cate;
use Validator;
use DB;
use App\Type;
class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places = Place::all();
        return view('admin.places.index',['places'=>$places]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $types = Type::all();
        $cates = Cate::all();
        return view('admin.places.create',['cates'=>$cates,'types'=>$types]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        DB::beginTransaction();
        try
        {
            $message = 
            [
                'name.required'          => 'Tên không được để trống',
                'name.min'               => 'Tên không được lớn hơn 3 kí tự',
                'name.max'               => 'Tên không được quá 191 kí tự',
                'name.unique'            => 'Tên đã tồn tại',
                'latitude.required'      => 'Latitude không được để trống',
                'latitude.min'           => 'Latitude không được lớn hơn 3 kí tự',
                'latitude.max'           => 'Latitude không được quá 20 kí tự',
                'latitude.unique'        => 'Latitude đã tồn tại',
                'longitude.required'     => 'longitude không được để trống',
                'longitude.min'          => 'longitude không được lớn hơn 3 kí tự',
                'longitude.max'          => 'longitude không được quá 20 kí tự',
                'longitude.unique'       => 'longitude đã tồn tại',

            ];        
            $validator = Validator::make($data,
                [
                    'name'          =>  'required|min:3|max:191|unique:places,name',
                    'latitude'      =>  'required|min:3|max:20|unique:places,latitude',
                    'longitude'     =>  'required|min:3|max:20|unique:places,longitude',
                    'image'         =>  'mimes:jpeg,bmp,png',
                ],$message);
            if ($validator->fails())
            {
                return redirect()->back()->withInput($data)->withErrors($validator);
            }
            // check hasfile
            if($request->hasFile('image'))
            {
                $file = $request->file('image');
                $last_file = $file->getClientOriginalExtension();
                // if($last_file != "jpg" && $last_file != "png" && $last_file !="jpeg"){
                //     return redirect("route('palce/create')")->with('errors','file chọn không phải là ảnh');
                // }
                $file_name = $file->getClientOriginalName();
                $image = str_random(10)."-".$file_name;
                // save iamge for folder image_place
                $file->move("public/admin/image_place",$image);
                    $data['image'] = $image;
            }
            else
            {
                $data['image'] = "Null";
            }
            $partern = '/^([0-9]{1,4})+\.([0-9]{4,6})$/';
            // check Regular for latitude
            if (!preg_match($partern,$data['latitude']))
            {
                return redirect(route('place.create'))->with('regular','Latitude không đúng định dạng ví dụ : 10.8333');
            }
            // check Regular for longitude
            if (!preg_match($partern,$data['longitude']))
            {
                return redirect(route('place.create'))->with('regular','Longitude không đúng định dạng ví dụ : 105.85000');
            }
            // check latitude in Viet Nam
            $latEpl = explode('.',$data['latitude']);
            if ((int)$latEpl[0]>30)
            {
                return redirect(route('place.create'))->with('regular','Latitude không đúng vị trí tại Việt Nam : từ 2 đến 30 (trước đấu .) ');
            }
            if ((int)$latEpl[1]>2000000) {
                return redirect(route('place.create'))->with('regular','Latitude không đúng vị trí tại Việt Nam : từ 0 đến 2000000 ( sau dấu .) ');
            }
            // check longitude in Viet Nam
            $longEpl = explode('.',$data['longitude']);
            if ((int)$longEpl[0]>120 || (int)$longEpl[0]<100 )
            {
                return redirect(route('place.create'))->with('regular','Longitude không đúng vị trí tại Việt Nam : từ 100 đến 120 (trước đấu .) ');
            }
            if ((int)$longEpl[1]>200000) {
                return redirect(route('place.create'))->with('regular','Longitude không đúng vị trí tại Việt Nam : từ 0 đến 200000 ( sau dấu .) ');
            }
            // take alias with changeTutle function 
            $data['alias'] = changeTitle($data['name']);
            Place::create($data);
            DB::commit();
            Session()->flash('success', 'Created success fully');
            return redirect(route('place.index'))->with('notification','created success fully');
        }
        catch (Exception $e)
        {
            DB::rollback();
            response()->json([
                    'error' => true,
                    'message' => 'Internal Server Error'
                ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $place = Place::find($id);
        return view('admin.places.show',['place'=>$place]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $place = Place::find($id);
        $cates =  Cate::all();
        $types = Type::all();
        return view('admin.places.edit',['place'=>$place,'cates'=>$cates,'types'=>$types]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $place = Place::find($id);
        unset($data['_token']);
        DB::beginTransaction();
        try
        {
            $message = 
            [
                'name.unique'       => 'Tên đã tồn tại',
                'name.required'     => 'Tên không được để trống',
                'name.min'          => 'Tên không được lớn hơn 3 kí tự',
                'name.max'          => 'Tên không được quá 191 kí tự',

                

            ];        
            $validator = Validator::make($data,
                [
                    'name'          => 'required|min:3|max:191|unique:places,name,'.$place->id,
                    
                ],$message);
            if ($validator->fails())
            {
                return redirect()->back()->withInput($data)->withErrors($validator);
            }
            // check hasfile
            if($request->hasFile('image'))
            {
                $file = $request->file('image');
                $last_file = $file->getClientOriginalExtension();
                // check last file 
                if($last_file != "jpg" && $last_file != "png" && $last_file !="jpeg"){
                    return redirect("route('place.index')")->with('errors','file bạn thêm không phải là ảnh');
                }
                $file_name = $file->getClientOriginalName();
                // take file name
                $image = str_random(10)."-".$file_name;
                //check exist image in folder image_place 
                while (file_exists("public/admin/image_place/".$image)) 
                {
                    $image = str_random(10)."-".$file_name;
                }
                // save image to folder image_place
                $file->move("public/admin/image_place",$image);
                $data['image'] = $image;    
                if($place->image != "Null")
                {
                    unlink("public/admin/image_place/".$place->image);
                }
                else
                {

                }
                
            }
            else
            {
                // do not something
            } 
            $partern = '/^([0-9]{1,4})+\.([0-9]{4,6})$/';
            // check Regular for latitude
            if (!preg_match($partern,$data['latitude']))
            {
                return redirect(route('place.create'))->with('regular','Latitude không đúng định dạng ví dụ : 10.8333');
            }
            // check Regular for longitude
            if (!preg_match($partern,$data['longitude']))
            {
                return redirect(route('place.create'))->with('regular','Longitude không đúng định dạng ví dụ : 105.85000');
            }
            // check latitude in Viet Nam
            $latEpl = explode('.',$data['latitude']);
            if ((int)$latEpl[0]>30)
            {
                return redirect(route('place.create'))->with('regular','Latitude không đúng vị trí tại Việt Nam : từ 2 đến 30 (trước đấu .) ');
            }
            if ((int)$latEpl[1]>120000) {
                return redirect(route('place.create'))->with('regular','Latitude không đúng vị trí tại Việt Nam : từ 0 đến 120000 ( sau dấu .) ');
            }
            // check longitude in Viet Nam
            $longEpl = explode('.',$data['longitude']);
            if ((int)$longEpl[0]>120 || (int)$longEpl[0]<100 )
            {
                return redirect(route('place.create'))->with('regular','Longitude không đúng vị trí tại Việt Nam : từ 100 đến 120 (trước đấu .) ');
            }
            if ((int)$longEpl[1]>120000) {
                return redirect(route('place.create'))->with('regular','Longitude không đúng vị trí tại Việt Nam : từ 0 đến 120000 ( sau dấu .) ');
            }
            // return alias with changeTutle function
            $data['alias'] = changeTitle($data['name']);
            $place->update($data);
            DB::commit();
            Session()->flash('success', 'Updated success fully');
            return redirect(route('place.index'));
        }
        catch (Exception $e)
        {
            DB::rollback();
            response()->json([
                    'error' => true,
                    'message' => 'Internal Server Error'
                ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $place = Place::find($id);
        if($place->image != "Null")
            {
                unlink("public/admin/image_place/".$place->image);
            }
        $place->delete();
        Session()->flash('success','Deleted success fully');
        return redirect(route('place.index'));
    }
}
