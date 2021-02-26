
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
                <form action="{{route('menus.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>menu name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"  placeholder="Enter menu name" value="{{ old('name') }}">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>parent_id</label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror" name="parent_id" placeholder="Enter parent id" value="{{ old('parent_id') }}">
                        @error('parent_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
      </div>
    </div>
</div>

@endsection

