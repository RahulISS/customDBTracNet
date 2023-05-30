<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class CustomersController extends Controller
{
    //
    public function customer_list()
    {
        $data['customers'] = User::where('is_deleted', 0)->get();
        return view('customers.customers-list')->with($data);

    }

    public function add_customer()
    {
        return view('customers.add-customers');
    }

    public function postadd_customer(Request $request){
        $fields = Validator::make($request->all(),[
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'username' => 'required|unique:username',
            'email' => 'required|email',
            'smsnumber' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($fields->fails()) {
            return back()->with('error',$fields->errors());   
        }

        $customer = new User();
        $customer->firstname = $request->firstname;
        $customer->lastname = $request->lastname;
        $customer->username = strtolower($request->username);
        $customer->email = strtolower($request->email);
        $customer->smsnumber = strtolower($request->smsnumber);
        $customer->password = Hash::make(password);
        $customer->is_admin = 0;
        $customer->status = 1;
        $customer->is_deleted = 0;
        $customer->created_at = now();
        $customer->save();

        if($customer){
            
            return back()->with('success', 'Added Successfully'); 
        }else{
            
            return back()->with('error', 'Something went wrong'); 
        }
    }

    public function edit_customer(Request $request)
    {   
        if(!empty($request->id)){
            $customer = User::where(['_id' => $request->id])->first();
           
            return view('customers.add-customers', ['customer' => $customer]);
        }else{
            return back()->with('error','Invalid request'); 
        }
    }

    public function update_customer(Request $request, $id)
    {
        $fields = Validator::make($request->all(),[
            'name' => 'required|string',
            'email' => 'required|email',
        ]);

        if ($fields->fails()) {
            return back()->with('error',$fields->errors());   
        }

        $customer = User::where('_id', $id)
                            ->update([
                                'name' => $request->name,
                                'email' => $request->email,
                                'updated_at' => now()
                            ]);
        if($customer){
            return redirect(route('customerlist'))->with('success', 'Customer updated successfully');
        }else{
            return back()->with('error','Invalid request'); 
        }
    }

    public function delete_customer($id)
    {
        if($id != ''){
            $deleteCus = User::where(['_id' => $id])
            ->update([
                'is_deleted' => 1,
                'updated_at' => now()
            ]);
            if($deleteCus){

                return back()->with('success', 'Customer deleted successfully');
            }else{
                return back()->with('error','Customer deleted failed'); 
            }
            
        }else{
            return back()->with('error','Invalid request');
        }   
    }
}
