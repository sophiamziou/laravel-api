<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $techs = ['Bootstrap', 'laravel', 'vue + vite', 'javascript', 'CSS', 'HTML', 'Reactjs'];
        foreach ($techs as $tech) {
            $newTech = new Technology();
            $newTech->name = $tech;
            $newTech->slug = Str::slug($newTech->name, '-');
            $newTech->save();
        }
    }
}
