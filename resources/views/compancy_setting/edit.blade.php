@extends('layouts.app')
@section('title', 'Edit Compancy Setting')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('compancy-setting.update', $setting->id) }}" method="POST" id="compancy-setting">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form mb-4">
                            <label>Compancy Name</label>
                            <input type="text" name="compancy_name" class="form-control"
                                value="{{ $setting->compancy_name }}">
                        </div>
                        <div class="md-form mb-4">
                            <label>Compancy Phone</label>
                            <input type="text" name="compancy_phone" class="form-control"
                                value="{{ $setting->compancy_phone }}">
                        </div>
                        <div class="md-form mb-4">
                            <label>Compancy Email</label>
                            <input type="text" name="compancy_email" class="form-control"
                                value="{{ $setting->compancy_email }}">
                        </div>
                        <div class="md-form mb-4">
                            <label>Compancy Address</label>
                            <input type="text" name="compancy_address" class="form-control"
                                value="{{ $setting->compancy_address }}">
                        </div>
                        <div class="md-form mb-4">
                            <label>Office Start Time</label>
                            <input type="text" name="office_start_time" class="form-control time-picker"
                                value="{{ $setting->office_start_time }}">
                        </div>
                        <div class="md-form mb-4">
                            <label>Office End Time</label>
                            <input type="text" name="office_end_time" class="form-control time-picker"
                                value="{{ $setting->office_end_time }}">
                        </div>
                        <div class="md-form mb-4">
                            <label>Break Start Time</label>
                            <input type="text" name="break_start_time" class="form-control time-picker"
                                value="{{ $setting->break_start_time }}">
                        </div>
                        <div class="md-form mb-4">
                            <label>Break End Time</label>
                            <input type="text" name="break_end_time" class="form-control time-picker"
                                value="{{ $setting->break_end_time }}">
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="col-md-12 m-4">
                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    {{-- {!! JsValidator::formRequest('App\Http\Requests\UpateCompancySetting',"#compancy-setting") !!} --}}
    <script>
        $(document).ready(function() {
            $('.time-picker').daterangepicker({
                "singleDatePicker": true,
                "timePicker": true,
                "timePicker24Hour": true,
                "timePickerSeconds": true,
                "autoApply": true,
                "locale": {
                    "format": "HH:mm:ss",
                }
            }).on('show.daterangepicker', function(ev, picker) {
                picker.container.find(".calendar-table").hide();
            });
        });
    </script>
@endsection
