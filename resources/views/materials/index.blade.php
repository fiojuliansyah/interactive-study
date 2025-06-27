@extends('layouts.main')


@section('content')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <h6 class="font-weight-bolder mb-0">Kelola Materi</h6>
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
            <li class="nav-item d-flex align-items-center">
              <button class="btn btn-primary btn-sm mb-0 me-3" data-toggle="modal" data-target="#createMaterialModal">Buat Materi</button>
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
              <h6>Kelola Materi</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Judul</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Konten</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">kategori</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Admin</th>
                      <th class="text-secondary opacity-7">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($materials as $material)
                        <tr>
                            <td>
                                {{ $material->id }}
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ $material->title }}</p>
                            </td>
                            <td class="align-middle text-center text-sm">
                                {!! $material->content !!}
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{ $material->type }}</span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{ $material->admin->name }}</span>
                            </td>
                            <td class="align-middle">
                                <a href="javascript:;" class="btn btn-xs btn-info" data-toggle="modal" data-target="#editMaterialModal{{ $material->id }}" data-original-title="Edit Materi">
                                    Edit
                                </a>
                                <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteConfirmModal{{ $material->id }}">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                        <div class="modal fade" id="editMaterialModal{{ $material->id }}" tabindex="-1" role="dialog" aria-labelledby="editMaterialModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editMaterialModalLabel">Edit Materi</h5>
                                    </div>
                                    <form action="{{ route('materials.update', $material->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="title">Judul Materi</label>
                                                <input type="text" class="form-control" id="title" name="title" value="{{ $material->title }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="content">Konten</label>
                                                <textarea class="form-control" id="content" name="content">{{ $material->content }}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="type">Tipe</label>
                                                <select class="form-control" id="type" name="type">
                                                    <option value="visual" {{ $material->type == 'visual' ? 'selected' : '' }}>Visual</option>
                                                    <option value="auditory" {{ $material->type == 'auditory' ? 'selected' : '' }}>Auditory</option>
                                                    <option value="kinesthetic" {{ $material->type == 'kinesthetic' ? 'selected' : '' }}>Kinesthetic</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="video">Video (opsional)</label>
                                                <input type="file" class="form-control" id="video" name="video">
                                            </div>

                                            <div class="form-group">
                                                <label for="sound">Sound (opsional)</label>
                                                <input type="file" class="form-control" id="sound" name="sound">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="deleteConfirmModal{{ $material->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteConfirmModalLabel">Konfirmasi Penghapusan</h5>
                                    </div>
                                    <form action="{{ route('materials.destroy', $material->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-body">
                                            <p>Apakah Anda yakin ingin menghapus materi <strong>{{ $material->title }}</strong>?</p>
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
    <div class="modal fade" id="createMaterialModal" tabindex="-1" role="dialog" aria-labelledby="createMaterialModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createMaterialModalLabel">Buat Materi Baru</h5>
                </div>
                <form action="{{ route('materials.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Judul Materi</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>

                        <div class="form-group">
                            <label for="content">Konten</label>
                            <textarea class="form-control" id="content" name="content"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="category">Kategori</label>
                            <select class="form-control" id="category" name="category">
                                <option value="visual">Visual</option>
                                <option value="auditory">Auditory</option>
                                <option value="kinesthetic">Kinesthetic</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="video">Video (opsional)</label>
                            <input type="file" class="form-control" id="video" name="video">
                        </div>

                        <div class="form-group">
                            <label for="sound">Sound (opsional)</label>
                            <input type="file" class="form-control" id="sound" name="sound">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection