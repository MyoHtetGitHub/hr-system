@extends('layouts.app')
@section('title','HR System')
@section('content')
<div class="card mb-3">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="d-flex justify-content-start">
                    <img src="{{$employee->user_image_path()}}" alt="profile img" class="profile-img">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <p class="mb-0"><i class="fab fa-gg"></i>Employee ID</p>
                    <p class="mb-0 text-muted">{{$employee->employee_id}}</p>
                </div>
            </div>
        <div class="col-md-6">
            <div class="mb-3">
                <p class="mb-0"><i class="fab fa-gg"></i>Name</p>
                <p class="mb-0 text-muted">{{$employee->name}}</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <p class="mb-0"><i class="fab fa-gg"></i>Phone</p>
                <p class="mb-0 text-muted">{{$employee->phone}}</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <p class="mb-0"><i class="fab fa-gg"></i>Email</p>
                <p class="mb-0 text-muted">{{$employee->email }}</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <p class="mb-0"><i class="fab fa-gg"></i>Role</p>
                <p class="mb-0 text-muted">
                    
                    @foreach ($employee->roles as $role)
                        <span class="badge badge-pill badge-primary">{{$role->name}}</span>
                    @endforeach
                </p>
            </div>
        </div>
         
            </div>
        </div>
         <div class="col-md-12">
            <a href="#" class="btn btn-primary btn-block btn-logout">Logout</a>
          </div>
    </div>
    </div>
</div>

@endsection
