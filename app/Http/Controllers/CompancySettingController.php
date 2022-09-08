<?php

namespace App\Http\Controllers;

use App\CompancySetting;
use Illuminate\Http\Request;
use App\Http\Requests\UpateCompancySetting;

class CompancySettingController extends Controller
{
    public function show($id){
    if(!auth()->user()->can('view_compancy_setting')){
        abort(403, 'Unauthorized action.');
    }
    $setting = CompancySetting::findOrFail($id);
        return view ('compancy_setting.show',compact('setting'));

    }
    public function edit($id){
        if(!auth()->user()->can('edit_compancy_setting')){
            abort(403, 'Unauthorized action.');
        }
        $setting = CompancySetting::findOrFail($id);
        return view('compancy_setting.edit',compact('setting'));
    }
    public function update($id,Request $request){
        if(!auth()->user()->can('edit_compancy_setting')){
            abort(403, 'Unauthorized action.');
        }
      $setting = CompancySetting::findOrFail($id);
      $setting->compancy_name = $request->compancy_name;
      $setting->compancy_phone = $request->compancy_phone;
      $setting->compancy_email = $request->compancy_email;
      $setting->compancy_address = $request->compancy_address;
      $setting->office_start_time = $request->office_start_time;
      $setting->office_end_time = $request->office_end_time;
      $setting->break_start_time = $request->break_start_time;
      $setting->break_end_time = $request->break_end_time;
      $setting->update();
      return redirect()->route('compancy-setting.show',$setting->id)->with('update','Update Successfully!!!');

   


    }
}
