<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ir;

class IrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ir::create([
            'irpk' => '01',
            'irnm' => 'KG Keluarga'
        ]);

        Ir::create([
            'irpk' => '02',
            'irnm' => 'KG Prospek'
        ]);

        Ir::create([
            'irpk' => '03',
            'irnm' => 'BTC Umum 1'
        ]);

        Ir::create([
            'irpk' => '04',
            'irnm' => 'BTC Umum 2'
        ]);

        Ir::create([
            'irpk' => '05',
            'irnm' => 'BTC Youth 1'
        ]);

        Ir::create([
            'irpk' => '06',
            'irnm' => 'BTC Youth 2'
        ]);

        Ir::create([
            'irpk' => '07',
            'irnm' => 'Kopo Mas Umum 1'
        ]);

        Ir::create([
            'irpk' => '08',
            'irnm' => 'Kopo Mas Umum 2'
        ]);

        Ir::create([
            'irpk' => '09',
            'irnm' => 'Gabungan Umum 1'
        ]);

        Ir::create([
            'irpk' => '10',
            'irnm' => 'Gabungan Umum 2'
        ]);

        Ir::create([
            'irpk' => '11',
            'irnm' => 'Gabungan Youth 1'
        ]);

        Ir::create([
            'irpk' => '12',
            'irnm' => 'Gabungan Youth 2'
        ]);
    }
}
