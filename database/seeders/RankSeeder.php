<?php

namespace Database\Seeders;

use App\Models\Rank;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rank::create(
            ['name' => 'Admiral']
        );
        Rank::create(
            ['name' => 'Major']
        );
    }
}
