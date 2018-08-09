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
      Stage::create(['name' => 'Germinacion']);
      Stage::create(['name' => 'Vegetativo']);
      Stage::create(['name' => 'Floracion']);
      Stage::create(['name' => 'Secado']);
    }
}
