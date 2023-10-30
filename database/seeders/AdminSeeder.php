<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $user = User::create([
            'first_name'=>'mahdi',
            'email'=>'mahdidargahi483@gmail.com',
            'password'=>'mahdi1380',
            'last_name'=>'dargahi',
            'phone_number'=>'09905878676',
            'city'=>'tehran',
            'country'=>'iran',
            'gender'=>'men',
            'age'=>'22',
            'education'=>'lisans',
           'National_Code'=>'0024747904',
           ]);

        $user->assignRole(['admin']);


        $user = User::create([
            'first_name'=>'mahdi',
            'email'=>'mahdidargahi483@gmail.com',
            'password'=>'mahdi1380',
            'last_name'=>'dargahi',
            'phone_number'=>'09908878676',
            'city'=>'shiraz',
            'country'=>'iran',
            'gender'=>'men',
            'age'=>'22',
            'education'=>'lisans',
            'National_Code'=>'0024777904',
        ]);

        $user->assignRole(['super-admin']);

    }


}
