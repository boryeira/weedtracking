<?php

use Illuminate\Database\Seeder;

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

              // factory(App\Models\Growlog::class,random_int(1,5))->create([
              //     'user_id' => $u->id,
              // ]);


          });
    }
}
