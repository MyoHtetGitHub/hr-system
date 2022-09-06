<?php

namespace App\Http\Controllers;
use App\User;
use Carbon\Carbon;
use App\Department;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Spatie\Permission\Models\Role;
use App\Http\Requests\StoreEmployee;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateEmployee;
use Illuminate\Support\Facades\Storage;




class EmployeeController extends Controller
{
    public function index(){
        return view('employee.index');
    }

    // get data using datables mehthod 
    public function getDatatableServerSide(Request $request){
      //$employee =User::with();
        $employee = User::with('department');
       return  Datatables::of($employee)
       ->filterColumn('department_name',function($query,$keyword){
          $query->whereHas('department',function($q1) use ($keyword){
          $q1->where('title','like','%'.$keyword.'%');
          });
       })
       ->addColumn('role',function($each){
        $output = "";
        foreach($each->roles as $role){
          $output .= '<span class="badge badge-pill badge-primary">'.$role->name.'</span>';
        }
        return $output;
       })
       ->editColumn('profile_img',function($each){
        return '<img src="'.$each->user_image_path().'" alt="profile-img" class="profile-thmp"/><p class="profile_name">'.$each->name.'</p>';
       })
         ->addColumn("department_name",function($each){
           return  $each->department ? $each->department->title :'-';
         })
         ->editColumn('is_present',function($each){
            if($each->is_present == 1){
              return '<span class="badge btn btn-primary">Present</span>';
            }
            else {
                return '<span  class="badge btn btn-danger">Leave</span>';
            }
         })
         //carbon is php plugin for datetime
         ->editColumn('updated_at',function($each){
          return Carbon::parse($each->updated_at)->format('Y-m-d H:i:s');
         })
         ->addColumn('plus-icon',function($each){
          return null;
         })
         ->addColumn('action',function($each){
          $edit_icon='<a href="'.route('employee.edit',$each->id).'" class="text-warning"><i class=" far fa-edit"></i></a>';
          $info_icon='<a href="'.route('employee.show',$each->id).'" class="text-primary"><i class=" fas fa-info-circle"></i></a>';
          $delete_icon='<a href="#" class="text-danger delete-btn" data-id="'.$each->id.'"><i class=" fas fa-trash"></i></a>';

          return '<div class="action-icon">'.$edit_icon  .$info_icon .$delete_icon .'</div>';
         })
         ->rawColumns(['profile_img','role','is_present','action'])
         ->make(true);
    }

    public function create(){
        $departments = Department::orderBy('title')->get();
        $roles = Role::all();
        return view('employee.create',compact('departments','roles'));
    }

    public function store(StoreEmployee $request){
      if($request->hasFile('profile_img')){
        $profile_img_name = null;
        // get file
        $profile_img_file = $request->file('profile_img');
        //get file extension with unique time
        $profile_img_name = uniqid() .'-' .time().'.'. $profile_img_file->getClientOriginalExtension();
        Storage::disk('public')->put('employee/' . $profile_img_name, file_get_contents($profile_img_file));
       }
     $employee = new User();
     $employee->employee_id =$request->employee_id;
     $employee->name =$request->name;
     $employee->phone =$request->phone;
     $employee->email =$request->email;
     $employee->nrc_number =$request->nrc_number;
     $employee->gender =$request->gender;
     $employee->birthday =$request->birthday;
     $employee->address =$request->address;
     $employee->department_id =$request->department_id;
     $employee->date_of_join =$request->date_of_join;
     $employee->profile_img =$profile_img_name;
     $employee->is_present =$request->is_present;
     $employee->password =Hash::make($request->password);
     
     $employee->save();
     //assign role to the user
     $employee->syncRoles($request->roles); 
   

      
     return redirect()->route('employee.index')->with('create','Sucessfully!');
    }

    public function edit($id){
     $employee = User::findOrFail($id);
     //for old role for specific id
     $old_role = $employee->roles->pluck('id')->toArray();
     $roles = Role::all();
     $departments = Department::orderBy('title')->get();
     return view('employee.edit',compact('employee','old_role','roles','departments'));
    }
    public function update ($id, UpdateEmployee $request){
      $employee = User::findOrFail($id);
      //get profile_img column from database
      $profile_img_name = $employee->profile_img;
      if($request->hasFile('profile_img')){
        //delete file
        Storage::disk('public')->delete('employee/' .$employee->profile_img);
        // get file
        $profile_img_file = $request->file('profile_img');
        //get file extension with unique time
        $profile_img_name = uniqid() .'-' .time().'.'. $profile_img_file->getClientOriginalExtension();
        //store image in the public/employee folder 
        Storage::disk('public')->put('employee/' .$profile_img_name, file_get_contents($profile_img_file));

      }
      $employee->employee_id =$request->employee_id;
      $employee->name =$request->name;
      $employee->phone =$request->phone;
      $employee->email =$request->email;
      $employee->nrc_number =$request->nrc_number;
      $employee->gender =$request->gender;
      $employee->birthday =$request->birthday;
      $employee->address =$request->address;
      $employee->department_id =$request->department_id;
      $employee->date_of_join =$request->date_of_join;
      $employee->is_present =$request->is_present;
      $employee->profile_img =$profile_img_name;
      $employee->password =$request->password ? Hash::make($request->password): $employee->password ;
      $employee->update();
      $employee->syncRoles($request->roles);
      return redirect()->route('employee.index')->with('update','Employee update is Sucessfully!');
    }

    public function show($id){
      $employee = User::findOrFail($id);
      $departments = Department::orderBy('title')->get();
      return view('employee.show',compact('employee','departments'));
    }

    public function destroy($id){
      $employee = User::findOrFail($id);
      $employee->delete();
      return "success";
    }
}
