<?php

namespace App\Http\Controllers;

use App\components\Recusive;
use Illuminate\Http\Request;
use App\Http\Requests\SliderAddRequest;
use App\Traits\StorageImageTrait;
use App\Slider;
use Storage;
use Illuminate\Support\Str;

class AdminSliderController extends Controller
{
    use StorageImageTrait;
    private $slider;
    public function __construct(Slider $slider)
    {
        $this->slider=$slider;
    }
    public function index()
    {
        $sliders=$this->slider->latest()->paginate(5);
        return view('admin.slider.index',compact('sliders'));
    }
    public function create()
    {
        return view('admin.slider.add');
    }
    public function store(SliderAddRequest $request)
    {
        $dataSlider=[
            'name'=>$request->name,
            'description'=>$request->description,
        ];
        $data=$this->storageTraitUpload($request,'image','slider');
        if(!empty($data))
        {
            $dataSlider['image_name']=$data['fileName'];
            $dataSlider['image_path']=$data['filePath'];
        }
        
        $this->slider->create($dataSlider);
        return redirect()->route('slider.index');
    }
    public function edit($id)
    {
        $slider=$this->slider->find($id);
        return view('admin.slider.edit',compact('slider'));
    }
    public function update($id,Request $request)
    {
        $dataSlider=[
            'name'=>$request->name,
            'description'=>$request->description
        ];
        $data=$this->storageTraitUpload($request,'image','slider');
        if(!empty($data))
        {
            $dataSlider['image_name']=$data['fileName'];
            $dataSlider['image_path']=$data['filePath'];
        }
        
        $slider=$this->slider->find($id)->update($dataSlider);
        return redirect()->route('slider.index');
    }
    public function delete($id)
    {
        try {
            //code...
            $this->slider->find($id)->delete();
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
    }
}
