@extends('layouts.app_plain')
@section('title', 'HR System')
@section('content')
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh">
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center">Pin code</h4>
                        <input type="text" name="mycode" id="pincode-input1">
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#pincode-input1').pincodeInput({
                inputs: 4
            });
        });
    </script>
@endsection
