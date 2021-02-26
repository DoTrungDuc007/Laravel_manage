
@extends('layouts.admin')

@section('title')
    <title>Setting Edit</title>
@endsection

@section('content')

<div class="content-wrapper">
    @include('partials.content-header',['name'=>'Setting','key'=>'edit'])
    <div class="content">
      <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{route('setting.update',['id'=>$setting->id]).'?type='.$setting->type}}" method="post" >
                        @csrf
                        <div class="form-group">
                            <label>Config key</label>
                            <input type="text" class="form-control" name="config_key"  placeholder="Enter config key" value="{{ $setting->config_key }}">
                            
                        </div>
                        @if (request()->type==='Text')
                            <div class="form-group">
                                <label>Config value </label>
                                <input type="text" class="form-control" name="config_value" placeholder="Enter config value" value="{{$setting->config_value}}">
                            
                            </div>
                        @elseif (request()->type==='Textarea')
                            <div class="form-group">
                                <label>Config value </label>
                                
                                <textarea  class="form-control" name="config_value" placeholder="Enter config value" rows="5">{{$setting->config_value}}</textarea>
                                
                            </div>
                            
                        @endif
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
      </div>
    </div>
</div>

@endsection

