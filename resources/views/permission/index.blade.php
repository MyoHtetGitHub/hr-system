@extends('layouts.app')
@section('title','Permission')
@section('content')
<div class="m-1">
    @can('create_permission')
    <a href="{{route('permission.create')}}" class="btn btn-primary btn-small "><i class="fa fa-plus-circle"></i>Add Permission</a>
     @endcan
</div>
<div class="col-md-12">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered Datatable" style="width:100%">
                    <thead>
                        {{-- <th class="no-sort no-search"></th> --}}
                        <th>Name</th>  
                        <th>Action</th>
                        {{-- <th class="no-search hidden">Updated</th> --}}
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- @section('script ') for javascript link with laravel --}}
@section('script')
<script>
    $(function(){
      var table =  $('.Datatable').DataTable({
            processing:true,
            serverSide:true,
            ajax:'/permission/Datatables/getDatatableServerSide',
            columns:[
                {data:'name',name:'name'},
                {data:'action',name:'action'}
            ]
        });

        //for delete
        //sweetalert1
        $(document).on('click','.delete-btn',function(e){
            e.preventDefault();
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
                url: `/permission/${id}`,
                })
                .done(function( res ) {
                    table.ajax.reload();
                });
                } 
                });
        })
    })
</script>
@endsection