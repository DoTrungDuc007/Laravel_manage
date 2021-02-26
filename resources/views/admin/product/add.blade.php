
@extends('layouts.admin')

@section('title')
    <title>Product Add</title>
@endsection
@section('css')
<link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" />

@endsection

@section('content')

<div class="content-wrapper">
    @include('partials.content-header',['name'=>'Product','key'=>'add'])
    
    <div class="content">
      <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Product name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"  placeholder="Enter product name" value="{{ old('name') }}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>price Product </label>
                            <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" placeholder="Enter Price product" value="{{ old('price') }}">
                            @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Avata </label>
                            <input type="file" class="form-control-file" name="feuture_image_path" >
                            
                        </div>
                        <div class="form-group">
                            <label>detail image</label>
                            <input type="file" class="form-control-file" name="image_path[]" multiple>
                            
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">content product</label>
                            <textarea class="form-control tinymce_editor_init @error('content') is-invalid @enderror" name="content" id="exampleFormControlTextarea1" rows="3">{{ old('content') }}</textarea>
                            @error('content')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label>ID category </label>
                            <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" >
                                <option value="">select category</option>
                                {!! $html !!}
                            </select>
                            @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                            <div class="form-group">
                            <label>enter tags product </label>
                            <select name="tag[]" class="form-control tags_select_choose" multiple="multiple">
                                
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
      </div>
    </div>
</div>

@endsection

@section('js')
    <script src="{{asset('vendor/select2/select2.min.js') }}"></script>
    <script src="{{asset('admins/product/add/add.js') }}"></script>
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