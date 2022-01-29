<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers= Customer::all();
        return response()->json($customers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customers = new Customer;
        $customers->id = $request->id;
        $customers->email= $request->email;
        $customers->name= $request->name;
        $customers->gsmtel= $request->gsmtel;
        $customers->il= $request->il;
        $customers->ilce= $request->ilce;
        $customers->mahalle= $request->mahalle;
        $customers->cadsok= $request->cadsok;
        $customers->apt= $request->apt;
        $customers->kapi= $request->kapi;
        $customers->tarif= $request->tarif;
        $customers->save();
        return response()->json('Veri başarıyla eklendi.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * public function show($id)
    {
        //
        $customers = Customer::find($id);
        return response()->json($customers);

    }
     */
     public function show($email)
    {
        //
        $customers = Customer::where("email", $email)->get();
        return response()->json($customers);
    
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
        $customers = Customer::find($id);
        $customers->id = $request->id;
        $customers->email= $request->email;
        $customers->name= $request->name;
        $customers->gsmtel= $request->gsmtel;
        $customers->il= $request->il;
        $customers->ilce= $request->ilce;
        $customers->mahalle= $request->mahalle;
        $customers->cadsok= $request->cadsok;
        $customers->apt= $request->apt;
        $customers->kapi= $request->kapi;
        $customers->tarif= $request->tarif;
        $customers ->update();
        return response()->json('Veri başarıyla düzenlendi.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::destroy($id);
        return response()->json('Veri başarıyla silindi.');
    }
}
