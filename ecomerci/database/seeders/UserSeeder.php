<?php

namespace Database\Seeders;

use App\Enums\UserGenderEnum;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->create([
            'first_name' => 'محسن',
            'last_name' => 'فتحی پور',
            'phone' => '0919734092',
            'phone_verified_at' => now(),
            'email' => 'mohsenfathipour.com@gmail.com',
            'email_verified_at' => now(),
            'gender_enum' => UserGenderEnum::MALE,
            'birth_at' => '1993-06-17',
            'avatar' => 'https://mohsenfathipour.com/assets/front/img/avatar.jpg',
            'password' => Hash::make('11111111'),
            'remember_token' => Str::random(10),
            'role' => 'admin'
        ]);
    }
}
