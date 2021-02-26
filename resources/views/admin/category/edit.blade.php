
@extends('layouts.admin')

@section('title')
    <title>category</title>
@endsection

@section('content')

<div class="content-wrapper">
    @include('partials.content-header',['name'=>'category','key'=>'edit'])
    <div class="content">
      <div class="container-fluid">
            <div class="row">
                <form action="{{ route('categories.update',['id'=>$category->id]) }}"  >
                    @csrf
                    <div class="form-group">
                        <label>category name</label>
                        <input type="text" class="form-control" name="name" value="{{$category->name}}"  placeholder="Enter category name">
                        <small id="emailHelp" class="form-text text-muted"> Enter category name</small>
                    </div>
                    <div class="form-group">
                        <label>description category </label>
                        <input type="text" class="form-control" name="description" value="{{$category->description}}"  placeholder="Enter description category">
                        <small id="emailHelp" class="form-text text-muted"> Enter category description</small>
                        </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
      </div>
    </div>
</div>

@endsection

