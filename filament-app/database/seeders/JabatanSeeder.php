<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jabatan;
class JabatanSeeder extends Seeder
{
/**
* Run the database seeds.
*/
public function run(): void
{
//
Jabatan::insert([
['nama_jabatan' => 'Manager'],
['nama_jabatan' => 'Staff'],
['nama_jabatan' => 'Supervisor'],
]);
}
}