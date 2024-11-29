<?php

namespace App\Http\Controllers;

use App\Models\transaksi as ModelsTransaksi;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class transaksi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('transaksi.index');

        $data = ModelsTransaksi::all();
        return view('transaksi.index', ['data', $data]);
    }

    public function chart()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new ModelsTransaksi([
            'type_transaksi' => $request->type_transaksi,
            'response_code' => $request->response_code,
            'url' => $request->url,
            'response_message' => $request->response_message,

        ]);
        $data->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
