<?php


namespace Database\Seeders;

//use Illuminate\Support\Facades\DB;
//use Faker\Factory;
use Illuminate\Database\Seeder;

class SourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('sources')->insert($this->getData());
    }

    public function getData(): array
    {
        $faker = Factory::create();
        $data = [];

        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'title' => $faker->sentence(mt_rand(3, 10)),
                'description' => $faker->text(150),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        return $data;
    }

}
