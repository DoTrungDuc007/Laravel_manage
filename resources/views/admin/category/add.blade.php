
@extends('layouts.admin')

@section('title')
    <title>category</title>
@endsection

@section('content')

<div class="content-wrapper">
    @include('partials.content-header',['name'=>'category','key'=>'add'])
    <div class="content">
      <div class="container-fluid">
            <div class="row">
                <form action="{{ route('categories.store') }}" >
                    @csrf
                    <div class="form-group">
                        <label>category name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"  placeholder="Enter category name" value="{{ old('name') }}">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>description category </label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Enter description category" value="{{ old('description') }}">
                        @error('description')
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

