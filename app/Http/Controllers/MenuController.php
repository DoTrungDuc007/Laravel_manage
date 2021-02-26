<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MenuAddRequest;
use App\Menu;
class MenuController extends Controller
{
    private $menu;
    public function __construct(Menu $menu)
    {
        $this->menu=$menu;
    }
    public function index()
    {
        $menus=$this->menu->latest()->paginate(5);
        return view('admin.menu.index',compact('menus'));
    }
    public function create()
    {
        return view('admin.menu.add');
    }
    public function store(MenuAddRequest $request)
    {
        $this->menu->create([
            'name'=>$request->name,
            'parent_id'=>$request->parent_id
        ]);
        return redirect()->route('menus.index');
    }
    public function edit($id)
    {
        $menu=$this->menu->find($id);
        return view('admin.menu.edit', compact('menu'));
    }
    public function update($id,Request $request)
    {
        $menu=$this->menu->find($id)->update([
                'name'=>$request->name,
                'parent_id'=>$request->parent_id
        ]);
        return redirect()->route('menus.index');
    }
    public function delete($id)
    {
        try
        {
            $this->menu->find($id)->delete();
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
//        $this->menu->find($id)->delete();
//        return redirect()->route('menus.index');
    }
}
