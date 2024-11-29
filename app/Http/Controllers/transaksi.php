<?php

namespace App\Http\Controllers;

use App\Models\transaksi as ModelsTransaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;

class transaksi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data1 = ModelsTransaksi::all();

        $data = DB::table('transaksis')
            ->select('response_code', DB::raw('count(*) as total'))
            ->groupBy('response_code')
            ->get();

        $labels = $data->pluck('response_code');
        $counts = $data->pluck('total');


        return view('transaksi.index', compact('data1', 'data', 'labels', 'counts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function chart()
    {
        // $data = DB::table('transaksis')
        //     ->select('response_code', DB::raw('count(*) as total'))
        //     ->groupBy('response_code')
        //     ->get();

        // $labels = $data->pluck('response_code');
        // $counts = $data->pluck('total');

        return view('transaksi.chart', compact('labels', 'counts'));
    }


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
