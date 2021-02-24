<?php

use Illuminate\Database\Seeder;
use App\Special_feature;

class special_featureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 5; $i++){
            Special_feature::create([
                'name' => '特集名'.$i,
                'description' => '特集説明'.$i,
                'img' => '写真選択'.$i,
                'start_at' => '2020-1-1',
                'finished_at' => '2020-2-2'
            ]);
            
        }
    }
}
