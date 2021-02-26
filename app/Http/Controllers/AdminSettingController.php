<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SettingAddRequest;
use App\Setting;

class AdminSettingController extends Controller
{
    private $setting;
    public function __construct(Setting $setting)
    {
        $this->setting=$setting;
    }
    public function index()
    {
        $settings=$this->setting->latest()->paginate(5);
        return view('admin.setting.index',compact('settings'));
    }
    public function create()
    {
        return view('admin.setting.add');
    }
    public function store(SettingAddRequest $request)
    {
        $this->setting->create([
            'config_key'=>$request->config_key,
            'config_value'=>$request->config_value,
            'type'=>$request->type
        ]);
        return redirect()->route('setting.index');
    }
    public function edit($id)
    {
        $setting=$this->setting->find($id);
        return view('admin.setting.edit',compact('setting'));
    }
    public function update($id,Request $request)
    {
        $this->setting->find($id)->update([
            'config_key'=>$request->config_key,
            'config_value'=>$request->config_value
        ]);
        return redirect()->route('setting.index');
    }
    public function delete($id)
    {
        try {
            //code...
            $this->setting->find($id)->delete();
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
        return redirect()->route('setting.index');
    }
}
