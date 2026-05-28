@extends('layouts.index')
@section('content')
<div class="card mb-3" style="max-width: 540px;">
<div class="row g-0">
<div class="col-md-4">
@if($row->foto)
<img src="{{ asset('storage/' . $row->foto) }}" alt="Foto Staff" width="100%">
@else
<p>No Photo</p>
@endif
</div>
<div class="col-md-8">
<div class="card-body">
<h5 class="card-title">Nama: {{ $row->name }}</h5>
<p class="card-text">NIP: {{ $row->nip }}</p>
<p class="card-text">Jenis Kelamin: {{ $row->gender }}</p>
<p class="card-text">Email: {{ $row->email }}</p>
<p class="card-text">Alamat: {{ $row->alamat }}</p>
<hr/>
<a href="{{ url('/staff') }}" class="btn btn-primary">Back</a>
</div>
</div>
</div>
</div>
@endsection