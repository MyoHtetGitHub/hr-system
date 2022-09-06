@extends('layouts.app')
@section('title','Add Role')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{route('role.store')}}" method="POST" id="store-role">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="md-form mb-4">
                        <label>Role Name</label>
                        <input type="text" name="name" class="form-control">
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
{!! JsValidator::formRequest('App\Http\Requests\StoreRole','#store-role') !!}
@endsection
