<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Use correct facade
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(){
        $permissions = Permission::orderBy('created_at', 'DESC')->paginate(2);
          return view('permission.list', [
            'permissions' => $permissions,
]);
    }

    public function create(){
       return view('permission.create');
    }

    public function store(Request $request){
      $validator =Validator::make($request->all(),[
        'name'=>'required | unique:permissions|min:3',
      ]);
    if($validator->passes()){
        Permission::create([
            'name'=>$request->name,

        ]);
        return redirect()->route('permission.index')->with('success','Permission added successfully!');
    }else{
        return redirect()->route('permission.create')->withInput()->withErrors($validator);
    }

    }

    public function edit(Request $request,$id){
      $permission=Permission::findOrFail($id);
      return view('permission.edit',compact('permission'));
    }

    public function update(Request $request,$id){
        $permission=Permission::findOrFail($id);
        $permission->update([
            'name'=>$request->name,
        ]);
        return redirect()->route('permission.index')->with('success',"Data Updated Successfully");
    }

    public function delete($id){
      $permision=Permission::find($id);
      $permision->delete();
      return redirect()->route('permission.index')->with('success',"Data Deleted Successfully");
    }
}

