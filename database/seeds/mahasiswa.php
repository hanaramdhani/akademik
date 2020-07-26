<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class mahasiswa extends Seeder
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

                'nim' => Str::random(5),
                'nama_mahasiswa'=> $faker->name(),
                'jenis_kelamin' => 'L',
                'mata_kuliah'=> 'algoritma',
                'alamat'=> 'mataram',


            ];
        }
        //
        DB::table('mahasiswa')->insert($users);
        //
    }
}
