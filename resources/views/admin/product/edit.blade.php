
@extends('layouts.admin')

@section('title')
    <title>Product Edit</title>
@endsection
@section('css')
<link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('admins/product/index/list.css')}}">
@endsection

@section('content')

<div class="content-wrapper">
    @include('partials.content-header',['name'=>'Product','key'=>'Edit'])
    <div class="content">
      <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('product.update',['id'=>$product->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Product name</label>
                            <input type="text" class="form-control" name="name"  placeholder="Enter product name" value="{{$product->name}}">
                            <small id="emailHelp" class="form-text text-muted"> </small>
                        </div>
                        <div class="form-group">
                            <label>price Product </label>
                            <input type="text" class="form-control" name="price" placeholder="Enter Price product" value="{{$product->price}}">
                            
                        </div>
                        <div class="form-group">
                            <label>Avata </label>
                            <input type="file" class="form-control-file" name="feuture_image_path" ></br>
                            <div class="row"><img class="product_image_150_100" src="{{$product->feuture_image_path}}"></div>
                            
                        </div>
                        <div class="form-group">
                            <label>detail image</label> 
                            <input type="file" class="form-control-file" name="image_path[]" multiple></br>
                            
                            <div class="col-md-12">
                                <div class="row">
                                    @foreach ($product->productImageDetail as $imageDetail)
                                        <div class="col-md-3">
                                                <img class="form-control-file" src="{{$imageDetail->image_path}}" alt="">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">content product</label>
                            <textarea class="form-control tinymce_editor_init" name="content" id="exampleFormControlTextarea1" rows="3" >{{$product->content}}</textarea>
                        </div>
                        
                        <div class="form-group">
                            <label>ID category </label>
                            <select class="form-control" name="category_id">
                                <option value="$product->category_id" selected>{{$category->name}}</option>
                                {!! $html !!}
                            </select>
                            
                        </div>
                            <div class="form-group">
                            <label>enter tags product </label>
                            <select name="tag[]" class="form-control tags_select_choose" multiple="multiple">
                            @foreach ($product->tag as $tagItem)
                                <option value="{{$tagItem->name}}" selected>{{$tagItem->name}}</option>
                            @endforeach
                            </select>
                        </div>
                                               
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
      </div>
    </div>
</div>

@endsection

@section('js')
    <script src={{asset('vendor/select2/select2.min.js') }}></script>
    <script src={{asset('admins/product/add/add.js') }}></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>


    <script>
        $(function(){
            $(".tags_select_choose").select2({
                tags: true,
                tokenSeparators: [',', ' ']
            })
            $(".select2_init").select2({
                placeholder: "Select category",
                allowClear: true
            })
        })
    </script>
@endsection