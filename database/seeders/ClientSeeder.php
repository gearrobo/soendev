<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        $clients = [
            [
                'name' => 'Kabupaten Bogor',
                'slug' => 'kabupaten-bogor',
                'logo' => 'clients/Kabupaten_Bogor.png',
            ],
            [
                'name' => 'Amarta',
                'slug' => 'amarta',
                'logo' => 'clients/amarta.png',
            ],
            [
                'name' => 'Askrindo',
                'slug' => 'askrindo',
                'logo' => 'clients/askrindo.png',
            ],
            [
                'name' => 'BRI',
                'slug' => 'bri',
                'logo' => 'clients/bri.png',
            ],
            [
                'name' => 'DMT',
                'slug' => 'dmt',
                'logo' => 'clients/dmt.png',
            ],
            [
                'name' => 'DPRD Depok',
                'slug' => 'dprd-depok',
                'logo' => 'clients/dprd_depok.png',
            ],
            [
                'name' => 'Hikvision',
                'slug' => 'hikvision',
                'logo' => 'clients/hikvision.png',
            ],
            [
                'name' => 'HM',
                'slug' => 'hm',
                'logo' => 'clients/hm.png',
            ],
            [
                'name' => 'Jamsyar',
                'slug' => 'jamsyar',
                'logo' => 'clients/jamsyar.png',
            ],
            [
                'name' => 'Moratelindo',
                'slug' => 'moratelindo',
                'logo' => 'clients/moratelindo.png',
            ],
            [
                'name' => 'Satkom',
                'slug' => 'satkom',
                'logo' => 'clients/satkom.png',
            ],
            [
                'name' => 'SEPA',
                'slug' => 'sepa',
                'logo' => 'clients/sepa.png',
            ],
            [
                'name' => 'SOENDEV',
                'slug' => 'soendev',
                'logo' => 'clients/soendev.png',
            ],
            [
                'name' => 'Tetamba',
                'slug' => 'tetamba',
                'logo' => 'clients/tetamba.png',
            ],
            [
                'name' => 'Wiennexindo',
                'slug' => 'wiennexindo',
                'logo' => 'clients/wiennexindo.png',
            ],
            [
                'name' => 'WWF',
                'slug' => 'wwf',
                'logo' => 'clients/wwf.png',
            ],
        ];

        foreach ($clients as $index => $client) {
            Client::updateOrCreate(
                [
                    'slug' => $client['slug'],
                ],
                [
                    'name' => $client['name'],
                    'logo' => $client['logo'],
                    'is_active' => true,
                    'sort_order' => $index + 1,
                ]
            );
        }
    }
}