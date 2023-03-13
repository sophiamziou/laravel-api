<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Type;

use function PHPSTORM_META\type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Devops', 'Frontend', 'Backend', 'FullStack'];
        foreach ($types as $type) {
            $newtype = new Type();
            $newtype->name = $type;
            $newtype->slug = Str::slug($newtype->name, '-');
            $newtype->save();
        }
    }
}
