
@extends('layouts.admin')

@section('title')
    <title>Role Add</title>
@endsection
@section('css')


@endsection
@section('js')

@endsection
@section('content')

<div class="content-wrapper">
    @include('partials.content-header',['name'=>'Role','key'=>'add'])

    <div class="content">
      <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('role.store')  }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Role name</label>
                            <input type="text" class="form-control" name="name"  placeholder="Enter role name" value="{{ old('name') }}">

                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description role</label>
                            <textarea class="form-control tinymce_editor_init" name="display_name" id="exampleFormControlTextarea1" rows="3">{{ old('display_name') }}</textarea>

                        </div>

                        <div class="col-md-12">
                            <div class="row" >

                                @foreach($permission as $per)
                                    <div class="card border-primary mb-3 col-md-12" >
                                        <div class="card-header">
                                            <label>
                                                <input type="checkbox" value="">
                                            </label>
                                            Module {{$per->name}};
                                        </div>
                                        <div class="row">
                                            @foreach($per->permissionChildren as $perChil)
                                                <div class="card-body text-primary col-md-3">
                                                    <h5 class="card-title">
                                                        <label>
                                                            <input type="checkbox" name="permission_id[]" value="{{$perChil->id}}">
                                                        </label>
                                                    {{$perChil->name}}
                                                    </h5>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
      </div>
    </div>
</div>

@endsection

