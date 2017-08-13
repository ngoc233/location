<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\User;
use Validator;
use DB;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
                'email.required'          => 'Email không được để trống',
                'email.min'               => 'Email không được it hơn 3 kí tự',
                'email.max'               => 'Email không được quá 191 kí tự',
                'email.email'              =>'Email không đúng định dạng',
                'email.unique'              =>'Email đã tồn tại',
                'password.required'          => 'Mật khẩu không được để trống',
                'password.min'               => 'Mật khẩu không được it hơn 6 kí tự',
                'password.max'               => 'Mật khẩu không được quá 30 kí tự',

            ];        
            $validator = Validator::make($data,
                [
                    'name'          =>  'required|min:3|max:191',
                    'email'          =>  'required|min:3|max:191|unique:users,name|email',
                    'password'          =>  'required|min:6|max:30',
                ],$message);
            if ($validator->fails())
            {
                return redirect()->back()->withInput($data)->withErrors($validator);
            }
            $data['password'] = bcrypt($request->password);
            User::create($data);
            DB::commit();
            Session()->flash('success', 'Created success fully');
        return redirect(route('user.index'))->with('notification','created success fully');
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
        $user = User::find($id);
        return view('admin.users.edit',['user'=>$user]);
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
        unset($data['_token']);
        DB::beginTransaction();
        try
        {
            $message = 
            [
                
                'name.required'          => 'Tên không được để trống',
                'name.min'               => 'Tên không được it hơn 3 kí tự',
                'name.max'               => 'Tên không được quá 191 kí tự',
                'email.required'          => 'Email không được để trống',
                'email.min'               => 'Email không được it hơn 3 kí tự',
                'email.max'               => 'Email không được quá 191 kí tự',
                'email.email'              =>'Email không đúng định dạng',
                'password.required'          => 'Mật khẩu không được để trống',
                'password.min'               => 'Mật khẩu không được it hơn 6 kí tự',
                'password.max'               => 'Mật khẩu không được quá 30 kí tự',
                

            ];        
            $validator = Validator::make($data,
                [
                    
                    'name'          =>  'required|min:3|max:191',
                    'email'          =>  'required|min:3|max:191|email|unique:users,email,'.$id,
                    'password'          =>  'required|min:6|max:30',
                ],$message);
            if ($validator->fails())
            {
                return redirect()->back()->withInput($data)->withErrors($validator);
            }
            $data['password'] = bcrypt($request->password);
            User::find($id)->update($data);
            DB::commit();
            Session()->flash('success', 'updated success fully');
            return redirect(route('user.index'));
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
        User::find($id)->delete();
        Session()->flash('success', 'Deleted success fully');
        return redirect(route('user.index'));
    }
}
