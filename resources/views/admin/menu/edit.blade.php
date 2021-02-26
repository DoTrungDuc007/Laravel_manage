
@extends('layouts.admin')

@section('title')
    <title>category</title>
@endsection

@section('content')

<div class="content-wrapper">
    @include('partials.content-header',['name'=>'menu','key'=>'add'])
    <div class="content">
      <div class="container-fluid">
            <div class="row">
                <form action="{{route('menus.update',['id'=>$menu->id])}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>menu name</label>
                        <input type="text" class="form-control" name="name"  placeholder="Enter menu name" value="{{ $menu->name }}">
                      
                    </div>
                    <div class="form-group">
                        <label>parent_id</label>
                        <input type="text" class="form-control" name="parent_id" placeholder="Enter parent id" value="{{ $menu->parent_id }}">
                        
                        </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
      </div>
    </div>
</div>

@endsection

