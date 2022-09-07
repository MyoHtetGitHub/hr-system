@extends('layouts.app')
@section('title','User Profile')
@section('content')
<div class="card">
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
                <p class="mb-0 text-muted">{{$employee->name}}</p>
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
                <p class="mb-0"><i class="fab fa-gg"></i>NRC Number</p>
                <p class="mb-0 text-muted">{{$employee->nrc_number}}</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <p class="mb-0"><i class="fab fa-gg"></i>Gender</p>
                <p class="mb-0 text-muted">{{ucfirst($employee->gender)}}</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <p class="mb-0"><i class="fab fa-gg"></i>Birthday</p>
                <p class="mb-0 text-muted">{{$employee->birthday }}</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <p class="mb-0"><i class="fab fa-gg"></i>Department</p>
                <p class="mb-0 text-muted">{{$employee->department ? $employee->department->title: '-'}}</p>
            </div>
            
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <p class="mb-0"><i class="fab fa-gg"></i>Date Of Join</p>
                <p class="mb-0 text-muted">{{$employee->date_of_join }}</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <p class="mb-0"><i class="fab fa-gg"></i>Is Present?</p>
                <p class="mb-0 text-muted">
                    @if ($employee->is_present == '1')
                        <span class="badge badge-pill badge-success">Present</span>
                        @else
                        <span class="badge badge-pill badge-dange">Leave</span>
                    @endif
                </p>
            </div>
            <div class="mb-3">
                <p class="mb-0"><i class="fab fa-gg"></i>Role</p>
                <p class="mb-0 text-muted">
                    @foreach ($employee->roles as  $role)
                        <span class="badge badge-pill badge-primary">
                            {{$role->name}}
                        </span>
                    @endforeach
                </p>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
