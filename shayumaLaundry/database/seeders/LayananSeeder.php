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
            'descLayanan' => 'Pakaian dicuci bersih dan dikeringkan tanpa proses setrika. Cocok untuk penggunaan harian dengan hasil bersih, wangi, dan siap dilipat.',
            'imgLayanan' => 'cuciKering.png',
            'waktuLayanan' => 'Express',
            'jenisLayanan' => 'Kilo',
            'harga' => 11000
        ]);

        Layanan::create([
            'layanan' => 'Cuci Kering',
            'descLayanan' => 'Pakaian dicuci bersih dan dikeringkan tanpa proses setrika. Cocok untuk penggunaan harian dengan hasil bersih, wangi, dan siap dilipat.',
            'imgLayanan' => 'cuciKering.png',
            'waktuLayanan' => 'Reguler',
            'jenisLayanan' => 'Kilo',
            'harga' => 8000
        ]);

        Layanan::create([
            'layanan' => 'Cuci Kering',
            'descLayanan' => 'Pakaian dicuci bersih dan dikeringkan tanpa proses setrika. Cocok untuk penggunaan harian dengan hasil bersih, wangi, dan siap dilipat.',
            'imgLayanan' => 'cuciKering.png',
            'waktuLayanan' => 'Express',
            'jenisLayanan' => 'Satuan',
            'harga' => 6000
        ]);

        Layanan::create([
            'layanan' => 'Cuci Kering',
            'descLayanan' => 'Pakaian dicuci bersih dan dikeringkan tanpa proses setrika. Cocok untuk penggunaan harian dengan hasil bersih, wangi, dan siap dilipat.',
            'imgLayanan' => 'cuciKering.png', 
            'waktuLayanan' => 'Reguler',
            'jenisLayanan' => 'Satuan',
            'harga' => 5000
        ]);

        Layanan::create([
            'layanan' => 'Cuci Setrika',
            'descLayanan' => 'Pakaian dicuci, dikeringkan, lalu disetrika dengan rapi. Solusi praktis untuk pakaian yang ingin langsung dipakai tanpa ribet.',
            'imgLayanan' => 'cuciSetrika.png',
            'waktuLayanan' => 'Reguler',
            'jenisLayanan' => 'Kilo',
            'harga' => 9000
        ]);

        Layanan::create([
            'layanan' => 'Cuci Setrika',
            'descLayanan' => 'Pakaian dicuci, dikeringkan, lalu disetrika dengan rapi. Solusi praktis untuk pakaian yang ingin langsung dipakai tanpa ribet.',
            'imgLayanan' => 'cuciSetrika.png',
            'waktuLayanan' => 'Express',
            'jenisLayanan' => 'Kilo',
            'harga' => 9000
        ]);

        Layanan::create([
            'layanan' => 'Cuci Setrika',
            'descLayanan' => 'Pakaian dicuci, dikeringkan, lalu disetrika dengan rapi. Solusi praktis untuk pakaian yang ingin langsung dipakai tanpa ribet.',
            'imgLayanan' => 'cuciSetrika.png', 
            'waktuLayanan' => 'Reguler',
            'jenisLayanan' => 'Satuan',
            'harga' => 9000
        ]);

        Layanan::create([
            'layanan' => 'Setrika Saja',
            'descLayanan' => 'Layanan khusus setrika untuk pakaian bersih Anda. Hasil rapi, licin, dan terawat dengan teknik setrika profesional.',
            'imgLayanan' => 'setrika.png', 
            'waktuLayanan' => 'Express',
            'jenisLayanan' => 'Kilo',
            'harga' => 10000
        ]);

        Layanan::create([
            'layanan' => 'Setrika Saja',
            'descLayanan' => 'Layanan khusus setrika untuk pakaian bersih Anda. Hasil rapi, licin, dan terawat dengan teknik setrika profesional.',
            'imgLayanan' => 'setrika.png', 
            'waktuLayanan' => 'Express',
            'jenisLayanan' => 'Satuan',
            'harga' => 8000
        ]);

        Layanan::create([
            'layanan' => 'Setrika Saja',
            'descLayanan' => 'Layanan khusus setrika untuk pakaian bersih Anda. Hasil rapi, licin, dan terawat dengan teknik setrika profesional.',
            'imgLayanan' => 'setrika.png', 
            'waktuLayanan' => 'Reguler',
            'jenisLayanan' => 'Kilo',
            'harga' => 15000
        ]);

        Layanan::create([
            'layanan' => 'Setrika Saja',
            'descLayanan' => 'Layanan khusus setrika untuk pakaian bersih Anda. Hasil rapi, licin, dan terawat dengan teknik setrika profesional.',
            'imgLayanan' => 'setrika.png', 
            'waktuLayanan' => 'Reguler',
            'jenisLayanan' => 'Satuan',
            'harga' => 10000
        ]);
    }
}