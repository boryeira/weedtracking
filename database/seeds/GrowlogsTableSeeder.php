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
        factory(App\Models\GrowlogDay::class,random_int(20,60))->create([
            'growlog_id' => $u->id,
         ])->each(function ($u){

           factory(App\Models\GrowlogDayText::class,random_int(0,3))->create([
               'growlog_day_id' => $u->id,
            ]);
            factory(App\Models\GrowlogDayImage::class,random_int(1,6))->create([
                'growlog_day_id' => $u->id,
             ]);
         });


      });
    }
}
