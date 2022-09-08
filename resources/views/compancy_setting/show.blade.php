@extends('layouts.app')
@section('title','Show Compancy Setting')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
        <div class="col-md-6 mb-2">
            <p class="mb-1">Compancy Name</p>
            <p class="mb-1 text-muted">{{$setting->compancy_name}}</p>
        </div>
        <div class="col-md-6 mb-2">
            <p class="mb-1">Compancy Phone</p>
            <p class="mb-1 text-muted">{{$setting->compancy_phone}}</p>
        </div>
        <div class="col-md-6 mb-2">
            <p class="mb-1">Compancy Email</p>
            <p class="mb-1 text-muted">{{$setting->compancy_email}}</p>
        </div>
        <div class="col-md-6 mb-2">
            <p class="mb-1">Compancy Address</p>
            <p class="mb-1 text-muted">{{$setting->compancy_address}}</p>
        </div>
        <div class="col-md-6 mb-2">
            <p class="mb-1">Office Start Time</p>
            <p class="mb-1 text-muted">{{$setting->office_start_time}}</p>
        </div>
        <div class="col-md-6 mb-2">
            <p class="mb-1">Office End Time</p>
            <p class="mb-1 text-muted">{{$setting->office_end_time}}</p>
        </div>
        <div class="col-md-6 mb-2">
            <p class="mb-1">Break Start Time</p>
            <p class="mb-1 text-muted">{{$setting->break_start_time}}</p>
        </div>
        <div class="col-md-6 mb-2">
            <p class="mb-1">Break End Time</p>
            <p class="mb-1 text-muted">{{$setting->break_end_time}}</p>
        </div>
        <div class="col-md-12 mt-4">
            <a href="{{route('compancy-setting.edit',1)}}" class="btn btn-warning btn-block">Edit Compancy Setting</a>
        </div>
    </div>
    </div>
    </div>
</div>
@endsection
