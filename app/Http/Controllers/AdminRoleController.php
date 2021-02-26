<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;
use App\Role;
use Illuminate\Support\Facades\Config;
use phpDocumentor\Reflection\DocBlock\Description;

class AdminRoleController extends Controller
{
    private $role;
    private $permission;
    public function __construct(Role $role, Permission $permission)
    {
        $this->role=$role;
        $this->permission=$permission;
    }
    public  function index()
    {
        $roles=$this->role->latest()->paginate(5);
        return view('admin.role.index',compact('roles'));
    }
    public  function create()
    {
        $permission=$this->permission->where('parent_id',0)->get();
        return view('admin.role.add',compact('permission'));
    }
    public function store(Request $request)
    {
        $role=$this->role->create([
           'name'=>$request->name,
            'display_name'=>$request->display_name
        ]);
        $role->permission()->attach($request->permission_id);
        return redirect()->route('role.index');
    }
    public  function edit($id)
    {
        $permission=$this->permission->where('parent_id',0)->get();
        $role=$this->role->find($id);
        $permissionsChecked=$role->permission;
        return view('admin.role.edit',compact('permission','role','permissionsChecked'));
    }
    public  function  update(Request $request,$id)
    {
        $role=$this->role->find($id);
        $role->update([
            'name'=>$request->name,
            'display_name'=>$request->display_name
        ]);

        $role->permission()->sync($request->permission_id);
        return redirect()->route('role.index');
    }
    public function delete ($id)
    {
        try {
            //code...
            $this->role->find($id)->delete();
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
//        $this->role->find($id)->delete();
//        return redirect()->route('role.index');
    }


}
