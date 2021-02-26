

@extends('layouts.admin')

@section('title')
    <title>Permission</title>
@endsection

@section('content')

    <div class="content-wrapper">
        @include('partials.content-header',['name'=>'Permission','key'=>'add'])
        <div class="content">
            <div class="container-fluid">

                    <form action="{{route('permission.store')}}" method="post">
                        @csrf

                        <div class="form-group">
                            <div class="col-md-3">
                                <label>select parent</label>
                                <select class="form-control" name="module_parent">
                                    @foreach(config('permissions.table_model') as $model)

                                        <option value="{{$model}}">{{ $model }}</option>

                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="form-control">
                            <div class="row">
                                @foreach(config('permissions.module_children') as $children)
                                    <div class="col-md-3">
                                        <label>
                                            <input type="checkbox" value="{{$children}}" name="module_children[]">
                                            {{$children}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>

            </div>
        </div>
    </div>

@endsection

