<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableKategoriStatus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $KategoriStatus = [
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

        DB::table('kategori_statuses')->insert($KategoriStatus);
    }
}
