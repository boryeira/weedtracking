<?php

use Illuminate\Database\Seeder;
use App\Models\Stage;

class StagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Stage::create(['name' => 'Germinacion','weight' => 1]);
      Stage::create(['name' => 'Vegetativo','weight' => 2]);
      Stage::create(['name' => 'Floracion','weight' => 3]);
      Stage::create(['name' => 'Secado','weight' => 4]);
    }
}
