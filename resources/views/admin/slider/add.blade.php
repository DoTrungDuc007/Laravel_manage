
@extends('layouts.admin')

@section('title')
    <title>Slider Add</title>
@endsection
@section('css')


@endsection

@section('content')

<div class="content-wrapper">
    @include('partials.content-header',['name'=>'slider','key'=>'add'])
    
    <div class="content">
      <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{route('slider.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>slider name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"  placeholder="Enter product name" value="{{ old('name') }}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description</label>
                            <textarea class="form-control tinymce_editor_init @error('description') is-invalid @enderror" name="description" id="exampleFormControlTextarea1" rows="3">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control-file @error('image') is-invalid @enderror" name="image"  value="{{ old('image') }}">
                            @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
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

@endsection