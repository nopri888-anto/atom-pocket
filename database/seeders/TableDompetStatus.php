<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableDompetStatus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $DompetStatus = [
            [
                'nama' => "Aktif",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'nama' => "Tidak Aktif",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
        ];

        DB::table('dompet_statuses')->insert($DompetStatus);
    }
}
