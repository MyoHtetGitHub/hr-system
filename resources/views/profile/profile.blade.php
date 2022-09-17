@extends('layouts.app')
@section('title', 'User Profile')
@section('content')
    <div class="card profile-m">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="d-flex justify-content-start">
                        <img src="{{ $employee->user_image_path() }}" alt="profile img" class="profile-img">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <p class="mb-0"><i class="fab fa-gg"></i>Employee ID</p>
                        <p class="mb-0 text-muted">{{ $employee->employee_id }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <p class="mb-0"><i class="fab fa-gg"></i>Name</p>
                        <p class="mb-0 text-muted">{{ $employee->name }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <p class="mb-0"><i class="fab fa-gg"></i>Phone</p>
                        <p class="mb-0 text-muted">{{ $employee->name }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <p class="mb-0"><i class="fab fa-gg"></i>Email</p>
                        <p class="mb-0 text-muted">{{ $employee->email }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <p class="mb-0"><i class="fab fa-gg"></i>NRC Number</p>
                        <p class="mb-0 text-muted">{{ $employee->nrc_number }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <p class="mb-0"><i class="fab fa-gg"></i>Gender</p>
                        <p class="mb-0 text-muted">{{ ucfirst($employee->gender) }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <p class="mb-0"><i class="fab fa-gg"></i>Birthday</p>
                        <p class="mb-0 text-muted">{{ $employee->birthday }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <p class="mb-0"><i class="fab fa-gg"></i>Department</p>
                        <p class="mb-0 text-muted">{{ $employee->department ? $employee->department->title : '-' }}</p>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <p class="mb-0"><i class="fab fa-gg"></i>Date Of Join</p>
                        <p class="mb-0 text-muted">{{ $employee->date_of_join }}</p>
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
                            @foreach ($employee->roles as $role)
                                <span class="badge badge-pill badge-primary">
                                    {{ $role->name }}
                                </span>
                            @endforeach
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card profile-m">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="show-finger-print">
                        @foreach ($biometrics as $biometric)
                            <a href="">
                                <i class="fas fa-fingerprint">
                                    <span class="bio-acc">{{ $loop->iteration }}</span>
                                    <i class="fas fa-trash-alt biometric-delete-btn" data-id="{{ $biometric->id }}"></i>
                                    {{-- note 
                                        data-id is carry data for ajax delete <<app.blade.php>></app.blade.php> --}}
                                </i>
                            </a>
                        @endforeach

                    </div>
                    {{-- <h5 class="pt-20">Biometric Auth Add</h5> --}}

                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="pt-20 mb-3">Biometric Add</h5>
                        <form id="biometric-auth">
                            <button type="submit" class="btn biometric-btn accordion">
                                <a href="#">
                                    <i class="fas fa-fingerprint">
                                        <i class="fas fa-plus bi-plus-icon"></i>
                                    </i>
                                </a>
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="card mb-20">
        {{-- <div class="card-body"> --}}
        <a class="btn btn-block btn-sm btn-primary" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
            Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        {{-- </div> --}}
    </div>

@endsection
{{-- Biometric register --}}
@section('script')
    <script>
        const register = (event) => {
            event.preventDefault()
            new Larapass({
                    register: 'webauthn/register',
                    registerOptions: 'webauthn/register/options'
                }).register()
                .then(function(res) {
                    Swal.fire({
                        title: 'Success',
                        text: "Biometric Authentication is successuflly!!",
                        icon: 'success ',
                    }), setTimeout(() => {
                        window.location.reload();
                    }, 3000);;
                })
                .catch(response => console.log(response))
        }

        document.getElementById('biometric-auth').addEventListener('submit', register)
    </script>

@endsection
