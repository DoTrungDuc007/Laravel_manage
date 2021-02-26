
@extends('layouts.admin')

@section('title')
    <title>Slider Add</title>
@endsection
@section('css')


@endsection

@section('content')

<div class="content-wrapper">
    @include('partials.content-header',['name'=>'slider','key'=>'edit'])
    
    <div class="content">
      <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('slider.update',['id'=>$slider->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>slider name</label>
                            <input type="text" class="form-control" name="name"  placeholder="Enter product name" value="{{ $slider->name }}">
                            
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description</label>
                            <textarea class="form-control tinymce_editor_init" name="description" id="exampleFormControlTextarea1" rows="3">{{ $slider->description }}</textarea>
                            
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control-file" name="image" ></br>
                            <div class="row"><img style="width: 30%" class="product_image_150_100" src="{{$slider->image_path}}"></div>
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

@endsection