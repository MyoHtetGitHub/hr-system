<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Http\Requests\UpdateDepartment;
use App\Http\Requests\StoreDepartment;
use Yajra\Datatables\Datatables;


class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('department.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $department = Department::findOrFail($id);
        $department->delete();
        return "success";
    }
    //ajax get data from databases
    public function getDatatableServerside(Request $request){
        $department = Department::query();
       return Datatables::of($department)
       ->addColumn('action',function($each){
        $edit_icon ='<a href="'.route('department.edit', $each->id).'" class="text-warning" ><i class=" far fa-edit"></i></a>';
        $delete_icon='<a href="#" class="text-danger delete-btn" data-id="'.$each->id.'"><i class=" fas fa-trash"></i></a>';
        return '<div class="action-icon">'.$edit_icon .$delete_icon.'</div>';
       })
       ->rawColumns(['action'])
       ->make(true);
    }
}
