<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class dosen extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $users = [];
        $user_info = [];
        for ($i = 1; $i <= 10; $i++) {
            $users[] = [

                'nip' => Str::random(5),
                'nama_dosen'=> $faker->name(),
                'jenis_kelamin' => 'L',
                'alamat'=> $faker->address(50),


            ];
        }
        //
        DB::table('dosen')->insert($users);
        //
        //
    }
}
