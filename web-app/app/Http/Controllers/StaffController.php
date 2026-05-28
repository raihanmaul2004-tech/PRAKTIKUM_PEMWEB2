<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Models\Staff;
class StaffController extends Controller
{
public function index() //fungsi untuk menampilkan data staff
{
$ar_staff = Staff::all()->first; //menggunakan eloquent
$ar_staff = Staff::orderBy('id', 'desc')->get();
//arahkan ke halaman baru dengan menyertakan data staff(compact)
//di resources/views/staff/index.blade.php
return view('staff.index', compact('ar_staff'));
}
/**
* Show the form for creating a new resource.
*/
public function create()
{
//buat data gender u/ dilooping di radio button form
$ar_gender = ['L', 'P'];
return view('staff.form', compact('ar_gender'));
}
/**
* Store a newly created resource in storage.
*/
public function store(Request $request)
{
$request->validate([
'nip' => 'required|unique:staff|max:3',
'name' => 'required|max:50',
'gender' => 'required',
'alamat' => 'required',
'email' => 'required|unique:staff|max:50',
'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|min:2|max:9000', //KB
]);
// variable foto
$fotoPath = null;

if ($request->hasFile('foto')) {
$file = $request->file('foto');
// nama asli file
$namaFile = $file->getClientOriginalName();
// upload file
$file->storeAs('foto_staff', $namaFile, 'public');
// simpan path
$fotoPath = 'foto_staff/' . $namaFile;
}
Staff::create([
'nip' => $request->nip,
'name' => $request->name,
'gender' => $request->gender,
'alamat' => $request->alamat,
'email' => $request->email,
'foto' => $fotoPath,
]);
return redirect()->route('staff.index')
->with('success', 'Staff created successfully.');
}
/**
* Display the specified resource.
*/
public function show(string $id)
{
$row = Staff::find($id);
return view('staff.show', compact('row'));
}
/**
* Show the form for editing the specified resource.
*/
public function edit(string $id)
{
//ambil data array untuk dilooping di radio button form
$ar_gender = ['L', 'P'];
//tampilkan data lama di form edit
$row = Staff::find($id);
return view('staff.form_edit', compact('row', 'ar_gender'));
}

public function update(Request $request, Staff $staff)
{
$request->validate([
'nip' => 'required|max:3|unique:staff,nip,' . $staff->id,
'name' => 'required|max:50',
'gender' => 'required',
'alamat' => 'required',
'email' => 'required|max:50|unique:staff,email,' . $staff->id,
'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:9000',
]);
// default pakai foto lama
$fotoPath = $staff->foto;
// jika upload foto baru
if ($request->hasFile('foto')) {
$file = $request->file('foto');
// nama asli file
$namaFile = $file->getClientOriginalName();
// upload file baru
$file->storeAs('foto_staff', $namaFile, 'public');
// simpan path baru
$fotoPath = 'foto_staff/' . $namaFile;
}
$staff->update([
'nip' => $request->nip,
'name' => $request->name,
'gender' => $request->gender,
'alamat' => $request->alamat,
'email' => $request->email,
'foto' => $fotoPath,
]);
return redirect()->route('staff.index')
->with('success', 'Staff updated successfully');
}
/**
* Remove the specified resource from storage.
*/
public function destroy(Staff $staff)
{

$staff->delete();
return redirect()->route('staff.index')
->with('success', 'Staff deleted successfully');
}
}