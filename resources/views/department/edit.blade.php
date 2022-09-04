@extends('layouts.app')
@section('title','Edit Department')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{route('department.update',$department->id)}}" method="POST" id="update-department">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="md-form mb-4">
                        <label>Department Name</label>
                        <input type="text" name="title" class="form-control" value="{{$department->title}}">
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
{!! JsValidator::formRequest('App\Http\Requests\UpdateDepartment','#update-department') !!}

@endsection