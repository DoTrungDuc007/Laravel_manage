
@extends('layouts.admin')

@section('title')
    <title>User Add</title>
@endsection
@section('css')
    <link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" />
@endsection
@section('js')
    <script src="{{ asset('vendor/select2/select2.min.js' )}}"></script>
    <script>
        .$('select2_init').select2({
            'placeholder':'select role'
        })

    </script>
@endsection
@section('content')

<div class="content-wrapper">
    @include('partials.content-header',['name'=>'User','key'=>'add'])

    <div class="content">
      <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>User name</label>
                            <input type="text" class="form-control" name="name"  placeholder="Enter user name" value="{{ old('name') }}">

                        </div>
                        <div class="form-group">
                            <label>User email</label>
                            <input type="text" class="form-control" name="email"  placeholder="Enter user email" value="{{ old('email') }}">

                        </div>
                        <div class="form-group">
                            <label>User password</label>
                            <input type="password" class="form-control" name="password"  placeholder="Enter user password">

                        </div>
                        <div class="form-group">
                            <label>select role</label>
                            <select name="role_id[]" class="form-control select2_init" multiple>
                                @foreach ($roles as $role)
                                    <option value="{{$role->id}}">{{ $role->name}}</option>
                                @endforeach
                            </select>

                        </div>

                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
      </div>
    </div>
</div>

@endsection

