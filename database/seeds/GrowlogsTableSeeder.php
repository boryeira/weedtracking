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
      factory(App\Models\Growlogs\Growlog::class, 60)->create()->each(function ($u) {
        // $u->stages()->sync([1 => ['stage_start' => true],2,3,4]);
        factory(App\Models\Growlogs\GrowlogDay::class,random_int(10,40))->create([
            'growlog_id' => $u->id,
         ])->each(function ($u){
           if($u->id!=null){
             factory(App\Models\Growlogs\GrowlogDayText::class,random_int(1,2))->create([
                'growlog_day_id' => $u->id,
             ]);
             factory(App\Models\Growlogs\GrowlogDayImage::class,random_int(1,4))->create([
                 'growlog_day_id' => $u->id,
              ]);
           }


         });


      });
    }
}
