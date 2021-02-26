<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Log;
use App\User;
use App\Role;
use Hash;
use DB;
class AdminUserController extends Controller
{
    private $user;
    private $role;
    public function __construct(User $user,Role $role)
    {
        $this->user=$user;
        $this->role=$role;
    }
    public function index()
    {
        $users=$this->user->paginate(10);
        return view('admin.user.index',compact('users'));
    }
    public function create()
    {
        $roles=$this->role->all();
        return view('admin.user.add' , compact('roles'));
    }
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $user=$this->user->create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password)
            ]);
            $role_ids=$request->role_id;
            $user->roles()->attach($role_ids);
            DB::commit();
            return redirect()->route('user.index');
        } catch (\Exception $exception) {

            DB::rollback();

            Log::error('message:'.$exception->getMessage()."line : ".$exception->getLine());

        }
    }
    public function edit($id)
    {
        $user=$this->user->find($id);
        $roles=$this->role->all();
        return view('admin.user.edit',compact('roles','user'));
    }
    public function update($id,Request $request)
    {
        try {
            DB::beginTransaction();
           $this->user->find($id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password)
            ]);
            $user=$this->user->find($id);
            $role_ids=$request->role_id;
            $user->roles()->sync($role_ids);
            DB::commit();
            return redirect()->route('user.index');
        } catch (\Exception $exception) {

            DB::rollback();

            Log::error('message:'.$exception->getMessage()."line : ".$exception->getLine());

        }

    }
    public function delete($id)
    {
         try {
             //code...
             $this->user->find($id)->delete();
             return response()->json([
                 'code'=>200,
                 'message'=>'delete success'
             ], 200);


         } catch ( Exception $exception ) {
             //throw $th;
             Log::error('message:'.$exception->getMessage()."line : ".$exception->getLine());
             return response()->json([
                 'code'=> 500,
                 'message'=>'delete fail'
             ],500);
         }
        // return redirect()->route('user.index');
//        $this->user->find($id)->delete();
//        return redirect()->route('user.index');
    }

}
