
@extends('layouts.admin')

@section('title')
    <title>Product</title>
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
    
    @include('partials.content-header',['name'=>'product','key'=>'list'])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{ route('product.creat') }}" class="btn btn-success">ADD</a>
          </div>
          <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Name product</th>
                  <th scope="col">Price</th>
                  <th scope="col">Image</th>
                  <th scope="col">content</th>
                  <th scope="col">user id</th>
                  <th scope="col">ID Category</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                
                @foreach ($products as $product)
                    
                
                  <tr>
                    <th scope="row">{{$product->id}}</th>
                    <td>{{$product->name}}</td>
                    <td>{{number_format($product->price)}}</td>
                    <td>
                        <img class="product_image_150_100" src="{{$product->feuture_image_path}}" alt="">
                    </td>
                    <td>{{$product->content}}</td>
                    <td>{{$product->user_id}}</td>
                    <td>{{$product->category->name}}</td>
                    <td>
                      <a href="{{ route('product.edit',['id'=>$product->id]) }}" class="btn btn-default">Edit</a>
                      <a data-url="{{ route('product.delete',['id'=>$product->id]) }}" href="{{ route('product.delete',['id'=>$product->id]) }}" class="btn btn-danger action_delete">Delete</a>
                    </td>
                  </tr>
                  @endforeach  
              </tbody>
            </table>
          </div>
              <div class="col-md-12">{{ $products->links() }}</div>
        </div>
      </div>
    </div>
</div>
  

@endsection

