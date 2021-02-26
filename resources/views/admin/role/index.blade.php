
@extends('layouts.admin')

@section('title')
    <title>Role</title>
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

    @include('partials.content-header',['name'=>'Role','key'=>'list'])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{route('role.create')}}" class="btn btn-success">ADD</a>
          </div>
          <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Name Roles</th>
                  <th scope="col">Description</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($roles as $role)
                <tr>
                  <th scope="row">{{ $role->id }}</th>
                  <td>{{ $role->name }}</td>
                  <td>{{ $role->display_name }}</td>

                  <td>
                    <a href="{{ route('role.edit',['id'=>$role->id]) }}" class="btn btn-default">Edit</a>
                    <a data-url="{{ route('role.delete',['id'=>$role->id]) }}" href="{{ route('role.delete',['id'=>$role->id]) }}" class="btn btn-danger action_delete">Delete</a>
                  </td>


                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
          <div class="col-md-12">{{ $roles->links() }}</div>
        </div>
      </div>
    </div>
</div>


@endsection

