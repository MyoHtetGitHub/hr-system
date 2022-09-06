<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreRole;
use Yajra\Datatables\Datatables;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('role.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $permissions = Permission::all();
        return view ('role.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRole $request)
    {   
        $role = new Role();
        $role->name =$request->name;
        //for role and permissions
        $role->givePermissionTo($request->permissions);
        //end
        $role->save();
        return redirect()->route('role.index')->with('create','Successfully!!!');
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
    {   $role = Role::findOrFail($id);
        $old_permissions = $role->permissions->pluck('id')->toArray();
        $permissions = Permission::all();
        return view('role.edit',compact('role','permissions','old_permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->name = $request->name;
        //delete old permission
        $old_permissions = $role->permissions->pluck('name')->toArray();
        $role->revokePermissionTo($old_permissions);
        $role->givePermissionTo($request->permissions);
        $role->update();
        return redirect()->route('role.index')->with('update','Role update successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role= Role::findOrFail($id);
        $role->delete();
        return 'success';
    }

      //ajax get data from databases
      public function getDatatableServerside(Request $request){
        $role = Role::query();
       return Datatables::of($role)
       ->addColumn('permissions',function($each){
        $output = "";
        foreach($each->permissions as $permission){
         $output .= '<span class="badge badge-pill badge-primary permission-class">'.$permission->name.'</span>';
        }
        return $output;
       })
       ->addColumn('action',function($each){
        $edit_icon ='<a href="'.route('role.edit', $each->id).'" class="text-warning" ><i class=" far fa-edit"></i></a>';
        $delete_icon='<a href="#" class="text-danger delete-btn" data-id="'.$each->id.'"><i class=" fas fa-trash"></i></a>';
        return '<div class="action-icon">'.$edit_icon .$delete_icon.'</div>';
       })
       ->rawColumns(['permissions','action'])
       ->make(true);
    }
}
