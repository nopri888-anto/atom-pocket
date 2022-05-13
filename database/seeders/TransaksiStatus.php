<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksiStatus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $TransaksiStatus = [
            [
                'nama' => "Masuk",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'nama' => "Keluar",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
        ];

        DB::table('transaksi_statuses')->insert($TransaksiStatus);
    }
}
