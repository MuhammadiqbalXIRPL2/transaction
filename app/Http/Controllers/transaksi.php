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

        // $data2 = ModelsTransaksi::selectRaw('
        //     DATE(timestamp) as date, 
        //     response_code, 
        //     COUNT(*) as count
        // ')
        // ->groupByRaw('DATE(timestamp), response_code')
        // ->orderBy('date', 'asc')
        // ->get();

        // $dates = $data2->pluck('date')->toArray();

        // // dd($data2);

        // $responseData = [];
        // foreach ($data2 as $item) {
        //     $responseData[$item->date][$item->response_code] = $item->count;
        // }

        // $chartData = [];
        // foreach (ModelsTransaksi::all()->pluck('response_code')->unique() as $responseCode) {
        //     $counts = [];
        //     foreach ($dates as $date) {
        //         $counts[] = isset($responseData[$date][$responseCode]) ? $responseData[$date][$responseCode] : 0;
        //     }
        //     $chartData[] = [
        //         'name' => "Response Code $responseCode",
        //         'data' => $counts,
        //     ];
        // }


        $data2 = ModelsTransaksi::selectRaw('
        DATE_FORMAT(timestamp, "%Y-%m-%d %H:00:00") as date_hour, 
        response_code, 
        COUNT(*) as count
    ')
            ->groupByRaw('DATE_FORMAT(timestamp, "%Y-%m-%d %H:00:00"), response_code')
            ->orderBy('date_hour', 'asc')
            ->get();

        $responseData = [];
        foreach ($data2 as $item) {
            $responseData[$item->date_hour][$item->response_code] = $item->count;
        }

        $datesAndHours = array_keys($responseData);
        $responseCodes = ModelsTransaksi::select('response_code')->distinct()->get();
        $chartData = [];
        foreach ($responseCodes as $responseCode) {
            $counts = [];
            foreach ($datesAndHours as $dateHour) {
                $counts[] = isset($responseData[$dateHour][$responseCode->response_code]) ? $responseData[$dateHour][$responseCode->response_code] : 0;
            }
            $chartData[] = [
                'name' => $responseCode->response_code,
                'data' => $counts,
            ];
        }


        return view('transaksi.chart.index', compact('data1', 'data', 'labels', 'counts', 'transaksi', 'labels1', 'counts1', 'chartData', 'datesAndHours'));
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

    public function table()
    {
        $data2 = ModelsTransaksi::paginate(6);

        return view('transaksi.table.index', compact('data2'));
    }
}
