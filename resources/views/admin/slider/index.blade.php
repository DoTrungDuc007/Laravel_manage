
@extends('layouts.admin')

@section('title')
    <title>Slider</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('admins/product/index/list.css')}}">
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{asset('admins/slider/index/index.js')}}"></script>
@endsection
@section('content')


<div class="content-wrapper">
    
    @include('partials.content-header',['name'=>'slider','key'=>'list'])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{ route('slider.create') }}" class="btn btn-success">ADD</a>
          </div>
          <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Name Silder</th>
                  <th scope="col">Description</th>
                  <th scope="col">Image</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                
                @foreach ($sliders as $slider)
                <tr>
                  <th scope="row">{{ $slider->id }}</th>
                  <td>{{ $slider->name }}</td>
                  <td>{{ $slider->description }}</td>
                  <td><img class="product_image_150_100" src="{{$slider->image_path}}" alt=""></td>
                  <td>
                    <a href="{{ route('slider.edit',['id'=>$slider->id]) }}" class="btn btn-default">Edit</a>
                    <a data-url="{{route('slider.delete',['id'=>$slider->id])}}" href="{{ route('slider.delete',['id'=>$slider->id]) }}" class="btn btn-danger action_delete">Delete</a>
                  </td>
                  
                  
                </tr>
                @endforeach
                  
              </tbody>
            </table>
          </div>
          <div class="col-md-12">{{ $sliders->links() }}</div>
        </div>
      </div>
    </div>
</div>
  

@endsection

