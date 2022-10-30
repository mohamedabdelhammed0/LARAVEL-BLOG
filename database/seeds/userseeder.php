<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
class userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->where('email','mhayad010@gmail.com')->first();
        if(!$user){
            User::create([
                'name'=>'ayad',
                'email'=>'mhayad010@gmail.com',
                'password'=>Hash::make('mhayad010@gmail.com'),
                'role'=>'admin'
            ]);
        }
    }
}
