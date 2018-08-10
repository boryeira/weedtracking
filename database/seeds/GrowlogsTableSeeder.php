<?php

use Illuminate\Database\Seeder;
// use Faker\Generator as Faker;

class GrowlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Models\Growlog::class, 60)->create()->each(function ($u) {

        $inicio = today()->subDays(random_int(60,200));
        $vegeta = today()->addDays(random_int(5,20));
        $flora = $vegeta->addDays(random_int(21,60));
        $secado = $flora->addDays(random_int(55,95));
        dd($inicio,$vegeta,$flora,$secado);
        $u->stages()->attach([
          1 => ['stage_at' => $inicio],
          2 => ['stage_at' => $vegeta],
          3 => ['stage_at' => $flora],
          4 => ['stage_at' => $secado]
        ]);
             // factory(App\Models\GrowlogDay::class,random_int(1,5))->create([
             //     'user_id' => $u->id,
             // ]);

          });
    }
}
