<?php

namespace Database\Seeders;

use App\Models\SMS;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SMSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        SMS::firstOrCreate([
            "title"=>"Try",
            "content" => "Lorem Ipsum",
            "date" => "2023-03-22",
            "time" => "14:00:00",
        ]);
    }
}
