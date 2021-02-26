<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\components\Recusive;
use App\Category;
use App\Product;
use App\ProductTag;
use App\Tag;
use App\ProductImage;
use Storage;
use App\Traits\StorageImageTrait;
use App\Http\Controllers\Log;
use DB;
use App\Http\Requests\ProductAddRequest;


class AdminProductController extends Controller
{
    use StorageImageTrait;
    private $product;
    private $productImage;
    private $tag;
    private $productTag;
    public function __construct(Product $product,ProductImage $productImage,Tag $tag, ProductTag $productTag)
    {
        $this->product=$product;
        $this->productImage=$productImage;
        $this->tag=$tag;
        $this->productTag=$productTag;
    }
    public function index()
    {
        $products=$this->product->latest()->paginate(5);
        return view('admin.product.index',compact('products'));
    }
    public function creat()
    {
        $data=Category::all();
        $html="";
        foreach($data as $value)
        {
            $html .="<option value=".$value['id'].">".$value['name']."</option>";
        }

        return view('admin.product.add',compact('html'));
    }
    public function store(ProductAddRequest $request)
    {

        try {

            DB::beginTransaction();
            $dataProduct= [
                'name'=>$request->name,
                'price'=>$request->price,   
                'content'=>$request->content,
                'user_id'=>auth()->id(),
                'category_id'=>$request->category_id,
            ];
            $data=$this->storageTraitUpload($request,'feuture_image_path','product');
            if(!empty($data))
            {
                $dataProduct['feuture_image_name']=$data['fileName'];
                $dataProduct['feuture_image_path']=$data['filePath'];
            }
            $product=$this->product->create($dataProduct);
            //insert_into table_product_images
            if($request->hasFile('image_path'))
            {
                foreach($request->image_path as $fileItem)
                {
                    $dataProductImageDetail=$this->storageTraitUploadMutiple($fileItem,'product');
                    $product->image()->create([
                        'image_path'=>$dataProductImageDetail['filePath'],
                        'image_name'=>$dataProductImageDetail['fileName']
                    ]);
                }
            }
            //insert_into table_product_tags
            foreach($request->tag as $tagItem)
            {
                $tagnew=$this->tag->firstOrCreate(['name'=>$tagItem]);
                $tagID[]=$tagnew->id;
            }
            $product->tag()->attach($tagID);
            DB::commit();

            return redirect()->route('product.index');
        } catch (\Exception $exception) {

            DB::rollback();

            Log::error('message:'.$exception->getMessage()."line : ".$exception->getLine());

        }


    }
    public function edit($id)
    {
        $product=$this->product->find($id);
        $data=Category::all();
        $html="";
        foreach($data as $value)
        {
            $html .="<option value=".$value['id'].">".$value['name']."</option>";
        }
        $category=Category::find($product->category_id);
        return view('admin.product.edit',compact('html','product','category'));

    }
    public function update(Request $request,$id)
    {
        try {

            DB::beginTransaction();
            $dataProductUpdate=[
                'name'=>$request->name,
                'price'=>$request->price,
                'content'=>$request->content,
                'user_id'=>auth()->id(),
                'category_id'=>$request->category_id,
            ];
            $data=$this->storageTraitUpload($request,'feuture_image_path','product');
            if(!empty($data))
            {
                $dataProductUpdate['feuture_image_name']=$data['fileName'];
                $dataProductUpdate['feuture_image_path']=$data['filePath'];
            }
            $this->product->find($id)->update($dataProductUpdate);
            $product=$this->product->find($id);
            //update table_product_images
            if($request->hasFile('image_path'))
            {
                $this->productImage->where('product_id',$id)->delete();
                foreach($request->image_path as $fileItem)
                {
                    $dataProductImageDetail=$this->storageTraitUploadMutiple($fileItem,'product');
                    $product->image()->create([
                        'image_path'=>$dataProductImageDetail['filePath'],
                        'image_name'=>$dataProductImageDetail['fileName']
                    ]);
                }
            }
            //update table_product_tags
            foreach($request->tag as $tagItem)
            {
                $tagnew=$this->tag->firstOrCreate(['name'=>$tagItem]);
                $tagID[]=$tagnew->id;
            }
            $product->tag()->sync($tagID);
            DB::commit();

            return redirect()->route('product.index');
        } catch (\Exception $exception) {

            DB::rollback();
            return redirect()->route('product.index');
            Log::error('message:'.$exception->getMessage()."line : ".$exception->getLine());

        }


    }
    public function delete($id)
    {
        try
        {
            $this->product->find($id)->delete();
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
    }
}
