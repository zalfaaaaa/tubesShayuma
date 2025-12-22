<?php

namespace Database\Seeders;

use App\Models\Layanan;
use Illuminate\Database\Seeder;

class LayananSeeder extends Seeder
{
    public function run()
    {
        Layanan::create([
            'layanan' => 'Cuci Kering',
            'descLayanan' => 'Cuci dan kering tanpa setrika',
            'waktuLayanan' => 'express',
            'jenisLayanan' => 'kilo',
            'harga' => 7000
        ]);

        Layanan::create([
            'layanan' => 'Cuci Kering',
            'descLayanan' => 'Cuci dan kering tanpa setrika',
            'waktuLayanan' => 'reguler',
            'jenisLayanan' => 'kilo',
            'harga' => 7000
        ]);

        Layanan::create([
            'layanan' => 'Cuci Kering',
            'descLayanan' => 'Cuci dan kering tanpa setrika',
            'waktuLayanan' => 'express',
            'jenisLayanan' => 'satuan',
            'harga' => 7000
        ]);

        Layanan::create([
            'layanan' => 'Cuci Kering',
            'descLayanan' => 'Cuci dan kering tanpa setrika',
            'waktuLayanan' => 'reguler',
            'jenisLayanan' => 'satuan',
            'harga' => 7000
        ]);

        Layanan::create([
            'layanan' => 'Cuci Setrika',
            'descLayanan' => 'Cuci, kering dan setrika',
            'waktuLayanan' => 'reguler',
            'jenisLayanan' => 'kilo',
            'harga' => 9000
        ]);

        Layanan::create([
            'layanan' => 'Cuci Setrika',
            'descLayanan' => 'Cuci, kering dan setrika',
            'waktuLayanan' => 'express',
            'jenisLayanan' => 'kilo',
            'harga' => 9000
        ]);

        Layanan::create([
            'layanan' => 'Cuci Setrika',
            'descLayanan' => 'Cuci, kering dan setrika',
            'waktuLayanan' => 'reguler',
            'jenisLayanan' => 'satuan',
            'harga' => 9000
        ]);

        Layanan::create([
            'layanan' => 'Setrika Saja',
            'descLayanan' => 'Setrika pakaian',
            'waktuLayanan' => 'express',
            'jenisLayanan' => 'kilo',
            'harga' => 3000
        ]);
    }
}