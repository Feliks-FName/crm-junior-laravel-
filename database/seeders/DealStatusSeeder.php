<?php

namespace Database\Seeders;

use App\Models\DealStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DealStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            [
                'code' => 'new',
                'name' => 'Новая',
            ],
            [
                'code' => 'in_work',
                'name' => 'В работе',
            ],
            [
                'code' => 'closed',
                'name' => 'Закрыта',
            ],
        ];

        foreach ($statuses as $status) {
            DealStatus::firstOrCreate(
                ['code' => $status['code']],
                ['name' => $status['name']]
            );
        }
    }
}
