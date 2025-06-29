@extends('layouts.app')

@section('content')
<div class="jumbotron jumbotron-fluid page-header position-relative overlay-bottom" style="margin-bottom: 90px;">
    <div class="container text-center py-5">
        <h1 class="text-white display-1">Profil</h1>
        <div class="d-inline-flex text-white mb-5">
            <p class="m-0 text-uppercase"><a class="text-white" href="/">Beranda</a></p>
            <i class="fa fa-angle-double-right pt-1 px-3"></i>
            <p class="m-0 text-uppercase">Profil</p>
        </div>
    </div>
</div>
<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Edit Profil</h2>
            <form method="POST" action="{{ route('siswa.profile.update') }}">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label>Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <label>Username</label>
                    <input type="text" name="username" value="{{ old('username', $user->username) }}" class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <label>NIS (jika siswa)</label>
                    <input type="text" name="nis" value="{{ old('nis', $user->nis) }}" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label>Kelas (jika siswa)</label>
                    <input type="text" name="class" value="{{ old('class', $user->class) }}" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label>Ganti Password (opsional)</label>
                    <input type="password" name="password" class="form-control">
                    <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah password.</small>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>
@endsection