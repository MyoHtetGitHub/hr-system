<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreDepartment;
use App\Http\Requests\UpdateDepartment;


class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  //server side route authentization
        if(!auth()->user()->can('view_department')){
            abort(403, 'Unauthorized action.');
        }
        return view('department.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        if(!auth()->user()->can('create_department')){
        abort(403, 'Unauthorized action.');
         }
        return view('department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDepartment $request)
    {  
        if(!auth()->user()->can('create_department')){
        abort(403, 'Unauthorized action.');
        }
        $department = new Department();
        $department->title=$request->title;
        $department->save();
        return redirect()->route('department.index')->with('create',"Successfully!!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){  
         if(!auth()->user()->can('edit_department')){
        abort(403, 'Unauthorized action.');
    }
        $department = Department::findOrFail($id);
        return view('department.edit',compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDepartment $request, $id)
    {   
           if(!auth()->user()->can('edit_department')){
            abort(403, 'Unauthorized action.');
            }
       $department= Department::findOrFail($id);
       $department->title=$request->title;
       $department->update();
       return redirect()->route('department.index')->with('update','Department update is Sucessfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        if(!auth()->user()->can('delete_department')){
        abort(403, 'Unauthorized action.');
        }
        $department = Department::findOrFail($id);
        $department->delete();
        return "success";
    }
    //ajax get data from databases
    public function getDatatableServerside(Request $request){
        $department = Department::query();
       return Datatables::of($department)
       ->addColumn('action',function($each){
        $edit_icon = "";
        $delete_icon = "";
        if(auth()->user()->can('edit_department')){
            $edit_icon ='<a href="'.route('department.edit', $each->id).'" class="text-warning" ><i class=" far fa-edit"></i></a>';
        }
        if(auth()->user()->can('delete_department')){
            $delete_icon='<a href="#" class="text-danger delete-btn" data-id="'.$each->id.'"><i class=" fas fa-trash"></i></a>';
        }
        return '<div class="action-icon">'.$edit_icon .$delete_icon.'</div>';
       })
       ->rawColumns(['action'])
       ->make(true);
    }
}
