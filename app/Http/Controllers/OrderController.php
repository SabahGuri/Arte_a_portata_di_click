<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store($request,$costumer_id)//!passo come secondo parametro il costumer_id ottenuto nel PictureController grazie al rutrn fatto nel CostumerController
    {
        $order=new Order;
        $order->first_name=$request->nome;
        $order->last_name=$request->cognome;
        $order->email=$request->email;
        $order->billing_adress=$request->indirizzo_fatturazione;
        $order->shipping_adress=$request->indirizzo_spedizione;
        $order->zip_code=$request->cap;
        $order->phone_nr=$request->telefono;
        $order->city=$request->citta;
        $order->total=100;
        $order->costumer_id=$costumer_id;
        $order->save();

        return redirect()->route('home.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
