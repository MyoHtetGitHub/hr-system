@extends('layouts.app')
@section('title','Add  Department')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{route('department.store')}}" method="POST" id="store-department">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="md-form mb-4">
                        <label>Department Name</label>
                        <input type="text" name="title" class="form-control">
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
{!! JsValidator::formRequest('App\Http\Requests\UpdateDepartment','#store-department') !!}
@endsection