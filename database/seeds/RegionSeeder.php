<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->insert([
            ['id'=>1,'klaster_id'=>'1','name'=>'Урганч'],
            ['id'=>2,'klaster_id'=>'1','name'=>'Боғот'],
            ['id'=>3,'klaster_id'=>'1','name'=>'Гурлан'],
            ['id'=>4,'klaster_id'=>'1','name'=>'Қўшкўпир'],
            ['id'=>5,'klaster_id'=>'1','name'=>'Хазорасп'],
            ['id'=>6,'klaster_id'=>'1','name'=>'Хива'],
            ['id'=>7,'klaster_id'=>'1','name'=>'Хонқа'],
            ['id'=>8,'klaster_id'=>'1','name'=>'Шовот'],
            ['id'=>9,'klaster_id'=>'1','name'=>'Янгиариқ'],
            ['id'=>10,'klaster_id`'=>'1','name'=>'Янгибозор'],
        ]);
    }
}
