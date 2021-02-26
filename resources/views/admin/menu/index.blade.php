
@extends('layouts.admin')

@section('title')
    <title>Menu</title>
@endsection

@section('content')
@section('css')

@endsection
@section('js')
<script src="{{asset('admins/slider/index/index.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endsection


<div class="content-wrapper">

    @include('partials.content-header',['name'=>'menu','key'=>'list'])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{route('menus.create')}}" class="btn btn-success">ADD</a>
          </div>
          <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Name Menu</th>
                  <th scope="col">parent_ID</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($menus as $menu)


                  <tr>
                    <th scope="row">{{$menu->id}}</th>
                    <td>{{$menu->name}}</td>
                    <td>{{$menu->parent_id}}</td>
                    <td>
                      <a href="{{ route('menus.edit',['id'=>$menu->id]) }}" class="btn btn-default">Edit</a>
                      <a data-url="{{ route('menus.delete',['id'=>$menu->id]) }}" href="{{ route('menus.delete',['id'=>$menu->id]) }}" class="btn btn-danger action_delete">Delete</a>
                    </td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
              <div class="col-md-12">{{ $menus->links() }}</div>
        </div>
      </div>
    </div>
</div>


@endsection

