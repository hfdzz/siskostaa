<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SampleDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * User = 136 (1 admin, 135 user)
     * Pemesanan = 120 (30 p-0, 55 p-1, 25 p-2, 20 p-3); 5 user without pemesanan
     * Tagihan = 85 (35 t-0, 20 t-1, 10 t-2, 20 t-3); 35 user without tagihan (30 p-0, 15 p-2)
     * 
     * SCENARIO:
     * 1. 30 user with pemesanan want to be validated [p-0, null]
     * 2. 35 user with validated pemesanan and tagihan to be paid [p-1, t-0]
     * 3. 20 user with tagihan want to be validated [p-1, t-1]
     * 4. 15 user failed to be validated pemesanan [p-2, null]
     * 5. [Not implemented yet] 10 user with expired tagihan [p-2, t-2]
     * 6. 20 user with selesai pemesanan and selesai tagihan [p-3, t-3]
     * 7. [Not implemented yet] 10 with previous pemesanan and tagihan
     * 
     * Total = 120 implemented + 10 not implemented = 130
     */
    public function run(): void
    {
        echo "Creating admin user...\n";
        // admin
        \App\Models\User::factory()->create([
            'nama' => 'admin',
            'email' => 'admin@localhost',
            'is_admin' => '1',
            'password' => bcrypt('password'),
        ]);
        echo 'Done: ' . \App\Models\User::count() . ' users' . "\n";

        echo "Creating 5 user without pemesanan...\n";
        /**
         * 5 user without pemesanan
         */
        \App\Models\User::factory()->count(5)->create();
        echo 'Done: ' . \App\Models\User::count() . ' users' . "\n";

        echo "Creating 30 user with pemesanan want to be validated...\n";
        /**
         * [p-0, null] 
         * 30 user with pemesanan want to be validated (statu = 0, total_tagihan = null, keterangan = null)
         */
        \App\Models\User::factory()->count(30)->create()->each(function ($user) {
            $user->pemesanan()->save(\App\Models\Pemesanan::factory()->make([
                'status' => '0',
                'total_tagihan' => null,
                'keterangan' => null,
            ]));
        });
        echo 'Done: ' . \App\Models\User::count() . ' users, ' . \App\Models\Pemesanan::count() . ' pemesanan' . "\n";

        echo "Creating 35 user with validated pemesanan and tagihan to be paid...\n";
        /**
         * [p-1, t-0] 
         * 35 user with validated pemesanan (status = 1) with each pemesanan has tagihan
         * to be paid (status = 0, bukti_pembayaran = null, keterangan = null)
         */
        \App\Models\User::factory()->count(35)->has(
            \App\Models\Pemesanan::factory()->state([
                'status' => '1',
            ])->has(
                \App\Models\Tagihan::factory()->state([
                    'status' => '0',
                    'bukti_pembayaran' => null,
                    'keterangan' => null,
                ])
            )
        )->create();
        echo 'Done: ' . \App\Models\User::count() . ' users, ' . \App\Models\Pemesanan::count() . ' pemesanan, ' . \App\Models\Tagihan::count() . ' tagihan' . "\n";

        echo "Creating 20 user with tagihan want to be validated...\n";
        /**
         * [p-1, t-1] 
         * 20 user with validated pemesanan (status = 1) with each pemesanan has tagihan
         * want to be validated (status = 1, bukti_pembayaran = null, keterangan = null)
         */
        \App\Models\User::factory()->count(20)->has(
            \App\Models\Pemesanan::factory()->state([
                'status' => '1',
            ])->has(
                \App\Models\Tagihan::factory()->state([
                    'status' => '1',
                    'keterangan' => null,
                ])
            )
        )->create();
        echo 'Done: ' . \App\Models\User::count() . ' users, ' . \App\Models\Pemesanan::count() . ' pemesanan, ' . \App\Models\Tagihan::count() . ' tagihan' . "\n";

        echo "Creating 15 user failed to be validated pemesanan...\n";
        /**
         * [p-2, null] 
         * 15 user failed to be validated pemesanan (status = 2, total_tagihan = null, keterangan = null)
         */
        \App\Models\User::factory()->count(15)->create()->each(function ($user) {
            $user->pemesanan()->save(\App\Models\Pemesanan::factory()->make([
                'status' => '2',
                'total_tagihan' => null,
                'keterangan' => null,
            ]));
        });
        echo 'Done: ' . \App\Models\User::count() . ' users, ' . \App\Models\Pemesanan::count() . ' pemesanan' . "\n";

        echo "Creating 20 user with selesai pemesanan and selesai tagihan...\n";
        /**
         * [p-3, t-3] 
         * 20 user with selesai pemesanan (status = 3) with each pemesanan has tagihan
         * selesai (status = 3, bukti_pembayaran = null, keterangan = null)
         */
        \App\Models\User::factory()->count(20)->has(
            \App\Models\Pemesanan::factory()->state([
                'status' => '3',
            ])->has(
                \App\Models\Tagihan::factory()->state([
                    'status' => '3',
                    'bukti_pembayaran' => null,
                    'keterangan' => null,
                ])
            )
        )->create();
        echo 'Done: ' . \App\Models\User::count() . ' users, ' . \App\Models\Pemesanan::count() . ' pemesanan, ' . \App\Models\Tagihan::count() . ' tagihan' . "\n";


        echo "Total_users: " . \App\Models\User::count() . "\n";
        echo "Total_pemesanan: " . \App\Models\Pemesanan::count() . "\n";
        echo "Total_tagihan: " . \App\Models\Tagihan::count() . "\n";
    }
}
