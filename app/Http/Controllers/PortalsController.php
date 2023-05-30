<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Models\Portals;
use App\Models\Projects;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class PortalsController extends Controller
{
    //
    public function portal_list()
    {
        $data['portals'] = Portals::where('is_deleted', 0)->get();
        return view('portals.portals-list')->with($data);

    }

    public function add_portal()
    {
        $data['projects'] = Projects::where('is_deleted', 0)->get();
        return view('portals.add-portals')->with($data);
    }

    public function postadd_portal(Request $request){
        $fields = Validator::make($request->all(),[
            'name' => 'required|string',
            'project' => 'required|string',
        ]);

        if ($fields->fails()) {
            return back()->with('error',$fields->errors());   
        }

        $portal = new Portals();
        $portal->name = $request->name;
        $portal->project_id = $request->project;
        $portal->is_deleted = 0;
        $portal->created_at = now();
        $portal->save();

        if($portal){
            
            return back()->with('success', 'Added Successfully'); 
        }else{
            
            return back()->with('error', 'Something went wrong'); 
        }
    }

    public function edit_portal(Request $request)
    {   
        if(!empty($request->id)){
            $data['portal'] = Portals::where(['_id' => $request->id])->first();
            $data['projects'] = Projects::where('is_deleted', 0)->get();
            return view('portals.add-portals')->with($data);
        }else{
            return back()->with('error','Invalid request'); 
        }
    }

    public function update_portal(Request $request, $id)
    {
        $fields = Validator::make($request->all(),[
            'name' => 'required|string',
            'project' => 'required|string',
        ]);

        if ($fields->fails()) {
            return back()->with('error',$fields->errors());   
        }

        $portal = Portals::where('_id', $id)
                            ->update([
                                'name' => $request->name,
                                'project_id' => $request->project
                            ]);
        if($portal){
            return redirect(route('portallist'))->with('success', 'Portal updated successfully');
        }else{
            return back()->with('error','Invalid request'); 
        }
    }

    public function delete_portal($id)
    {
        if($id != ''){
            $deleteCus = Portals::where(['_id' => $id])
            ->update([
                'is_deleted' => 1
               
            ]);
            if($deleteCus){

                return back()->with('success', 'Portal deleted successfully');
            }else{
                return back()->with('error','Portal deleted failed'); 
            }
            
        }else{
            return back()->with('error','Invalid request');
        }   
    }
}
