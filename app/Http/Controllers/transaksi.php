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

        $transaksi = DB::table('transaksis')
            ->select('type_transaksi', DB::raw('count(*) as total'))
            ->groupBy('type_transaksi')
            ->get();

        $labels1 = $transaksi->pluck('type_transaksi');
        $counts1 = $transaksi->pluck('total');

        
        $data12 = ModelsTransaksi::select('timestamp', 'response_code')
        ->orderBy('timestamp', 'asc')
        ->get();
        


        return view('transaksi.index', compact('data1', 'data', 'labels', 'counts', 'transaksi', 'labels1', 'counts1', 'data12'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function heatmap()
    {
        $data = DB::table('transaksis')
            ->select(
                DB::raw('DATE(timestamp) as date'),
                'type_transaksi',
                DB::raw('count(*) as total')
            )
            ->groupBy(DB::raw('DATE(timestamp)'), 'type_transaksi')
            ->get();
    
        // Format data untuk heatmap
        $heatmapData = [];
        $dates = $data->pluck('date')->unique();
        $types = $data->pluck('type_transaksi')->unique();
    
        foreach ($data as $item) {
            $heatmapData[] = [
                'x' => $dates->search($item->date), // Indeks tanggal
                'y' => $types->search($item->type_transaksi), // Indeks tipe transaksi
                'v' => $item->total, // Nilai jumlah transaksi
            ];
        }
    
        return view('transaksi.heatmap', compact('heatmapData', 'dates', 'types'));
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
