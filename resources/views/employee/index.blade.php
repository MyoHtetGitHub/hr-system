@extends('layouts.app')
@section('title','Employee')
@section('content')
<div class="m-1">
    <a href="{{route('employee.create')}}" class="btn btn-primary btn-small "><i class="fa fa-plus-circle"></i>Add Employee</a>
</div>
<div class="col-md-12">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered Datatable" style="width:100%">
                    <thead>
                        <th class="no-sort no-search"></th>
                        <th class="no-sort"></th>
                        <th class="hidden">Employee Id</th> 
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Department Name</th>
                        <th  class="hidden">Is Present?</th> 
                        <th>Action</th>
                        <th class="no-search hidden">Updated</th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
   $(document).ready(function(){
   var table = $('.Datatable').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: '/employee/Datatables/getDatatableServerSide',
        columns: [
            {data:'plus-icon', name:'plus-icon'},
            {data:'profile_img', name:'profile_img'},
            { data: 'employee_id', name: 'employee_id' },
            { data: 'name', name: 'name' },
            {data: 'phone', name:'phone'},
            { data: 'email', name: 'email'},
            { data: 'department_name', name: 'department_name'},
            { data: 'is_present', name: 'is_present'},
            {data:'action',name:'action'},
            {data:'updated_at',name:'updated_at'}
           
        ],
        order:[[7,"desc"]],
        columnDefs: [
            {
                target: [6],
                visible: true
            },
            {
                target: [0],
                visible: "control"
            },
            {
                target: "no-sort",
                orderable: false,
            },
            {
                target: "no-search",
                searchable: false,
            },
            {
                target: "hidden",
                visible: false,
            },

        ],
            "language": {
            "paginate": {
            "previous": "<i class='far fa-arrow-alt-circle-left'></i>",
            "next":"<i class='far fa-arrow-alt-circle-right'></i>"
            },
            "processing": "<img src='/assets/images/loading.svg'/>",
        }
    });
    //for delete
    $(document).on('click','.delete-btn',function(e){
        e.preventDefault();
        // get each employee form employee controll data-id="'.$each->id'"
        var id = $(this).data('id');
        swal({
        text: "Are you sure?",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            $.ajax({
            method: "DELETE",
            url: `/employee/${id}`,
            })
            .done(function(res) {
               table.ajax.reload();
            });
        } 
        });
          })
       });
</script>
@endsection