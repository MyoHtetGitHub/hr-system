@extends('layouts.app_plain')
@section('title', 'Login')
@section('content')
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-7" style="margin-top: 150px">
                <div class="card">
                    <div class="card-header text-md-center text-primary">{{ __('Login Option') }}</div>

                    <div class="card-body">
                        <ul class="nav nav-pills mb-3 justify-content-between" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active btn-sm" id="pills-password-tab" data-toggle="pill"
                                    data-target="#pills-password" type="button" role="tab"
                                    aria-controls="pills-password" aria-selected="true">Password</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link btn-sm option-hide" id="pills-biometric-tab" data-toggle="pill"
                                    data-target="#pills-biometric" type="button" role="tab"
                                    aria-controls="pills-biometric" aria-selected="false">Biometric</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-password" role="tabpanel"
                                aria-labelledby="pills-password-tab">
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger">
                                        {{ $error }}
                                    </div>
                                @endforeach
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="email" value="{{ request()->email }}">
                                    <div class="form-group row" style="margin-top: 15px">
                                        <label for="password"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>


                                        <div class="col-md-6">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                value="{{ old('password') }}" required autocomplete="password" autofocus>

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                Confirm
                                            </button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="pills-biometric" role="tabpanel"
                                aria-labelledby="pills-biometric-tab">
                                <input type="hidden" name="email" id="email" value="{{ request()->email }}">
                                <div class="text-center">
                                    <a href="#" class=" btn-lg btn biometric-login-btn">
                                        <i class="fas fa-fingerprint" style="font-size: 38px;"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('script')
        <!-- Login users -->
        <script>
            const login = (event) => {
                event.preventDefault()
                new Larapass({
                        login: 'webauthn/login',
                        loginOptions: 'webauthn/login/options'
                    }).login({
                        email: document.getElementById('email').value
                    }).then(function(response) {
                        window.location.replace('/');
                    })
                    .catch(function(error) {
                        console.log(error);
                    })
            }
            $('.biometric-login-btn').on('click', function(event) {
                login(event);
            });
        </script>
    @endsection
