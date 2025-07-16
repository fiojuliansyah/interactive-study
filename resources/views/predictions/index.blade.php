@extends('layouts.main')


@section('content')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">

    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <h6 class="font-weight-bolder mb-0">Hasil Prediksi Siswa</h6>
            </nav>
            <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                </div>
                </a>
            </li>
            </ul>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group">
                <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                <input type="text" class="form-control" placeholder="Type here...">
                </div>
            </div>
            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item d-flex align-items-center">
                <a class="btn btn-outline-primary btn-sm mb-0 me-3" target="_blank" href=#">Search</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Daftar Hasil Prediksi Siswa</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Siswa</th>
                                        <th>Visual</th>
                                        <th>Auditori</th>
                                        <th>Kinestetik</th>
                                        <th>Jawaban Benar</th>
                                        <th>Jawaban Salah</th>
                                        <th>Hasil</th>
                                        <th>

                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($predictions as $prediction)
                                    <tr>
                                        <td>{{ $loop->iteration ?? '' }}</td>
                                        <td>{{ $prediction->user->name ?? '' }}</td>
                                        <td>{{ $prediction->visual ?? '' }}%</td>
                                        <td>{{ $prediction->auditory ?? '' }}%</td>
                                        <td>{{ $prediction->kinesthetic ?? '' }}%</td>
                                        <td>{{ $prediction->total_correct ?? '' }} Soal</td>
                                        <td>{{ $prediction->total_wrong ?? '' }} Soal</td>
                                        <td>{{ $prediction->result ?? '' }}</td>
                                        <td>
                                            <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deletepredictionModal{{ $prediction->id }}">Hapus</button>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="deletepredictionModal{{ $prediction->id }}" tabindex="-1" role="dialog" aria-labelledby="deletepredictionModalLabel{{ $prediction->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deletepredictionModalLabel{{ $prediction->id }}">Konfirmasi Penghapusan</h5>
                                                </div>
                                                <form action="{{ route('predictions.destroy', $prediction->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-body">
                                                        <p>Apakah Anda yakin ingin menghapus hasil prediksi <strong>{{ $prediction->user->name }}</strong>?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
@endsection