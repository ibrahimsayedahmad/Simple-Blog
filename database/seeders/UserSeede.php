<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeede extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert(
            [
                'name'=>'admin',
                'email'=>'admin@system.com',
                'email_verified_at'=>Carbon::now(),
                'password'=>Hash::make('adpassmin'),
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
                'role'=>1,
            ]
        );
    }
}
