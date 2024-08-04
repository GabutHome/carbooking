<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengembalianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Booking::create([
            'user_id' => 2,
            'carmodel_id' => 3,
            'tgl_booking' => '2023-06-01 00:00:00',
            'tgl_kembali' => '2023-06-30 00:00:00',
            'keterangan' => 'Untuk keperluan dinas!',
            'status' => 'Pending Approval',
            'is_approved' => 0,
            'is_kembali' => 0,
            'is_rejected' => 0,
        ]);
    }
}

