@extends('layouts.app')
@section('title','Edit Role')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{route('role.update',$role->id)}}" method="POST" id="edit-role">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="md-form mb-4">
                        <label>Role Name</label>
                        <input type="text" name="name" class="form-control" value="{{$role->name}}">
                    </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="col-md-6 m-4">
                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('script')
{!! JsValidator::formRequest('App\Http\Requests\UpdateRole',"#edit-role") !!}
@endsection