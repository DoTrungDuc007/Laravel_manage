
@extends('layouts.admin')

@section('title')
    <title>Category</title>
@endsection
@section('css')
    <a rel="stylesheet" href="admins/setting/index/index.css"></a>
@endsection
@section('js')
  <script src="{{asset('admins/slider/index/index.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endsection
@section('content')


<div class="content-wrapper">

    @include('partials.content-header',['name'=>'category','key'=>'list'])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{ route('categories.create') }}" class="btn btn-success">ADD</a>
          </div>
          <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Name category</th>
                  <th scope="col">Description</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($categories as $category )
                  <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                      <a href="{{ route('categories.edit',['id' => $category->id]) }}" class="btn btn-default">Edit</a>
                      <a data-url="{{ route('categories.delete',['id'=>$category->id]) }}" href="{{ route('categories.delete',['id' => $category->id]) }}" class="btn btn-danger action_delete">Delete</a>
                    </td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
              <div class="col-md-12">{{ $categories->links() }}</div>
        </div>
      </div>
    </div>
</div>


@endsection

