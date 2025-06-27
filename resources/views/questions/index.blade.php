@extends('layouts.main')

@section('content')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">

    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Admin Page</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Kelola Pertanyaan</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Kelola Pertanyaan</h6>
            </nav>
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
                <button class="btn btn-primary btn-sm mb-0 me-3" data-toggle="modal" data-target="#createQuestionModal">Buat Pertanyaan</button>
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
                        <h6>Daftar Pertanyaan</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Materi</th>
                                        <th>Pertanyaan</th>
                                        <th>Opsi Jawaban</th>
                                        <th>Jawaban</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($questions as $question)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $question->material->title }} ({{ $question->material->type }})</td>
                                        <td>{{ $question->question }}</td>
                                       <td class="text-center">
                                            <div style="display: flex; flex-direction: column; align-items: flex-start;">
                                                <span style="margin-bottom: 8px;">a. {{ $question->option_a }}</span>
                                                <span style="margin-bottom: 8px;">b. {{ $question->option_b }}</span>
                                                <span style="margin-bottom: 8px;">c. {{ $question->option_c }}</span>
                                                <span style="margin-bottom: 8px;">d. {{ $question->option_d }}</span>
                                            </div>
                                        </td>
                                        <td>{{ $question->answer }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-xs btn-info" data-toggle="modal" data-target="#editQuestionModal{{ $question->id }}" onclick="loadEditData({{ $question->id }})">Edit</button>
                                            <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteQuestionModal{{ $question->id }}">Hapus</button>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="deleteQuestionModal{{ $question->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteQuestionModalLabel{{ $question->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteQuestionModalLabel{{ $question->id }}">Konfirmasi Penghapusan</h5>
                                                </div>
                                                <form action="{{ route('questions.destroy', $question->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-body">
                                                        <p>Apakah Anda yakin ingin menghapus pertanyaan <strong>{{ $question->question }}</strong>?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal Edit -->
                                    <div class="modal fade" id="editQuestionModal{{ $question->id }}" tabindex="-1" role="dialog" aria-labelledby="editQuestionModalLabel{{ $question->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editQuestionModalLabel{{ $question->id }}">Edit Pertanyaan</h5>
                                                </div>
                                                <form action="{{ route('questions.update', $question->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="material_id">Materi</label>
                                                            <select class="form-control" name="material_id" id="material_id">
                                                                <option value="">Pilih Materi</option>
                                                                @foreach ($materials as $material)
                                                                    <option value="{{ $material->id }}" {{ $question->material_id == $material->id ? 'selected' : '' }}>{{ $material->title }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="question">Pertanyaan</label>
                                                            <input type="text" class="form-control" name="question" value="{{ $question->question }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="answer">Jawaban</label>
                                                            <input type="text" class="form-control" name="answer" value="{{ $question->answer }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="option_a">Option A</label>
                                                            <input type="text" class="form-control" name="option_a" value="{{ $question->option_a }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="option_b">Option B</label>
                                                            <input type="text" class="form-control" name="option_b" value="{{ $question->option_b }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="option_c">Option C</label>
                                                            <input type="text" class="form-control" name="option_c" value="{{ $question->option_c }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="option_d">Option D</label>
                                                            <input type="text" class="form-control" name="option_d" value="{{ $question->option_d }}">
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

                                    @endforeach
                                </tbody>
                            </table>
                            {{ $questions->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
<!-- Modal Create -->
<div class="modal fade" id="createQuestionModal" tabindex="-1" role="dialog" aria-labelledby="createQuestionModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createQuestionModalLabel">Buat Pertanyaan Baru</h5>
            </div>
            <form action="{{ route('questions.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="material_id">Materi</label>
                        <select class="form-control" name="material_id" id="material_id">
                            <option value="">Pilih Materi</option>
                            @foreach ($materials as $material)
                                <option value="{{ $material->id }}">{{ $material->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Pertanyaan -->
                    <div class="form-group">
                        <label for="question">Pertanyaan</label>
                        <input type="text" class="form-control" name="question" id="question" required>
                    </div>

                    <!-- Jawaban -->
                    <div class="form-group">
                        <label for="answer">Jawaban</label>
                        <input type="text" class="form-control" name="answer" id="answer" required>
                    </div>

                    <!-- Option A -->
                    <div class="form-group">
                        <label for="option_a">Option A</label>
                        <input type="text" class="form-control" name="option_a" id="option_a">
                    </div>

                    <!-- Option B -->
                    <div class="form-group">
                        <label for="option_b">Option B</label>
                        <input type="text" class="form-control" name="option_b" id="option_b">
                    </div>

                    <!-- Option C -->
                    <div class="form-group">
                        <label for="option_c">Option C</label>
                        <input type="text" class="form-control" name="option_c" id="option_c">
                    </div>

                    <!-- Option D -->
                    <div class="form-group">
                        <label for="option_d">Option D</label>
                        <input type="text" class="form-control" name="option_d" id="option_d">
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
