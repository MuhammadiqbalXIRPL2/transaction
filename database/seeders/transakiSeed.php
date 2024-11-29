<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class transakiSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transaksis')->insert([
            [
                'timestamp' => '2024-11-28 17:10:58.399',
                'type_transaksi' => 'ERRORWSCONNECT',
                'response_code' => 'ERROR',
                'url' => 'wss://smb-uat.bankbjb.co.id:12345/smb?apikey=Mk1VMUdTVjMxSE9CS0VKMUc6YzEzNDJkM2VmYWY1ODE1M2NlYjZmY2U5YzliNzBmNjFhN2YwMzllZTdiZTE4YWU2MTRmMmQyM2U2ZTc2M2EwMA==',
                'response_message' => 'java.lang.NumberFormatException: empty String',
            ],[
                'timestamp' => '2024-11-28 17:10:58.858',
                'type_transaksi' => 'ERRORWSCONNECT',
                'response_code' => 'ERROR',
                'url' => 'wss://smb-uat.bankbjb.co.id:12345/smb?apikey=Mk1VMUdTVjMxSE9CS0VKMUc6YzEzNDJkM2VmYWY1ODE1M2NlYjZmY2U5YzliNzBmNjFhN2YwMzllZTdiZTE4YWU2MTRmMmQyM2U2ZTc2M2EwMA==',
                'response_message' => 'java.lang.ArrayIndexOutOfBoundsException: Index 2 out of bounds for length 1',
            ],[
                'timestamp' => '2024-11-28 17:16:42.41',
                'type_transaksi' => 'ERRORWSCONNECT',
                'response_code' => 'ERROR',
                'url' => 'wss://smb-uat.bankbjb.co.id:12345/smb?apikey=WTBRVUkzUlpRMVo3U05HTDE6ZDFmNGIwYWI0YjNhYTYwOTcxMzYyZGRlYmZkMzBlM2NjMzM5MzFmYjY4ZTNhYjA5ZDk3MGRmZGFhMjE1OTQxMg==',
                'response_message' => 'java.lang.NumberFormatException: empty String',
            ],[
                'timestamp' => '2024-11-28 17:16:42.929',
                'type_transaksi' => 'ERRORWSCONNECT',
                'response_code' => 'ERROR',
                'url' => 'wss://smb-uat.bankbjb.co.id:12345/smb?apikey=WTBRVUkzUlpRMVo3U05HTDE6ZDFmNGIwYWI0YjNhYTYwOTcxMzYyZGRlYmZkMzBlM2NjMzM5MzFmYjY4ZTNhYjA5ZDk3MGRmZGFhMjE1OTQxMg==',
                'response_message' => 'java.lang.ArrayIndexOutOfBoundsException: Index 2 out of bounds for length 1',
            ]
        ]);
    }
}
