<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryAddRequest;

class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
            $this->category=$category;
    }
    public function create()
    {

        return view('admin.category.add');
    }
    public function index()
    {
        $categories=$this->category->latest()->paginate(5);
        return view('admin.category.index',compact('categories'));
    }
    public function store(CategoryAddRequest $request)
    {
       $this->category->create([
            'name'=>$request->name,
            'description'=>$request->description
       ]);
       return redirect()->route('categories.index');

    }
    public function edit($id)
    {
        $category=$this->category->find($id);
        return view('admin.category.edit',compact('category'));
    }
    public function update($id,Request $request)
    {
       $this->category->find($id)->update([
            'name'=>$request->name,
            'description'=>$request->description
       ]);
       return redirect()->route('categories.index');

    }
    public function delete($id)
     {
         try
         {
             $this->category->find($id)->delete();
             return response()->json([
                 'code'=>200,
                 'massage'=>'success'
             ] , 200 );
         }catch (Exception $exception) {
             Log::error('message:'.$exception->getMessage()."line : ".$exception->getLine());
             return response()->json([
                 'code'=>500,
                 'message'=>'fail'
             ], 500 );
         }
//        $this->category->find($id)->delete();
//        return redirect()->route('categories.index');
     }

}
