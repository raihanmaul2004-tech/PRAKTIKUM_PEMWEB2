<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder

{
/**
* Run the database seeds.
*/
public function run(): void
{
//
User::create([
'name' => 'Admin Satu',
'email' => 'admin1@mail.com',
'password' => Hash::make('password'),
]);
User::create([
'name' => 'Admin Dua',
'email' => 'admin2@mail.com',
'password' => Hash::make('password'),
]);
User::create([
'name' => 'Admin Tiga',
'email' => 'admin3@mail.com',
'password' => Hash::make('password'),
]);
}
}