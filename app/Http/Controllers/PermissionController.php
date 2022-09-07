<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePermission;
use App\Http\Requests\UpdatePermission;
use Spatie\Permission\Models\Permission;
use Yajra\Datatables\Datatables;
class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!auth()->user()->can('view_permission')){
            abort(403, 'Unauthorized action.');
           }
        return view('permission.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->can('create_permission')){
            abort(403, 'Unauthorized action.');
           }
        return view('permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermission $request)
    {
        if(!auth()->user()->can('create_permission')){
            abort(403, 'Unauthorized action.');
           }
        $permission = new Permission();
        $permission-> name= $request->name;
        $permission->save();
        return redirect()->route('permission.index')->with('create','Successfully!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!auth()->user()->can('edit_permission')){
            abort(403, 'Unauthorized action.');
           }
        $permission = Permission::findOrFail($id);
        return view('permission.edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermission $request, $id)
    {
        if(!auth()->user()->can('edit_permission')){
            abort(403, 'Unauthorized action.');
           }
        $permission = Permission::findOrFail($id);
        $permission->name = $request->name;
        $permission->update();
        return redirect()->route('permission.index')->with('update','Successfully!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!auth()->user()->can('delete_permission')){
            abort(403, 'Unauthorized action.');
           }
        $permission = Permission::findOrFail($id);
        $permission->delete();
        return "success";
    }

    //ajax get data from databases
    public function getDatatableServerside(Request $request){
        $permission = Permission::query();
       return Datatables::of($permission)
       ->addColumn('action',function($each){
        $edit_icon = "";
        $delete_icon = "";
        if(auth()->user()->can('edit_permission')){
            $edit_icon ='<a href="'.route('permission.edit', $each->id).'" class="text-warning" ><i class=" far fa-edit"></i></a>';
        }
        if(auth()->user()->can('delete_permission')){
            $delete_icon='<a href="#" class="text-danger delete-btn" data-id="'.$each->id.'"><i class=" fas fa-trash"></i></a>';
        }
        return '<div class="action-icon">'.$edit_icon .$delete_icon.'</div>';
       })
       ->rawColumns(['action'])
       ->make(true);
    }
}
