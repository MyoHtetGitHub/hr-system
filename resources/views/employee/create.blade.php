@extends('layouts.app')
@section('title','Add Employee')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{route('employee.store')}}" method="POST" id="create" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="md-form mb-4">
                        <label>Employee Id</label>
                        <input type="text" name="employee_id" class="form-control">
                    </div>
                    <div class="md-form mb-4">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="md-form mb-4">
                        <label>Phone</label>
                        <input type="number" name="phone" class="form-control">
                    </div>
                    <div class="md-form mb-4">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="md-form mb-4">
                        <label>NRC Number</label>
                        <input type="text" name="nrc_number" class="form-control">
                    </div>
                    <div class="md-form mb-4">
                        <label>Is Present?</label>
                        <select name="is_present" class="form-control">
                         <option value="1">Yes</option>
                         <option value="0">No</option>
                        </select>
                    </div>
                </div>
                {{-- <div class="col-md-6"> --}}
                    <div class="md-form mb-4">
                        <label>Birthday</label>
                        <input type="text" name="birthday" class="form-control birthday">
                    </div>
                    <div class="md-form mb-4">
                        <label for="">Address</label>
                        <textarea name="address" class="md-textarea form-control" row="3"></textarea>
                    </div>
                    <div class="md-form mb-4">
                        <label>Departments</label>
                        <select name="department_id" class="form-control">
                         @foreach ($departments as $department)
                         <option value="{{$department->id}}">{{$department->title}}</option>
                         @endforeach
                        </select>
                    </div>
                    <div class="md-form mb-4">
                        <label>Role</label>
                        <select name="roles[]" class="form-control">
                         @foreach ($roles as $role)
                         <option value="{{$role->name}}">{{$role->name}}</option>
                         @endforeach
                        </select>
                    </div>
                    <div class="md-form mb-4">
                        <label>Date Of Join</label>
                        <input type="text" name="date_of_join" class="form-control date-of-join">
                    </div>
                    <div class="md-form mb-4">
                        <label for="">Profile Image</label>
                        <div class="form-control"> 
                        <input type="file" class="form-control-file pb-10" name="profile_img" id="profile_img" multiple>
                     </div>
                    </div>
                    <div class="preview_img"></div>
                    <div class="md-form mb-4">
                        <label>Gender</label>
                        <select name="gender" class="form-control">
                         <option value="male">Male</option>
                         <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="md-form mb-4">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control password">
                    </div>
                {{-- </div> --}}
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
{!! JsValidator::formRequest('App\Http\Requests\StoreEmployee',"#create") !!}
<script>
    $(document).ready(function(){
   $('.birthday').daterangepicker({
    "singleDatePicker": true,
    "showDropdowns": true,
    "autoApply": true,
    "maxDate":moment(),
    "locale":{
        "format":"YYYY-MM-DD",  }
});
$('.date-of-join').daterangepicker({
    "singleDatePicker": true,
    "showDropdowns": true,
    "autoApply": true,
    "maxDate":moment(),
    "locale":{
        "format":"YYYY-MM-DD",
    }
});
// image preview js
$('#profile_img').on('change',function(){
    var file_length = document.getElementById("profile_img").files.length;
    $('.preview_img').html('');
    for(var i =0; i< file_length; i++){
     $('.preview_img').append(`<img src="${URL.createObjectURL(event.target.files[i])}"/>`);
    }
})
});
</script>
@endsection