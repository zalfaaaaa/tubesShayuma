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
            'imgLayanan' => 'cuciKering.png',
            'waktuLayanan' => 'Express',
            'jenisLayanan' => 'Kilo',
            'harga' => 11000
        ]);

        Layanan::create([
            'layanan' => 'Cuci Kering',
            'descLayanan' => 'Cuci dan kering tanpa setrika',
            'imgLayanan' => 'cuciKering.png',
            'waktuLayanan' => 'Reguler',
            'jenisLayanan' => 'Kilo',
            'harga' => 8000
        ]);

        Layanan::create([
            'layanan' => 'Cuci Kering',
            'descLayanan' => 'Cuci dan kering tanpa setrika',
            'imgLayanan' => 'cuciKering.png',
            'waktuLayanan' => 'Express',
            'jenisLayanan' => 'Satuan',
            'harga' => 6000
        ]);

        Layanan::create([
            'layanan' => 'Cuci Kering',
            'descLayanan' => 'Cuci dan kering tanpa setrika',
            'imgLayanan' => 'cuciKering.png', 
            'waktuLayanan' => 'Reguler',
            'jenisLayanan' => 'Satuan',
            'harga' => 5000
        ]);

        Layanan::create([
            'layanan' => 'Cuci Setrika',
            'descLayanan' => 'Cuci, kering dan setrika',
            'imgLayanan' => 'cuciSetrika.png',
            'waktuLayanan' => 'Reguler',
            'jenisLayanan' => 'Kilo',
            'harga' => 9000
        ]);

        Layanan::create([
            'layanan' => 'Cuci Setrika',
            'descLayanan' => 'Cuci, kering dan setrika',
            'imgLayanan' => 'cuciSetrika.png',
            'waktuLayanan' => 'Express',
            'jenisLayanan' => 'Kilo',
            'harga' => 9000
        ]);

        Layanan::create([
            'layanan' => 'Cuci Setrika',
            'descLayanan' => 'Cuci, kering dan setrika',
            'imgLayanan' => 'cuciSetrika.png', 
            'waktuLayanan' => 'Reguler',
            'jenisLayanan' => 'Satuan',
            'harga' => 9000
        ]);

        Layanan::create([
            'layanan' => 'Setrika Saja',
            'descLayanan' => 'Setrika pakaian',
            'imgLayanan' => 'cuciSetrika.png', 
            'waktuLayanan' => 'Express',
            'jenisLayanan' => 'Kilo',
            'harga' => 10000
        ]);

        Layanan::create([
            'layanan' => 'Setrika Saja',
            'descLayanan' => 'Setrika pakaian',
            'imgLayanan' => 'cuciSetrika.png', 
            'waktuLayanan' => 'Express',
            'jenisLayanan' => 'Satuan',
            'harga' => 8000
        ]);

        Layanan::create([
            'layanan' => 'Setrika Saja',
            'descLayanan' => 'Setrika pakaian',
            'imgLayanan' => 'cuciSetrika.png', 
            'waktuLayanan' => 'Reguler',
            'jenisLayanan' => 'Kilo',
            'harga' => 15000
        ]);

        Layanan::create([
            'layanan' => 'Setrika Saja',
            'descLayanan' => 'Setrika pakaian',
            'imgLayanan' => 'cuciSetrika.png', 
            'waktuLayanan' => 'Reguler',
            'jenisLayanan' => 'Satuan',
            'harga' => 10000
        ]);
    }
}