@extends('layouts.index')
@section('content')
<div class="card">
<div class="card-body">
<br />
@if($errors->any())
<div class="alert alert-danger">
<ul>
@foreach($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
<h5 class="card-title">Form Edit Staff</h5>
<!-- Form Edit -->
<form class="row g-3"
method="POST"
action="{{ route('staff.update', $row->id) }}"
enctype="multipart/form-data">
@csrf
@method('PUT')
<!-- NIP -->
<div class="col-md-12">
<label class="form-label">NIP</label>
<input type="text"
class="form-control"
name="nip"
value="{{ old('nip', $row->nip) }}"
placeholder="NIP">
@error('nip')
<div class="text-danger">{{ $message }}</div>
@enderror
</div>
<!-- Nama -->
<div class="col-md-12">
<label class="form-label">Nama</label>

<input type="text"
class="form-control"
name="name"
value="{{ old('name', $row->name) }}"
placeholder="Nama Staff">
@error('name')
<div class="text-danger">{{ $message }}</div>
@enderror
</div>
<!-- Gender -->
<div class="col-md-12">
<fieldset class="row mb-3">
<label class="form-label">Jenis Kelamin</label>
<div class="col-sm-10">
@foreach($ar_gender as $g)
<div class="form-check">
<input class="form-check-input"
type="radio"
name="gender"
value="{{ $g }}"
{{ old('gender', $row->gender) == $g ? 'checked' : '' }}>
<label class="form-check-label">
{{ $g }}
</label>
</div>
@endforeach
</div>
</fieldset>
@error('gender')
<div class="text-danger">{{ $message }}</div>
@enderror
</div>
<!-- Alamat -->
<div class="col-12">
<label class="form-label">Alamat</label>
<textarea class="form-control"
name="alamat"
cols="50"
rows="5">{{ old('alamat', $row->alamat) }}</textarea>
@error('alamat')

<div class="text-danger">{{ $message }}</div>
@enderror
</div>
<!-- Email -->
<div class="col-md-12">
<label class="form-label">Email</label>
<input type="text"
class="form-control"
name="email"
value="{{ old('email', $row->email) }}"
placeholder="Email">
@error('email')
<div class="text-danger">{{ $message }}</div>
@enderror
</div>
<!-- Foto -->
<div class="col-md-12">
<label class="form-label">Foto</label>
<!-- tampilkan foto lama -->
@if($row->foto)
<div class="mb-2">
<img src="{{ asset('storage/' . $row->foto) }}"
width="120"
class="img-thumbnail">
</div>
@endif
<!-- upload foto baru -->
<input type="file"
class="form-control"
name="foto">
@error('foto')
<div class="text-danger">
{{ $message }}
</div>
@enderror
</div>
<!-- Tombol -->
<div class="text-center">
<button type="submit" class="btn btn-primary btn-sm">
Update

</button>
<a href="{{ url('/staff') }}"
class="btn btn-secondary btn-sm">
Batal
</a>
</div>
</form>
</div>
</div>
@endsection