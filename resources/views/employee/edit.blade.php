@extends('layouts.app')
@section('title','Edit Employee')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{route('employee.update',$employee->id)}}" method="POST" id="edit-form" enctype="multipart/form-data">
        @method('PUT')
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="md-form mb-4">
                        <label>Employee Id</label>
                        <input type="text" name="employee_id" class="form-control" value="{{$employee->id}}">
                    </div>
                    <div class="md-form mb-4">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{$employee->name}}">
                    </div>
                    <div class="md-form mb-4">
                        <label>Phone</label>
                        <input type="number" name="phone" class="form-control" value="{{$employee->phone}}">
                    </div>
                    <div class="md-form mb-4">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{$employee->email}}">
                    </div>
                    <div class="md-form mb-4">
                        <label>NRC Number</label>
                        <input type="text" name="nrc_number" class="form-control" value="{{$employee->nrc_number}}">
                    </div>
                    <div class="md-form mb-4">
                        <label>Is Present?</label>
                        <select name="is_present" class="form-control">
                         <option value="1" @if($employee->is_present == "1")  selected @endif>Yes</option>
                         <option value="0" @if($employee->is_present == "0")  selected @endif>No</option>
                        </select>
                    </div>
                </div>
                {{-- <div class="col-md-6"> --}}
                    <div class="md-form mb-4">
                        <label>Birthday</label>
                        <input type="text" name="birthday" class="form-control birthday" value="{{$employee->birthday}}"> 
                    </div>
                    <div class="md-form mb-4">
                        <label for="">Address</label>
                        <textarea name="address" class="md-textarea form-control" row="3">{{$employee->address}}</textarea>
                    </div>
                    <div class="md-form mb-4">
                        <label>Departments</label>
                        <select name="department_id" class="form-control">
                         @foreach ($departments as $department)
                         <option value="{{$department->id}}" @if($employee->department_id == $department->id) selected @endif>{{$department->title}}</option>
                         @endforeach
                        </select>
                    </div>
                    <div class="md-form mb-4">
                        <label>Date Of Join</label>
                        <input type="text" name="date_of_join" class="form-control date-of-join" value="{{$employee->date_of_join}}">
                    </div>
                    <div class="md-form mb-4">
                        <label for="">Profile Image</label>
                        <div class="form-control"> 
                        <input type="file" class="form-control-file pb-10" name="profile_img" id="profile_img" multiple>
                     </div>
                    </div>
                    <div class="preview_img">
                        @if ($employee->profile_img)
                            <img src="{{$employee->user_image_path()}}" alt="profile img">
                        @endif
                    </div>
                    <div class="md-form mb-4">
                        <label>Gender</label>
                        <select name="gender" class="form-control">
                         <option value="male" @if($employee->gender =='male') selected @endif>Male</option>
                         <option value="female" @if($employee->gender =='female') selected @endif>Female</option>
                        </select>
                    </div>
                    <div class="md-form mb-4">
                        <label>Password</label>
                        <input type="text" name="password" class="form-control password">
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
{!! JsValidator::formRequest('App\Http\Requests\UpdateEmployee',"#edit-form") !!}
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