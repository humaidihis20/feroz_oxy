<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'name' => 'Admin',
        //     'email' => 'admin@gmail.com',
        //     'no_hp' => '081274131377',
        //     'alamat' => 'jl.Soekarno-hatta No. 30',
        //     'password' => Hash::make('admin123'),
        //     'level' => 'admin',
        //     'created_at' => \Carbon\Carbon::now(),
        //     'email_verified_at' => \Carbon\Carbon::now()
        // ]);

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'no_hp' => '082118869653',
            'alamat' => 'Jl. Garuda No. 17',
            'password' => Hash::make('admin1356'),
            'level' => 'admin',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);
        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'no_hp' => '087841883352',
            'alamat' => 'Jl.Panjaitan No. 31',
            'password' => Hash::make('user3356'),
            'level' => 'user',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);
        // $user = [
        //     // [
        //     //     // 'username' => 'admin',
        //     //     'name' => 'Admin',
        //     //     'no_hp' => '087841883352',
        //     //     'alamat' => 'jl.Soekarno-hatta No. 30',
        //     //     'email' => 'admin@feroz.com',
        //     //     'level' => 'admin',
        //     //     'password' => bcrypt('13456'),
        //     // ],
        //     // [
        //     //     'name' => 'User',
        //     //     'no_hp' => '08123413443',
        //     //     'alamat' => 'jl.Panjaitan No. 31',
        //     //     'email' => 'user@feroz.com',
        //     //     'level' => 'user',
        //     //     'password' => bcrypt('123456'),
        //     // ],
        // ];

        // foreach ($user as $key => $value) {
        //     User::create($value);
        // }
    }
}
