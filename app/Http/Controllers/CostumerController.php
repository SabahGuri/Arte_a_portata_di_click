<?php

namespace App\Http\Controllers;

use App\Models\Costumer;
use Illuminate\Http\Request;

class CostumerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( $request)
    {
        $costumer=new Costumer;
        $costumer->first_name=$request->nome;
        $costumer->last_name=$request->cognome;
        $costumer->email=$request->email;
        $costumer->billing_adress=$request->indirizzo_fatturazione;
        $costumer->shipping_adress=$request->indirizzo_spedizione;
        $costumer->zip_code=$request->cap;
        $costumer->phone_nr=$request->telefono;
        $costumer->city=$request->citta;
        $costumer->user_id=auth()->user()->id;
        $costumer->save();

        return redirect()->route('home.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Costumer $costumer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Costumer $costumer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Costumer $costumer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Costumer $costumer)
    {
        //
    }
}
