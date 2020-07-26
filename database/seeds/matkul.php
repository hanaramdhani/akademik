<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class matkul extends Seeder
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

                'id' => Str::random(5),
                'nama_matkul'=> 'algoritma',
                'sks'=> '10',
                'prodi'=> 'ilmu komputer',


            ];
        }
        //
        DB::table('matkul')->insert($users);
    }
    
}
