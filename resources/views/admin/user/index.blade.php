
@extends('layouts.admin')

@section('title')
    <title>User</title>
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

    @include('partials.content-header',['name'=>'User','key'=>'list'])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('user.create') }}" class="btn btn-success">ADD</a>

            </div>
          <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Nane</th>
                  <th scope="col">Email</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>

                 @foreach ($users as $user )
                  <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                      <a href="{{ route('user.edit',['id'=>$user->id]) }}" class="btn btn-default">Edit</a>
                      <a data-url="{{ route('user.delete',['id'=>$user->id]) }}" ref="{{ route('user.delete',['id'=>$user->id]) }}" class="btn btn-danger action_delete">Delete</a>
                    </td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
              <div class="col-md-12">{{ $users->links() }}</div>
        </div>
      </div>
    </div>
</div>


@endsection

