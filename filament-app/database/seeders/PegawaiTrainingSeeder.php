<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PegawaiTrainingSeeder extends Seeder
{
/**
* Run the database seeds.
*/
public function run(): void
{
//
DB::table('pegawai_training')->insert([
[
'pegawai_id' => 1,
'training_id' => 1,
'status' => 'Selesai',
],
[
'pegawai_id' => 2,
'training_id' => 2,
'status' => 'Mengikuti',
],
[
'pegawai_id' => 3,
'training_id' => 3,
'status' => 'Terdaftar',
],
]);
}
}