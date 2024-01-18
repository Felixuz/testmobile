<?php

namespace Database\Seeders;

use App\Models\Ads;
use App\Models\AdsTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->createTrans("title");
        $this->createTrans("description");
        $this->createTrans("location");
    }

    public function createTrans($name)
    {
        $ads = Ads::create([
            'lot'
        ]);
        AdsTranslation::create([
            'object_id' => $ads->id,
            'language_code' => 'kiyril',
            'title' => 'sarlavha',
            'desciption'=>'izohkril'
        ]);
        AdsTranslation::create([
            'object_id' => $ads->id,
            'language_code' => 'latin',
            'title'=>'sarlavha',
            'description'=>'izoh'
        ]);
    }
}
