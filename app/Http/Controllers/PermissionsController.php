<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Models\Permissions;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class PermissionsController extends Controller
{
    //
    public function permission_list()
    {
        $data['permissions'] = Permissions::where('is_deleted', 0)->get();
       
        return view('permissions.permissions-list')->with($data);

    }

    public function add_permission()
    {
        return view('permissions.add-permissions');
    }

    public function postadd_permission(Request $request){
        $fields = Validator::make($request->all(),[
            'name' => 'required|string',
        ]);

        if ($fields->fails()) {
            return back()->with('error',$fields->errors());   
        }

        $portal = new Permissions();
        $portal->name = $request->name;
        $portal->is_deleted = 0;
        $portal->created_at = now();
        $portal->save();

        if($portal){
            
            return back()->with('success', 'Added Successfully'); 
        }else{
            
            return back()->with('error', 'Something went wrong'); 
        }
    }

    public function edit_permission(Request $request)
    {   
        if(!empty($request->id)){
            $data['permissions'] = Permissions::where(['_id' => $request->id])->first();
           
            return view('permissions.add-permissions')->with($data);
        }else{
            return back()->with('error','Invalid request'); 
        }
    }

    public function update_permission(Request $request, $id)
    {
        $fields = Validator::make($request->all(),[
            'name' => 'required|string',
        ]);

        if ($fields->fails()) {
            return back()->with('error',$fields->errors());   
        }

        $role = Permissions::where('_id', $id)
                            ->update([
                                'name' => $request->name,
                            ]);
        if($role){
            return redirect(route('permissionlist'))->with('success', 'Permission updated successfully');
        }else{
            return back()->with('error','Invalid request'); 
        }
    }

    public function delete_permission($id)
    {
        if($id != ''){
            $deleteCus = Permissions::where(['_id' => $id])
            ->update([
                'is_deleted' => 1,
            ]);
            if($deleteCus){

                return back()->with('success', 'Permission deleted successfully');
            }else{
                return back()->with('error','Permission deleted failed'); 
            }
            
        }else{
            return back()->with('error','Invalid request');
        }   
    }
}
