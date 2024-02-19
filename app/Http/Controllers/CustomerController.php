<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers= Customer::All();
       return response()->json($customers);
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $customers=new Customer;
        $customers->first_name = $request->first_name;
        $customers->last_name = $request->last_name;
        $customers->email = $request->email;
        $customers->save();
        return response()->json($customers);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer=Customer::findOrFail($id);
        return response()->json($customer);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $customer = Customer :: find($id);
        $customer->first_name=$request->first_name;
        $customer->last_name=$request->last_name;
        $customer->email=$request->email;
        $customer->save();
        return response()->json($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer= Customer::findOrFail($id);
        $customer->delete();
        return response()->json($customer);
    }
}
