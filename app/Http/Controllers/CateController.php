<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Cate;
use Validator;
use DB;
class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cates = Cate::all();
        return view('admin.cates.index',['cates'=>$cates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cates.create');
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
                'name.min'               => 'Tên không được it hơn 3 kí tự',
                'name.max'               => 'Tên không được quá 191 kí tự',
                'name.unique'            => 'Tên đã tồn tại',
                'latitude.required'      => 'Latitude không được để trống',
                'latitude.min'           => 'Latitude không được it hơn 3 kí tự',
                'latitude.max'           => 'Latitude không được quá 20 kí tự',
                'latitude.unique'        => 'Latitude đã tồn tại',
                'longitude.required'     => 'longitude không được để trống',
                'longitude.min'          => 'longitude không được it hơn 3 kí tự',
                'longitude.max'          => 'longitude không được quá 20 kí tự',
                'longitude.unique'       => 'longitude đã tồn tại',
                'zoom.required'     => 'zoom không được để trống',
                'zoom.min'          => 'zoom không được it hơn 1 kí tự',
                'zoom.max'          => 'zoom không được quá 2 kí tự',
            ];        
            $validator = Validator::make($data,
                [
                    'name'          =>  'required|min:3|max:191|unique:cates,name',
                    'latitude'      =>  'required|min:3|max:20|unique:cates,latitude',
                    'longitude'     =>  'required|min:3|max:20|unique:cates,longitude',
                    'zoom'          =>  'required|min:1|max:2',
                ],$message);
            if ($validator->fails())
            {
                return redirect()->back()->withInput($data)->withErrors($validator);
            }

            $partern = '/^([0-9]{1,4})+\.([0-9]{4,6})$/';
            // check Regular for latitude
            if (!preg_match($partern,$data['latitude']))
            {
                return redirect(route('cate.create'))->with('regular','Latitude không đúng định dạng ví dụ : 10.8333');
            }
            // check Regular for longitude
            if (!preg_match($partern,$data['longitude']))
            {
                return redirect(route('cate.create'))->with('regular','Longitude không đúng định dạng ví dụ : 105.85000');
            }
            // check latitude in Viet Nam
            $latEpl = explode('.',$data['latitude']);
            if ((int)$latEpl[0]>30)
            {
                return redirect(route('cate.create'))->with('regular','Latitude không đúng vị trí tại Việt Nam : từ 2 đến 30 (trước đấu .) ');
            }
            if ((int)$latEpl[1]>120000) {
                return redirect(route('cate.create'))->with('regular','Latitude không đúng vị trí tại Việt Nam : từ 0 đến 120000 ( sau dấu .) ');
            }
            // check longitude in Viet Nam
            $longEpl = explode('.',$data['longitude']);
            if ((int)$longEpl[0]>120 || (int)$longEpl[0]<100 )
            {
                return redirect(route('cate.create'))->with('regular','Longitude không đúng vị trí tại Việt Nam : từ 100 đến 120 (trước đấu .) ');
            }
            if ((int)$longEpl[1]>120000) {
                return redirect(route('cate.create'))->with('regular','Longitude không đúng vị trí tại Việt Nam : từ 0 đến 120000 ( sau dấu .) ');
            }

            // return alias with changeTutle function
            $data['alias'] = changeTitle($data['name']);
            Cate::create($data);
            DB::commit();
            Session()->flash('success', 'Created success fully');
            return redirect(route('cate.index'))->with('notification','created success fully');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cate = Cate::find($id);
        return view('admin.cates.edit',['cate'=>$cate]);
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
        $cate =Cate::find($id);
        $data = $request->all();
        unset($data['_token']);
        DB::beginTransaction();
        try
        {
            $message = 
            [
                'name.required'     => 'Tên không được để trống',
                'name.min'          => 'Tên không được ít hơn 3 kí tự',
                'name.max'          => 'Tên không được quá 191 kí tự',
                'latitude.required'     => 'Latitude không được để trống',
                'latitude.min'          => 'Latitude không được ít hơn 3 kí tự',
                'latitude.max'          => 'Latitude không được quá 20 kí tự',
                'longitude.required'     => 'longitude không được để trống',
                'longitude.min'          => 'longitude không được ít hơn 3 kí tự',
                'longitude.max'          => 'longitude không được quá 20 kí tự',
                'zoome.required'     => 'zoome không được để trống',
                'zoome.min'          => 'zoome không được ít hơn 1 kí tự',
                'zoome.max'          => 'zoome không được quá 2 kí tự',
                

            ];        
            $validator = Validator::make($data,
                [
                    
                    'name'          => 'required|min:3|max:191|unique:cates,name,'.$cate->id,
                    'latitude'      =>  'required|min:3|max:20|unique:cates,latitude,'.$cate->id,
                    'longitude'     =>  'required|min:3|max:20|unique:cates,longitude,'.$cate->id,
                    'zoom'          =>  'required|min:1|max:2',
                ],$message);
            if ($validator->fails())
            {
                return redirect()->back()->withInput($data)->withErrors($validator);
            }
            $partern = '/^([0-9]{1,4})+\.([0-9]{4,6})$/';
            // check Regular for latitude
            if (!preg_match($partern,$data['latitude']))
            {
                return redirect(route('cate.create'))->with('regular','Latitude không đúng định dạng ví dụ : 10.8333');
            }
            // check Regular for longitude
            if (!preg_match($partern,$data['longitude']))
            {
                return redirect(route('cate.create'))->with('regular','Longitude không đúng định dạng ví dụ : 105.85000');
            }
            // check latitude in Viet Nam
            $latEpl = explode('.',$data['latitude']);
            if ((int)$latEpl[0]>30)
            {
                return redirect(route('cate.create'))->with('regular','Latitude không đúng vị trí tại Việt Nam : từ 2 đến 30 (trước đấu .) ');
            }
            if ((int)$latEpl[1]>120000) {
                return redirect(route('cate.create'))->with('regular','Latitude không đúng vị trí tại Việt Nam : từ 0 đến 120000 ( sau dấu .) ');
            }
            // check longitude in Viet Nam
            $longEpl = explode('.',$data['longitude']);
            if ((int)$longEpl[0]>120 || (int)$longEpl[0]<100 )
            {
                return redirect(route('cate.create'))->with('regular','Longitude không đúng vị trí tại Việt Nam : từ 100 đến 120 (trước đấu .) ');
            }
            if ((int)$longEpl[1]>120000) {
                return redirect(route('cate.create'))->with('regular','Longitude không đúng vị trí tại Việt Nam : từ 0 đến 120000 ( sau dấu .) ');
            }
            // return alias with changeTutle function
            $data['alias'] = changeTitle($data['name']);
            $cate->update($data);
            DB::commit();
            Session()->flash('success', 'updated success fully');
            return redirect(route('cate.index'));
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
        Cate::find($id)->delete();
        Session()->flash('success', 'Deleted success fully');
        return redirect(route('cate.index'));
    }
}
