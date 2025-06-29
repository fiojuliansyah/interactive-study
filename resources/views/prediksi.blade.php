@extends('layouts.app')

@section('content')
<div class="jumbotron jumbotron-fluid page-header position-relative overlay-bottom mb-5">
    <div class="container text-center py-5">
        <h1 class="text-white display-1">Hasil Prediksi</h1>
        <div class="d-inline-flex text-white mb-4">
            <p class="m-0 text-uppercase"><a class="text-white" href="{{ route('siswa.dashboard') }}">Beranda</a></p>
            <i class="fa fa-angle-double-right pt-1 px-3"></i>
            <p class="m-0 text-uppercase">Hasil Prediksi</p>
        </div>
    </div>
</div>

<div class="container-fluid py-5">
    <div class="container py-4">

        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <div class="section-title position-relative mb-4">
                    <h6 class="d-inline-block text-secondary text-uppercase pb-2">Kuisioner</h6>
                    <h1 class="display-5">Berikut hasil dari kuisioner Anda</h1>
                    <p class="text-muted mt-2">Periksa kembali jawaban Anda dan pelajari dari hasil prediksi yang ditampilkan.</p>
                </div>
            </div>
        </div>

        <div class="card shadow-sm mb-5">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Semua Jawaban</h5>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-bordered mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Pertanyaan</th>
                            <th>Pilihan Anda</th>
                            <th>Hasil</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($answers as $index => $answer)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $answer->question->question }}</td>
                                <td>
                                    @switch($answer->answer)
                                        @case('a') {{ $answer->question->option_a }} @break
                                        @case('b') {{ $answer->question->option_b }} @break
                                        @case('c') {{ $answer->question->option_c }} @break
                                        @case('d') {{ $answer->question->option_d }} @break
                                        @default -
                                    @endswitch
                                </td>
                                <td>
                                    @if ($answer->question->answer == $answer->answer)
                                        <span class="badge badge-success px-3 py-1">Benar</span>
                                    @else
                                        <span class="badge badge-danger px-3 py-1">Salah</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-secondary text-white">
                <h5 class="mb-0">Prediksi Tipe Materi</h5>
            </div>
            <div class="card-body">
                <p class="mb-0">
                    @if ($predictedType)
                        <strong>{{ $predictedType }}</strong>
                    @else
                        <em>Tidak bisa diprediksi.</em>
                    @endif
                </p>
            </div>
        </div>
        @if($suggestedMaterials->count())
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Materi yang Direkomendasikan ({{ $predictedType }})</h5>
                </div>
                <div class="card-body">
                    <div class="row mt-4">
                        @foreach ($suggestedMaterials as $material)
                        <div class="col-lg-4 col-md-6 pb-4">
                            <a class="courses-list-item position-relative d-block overflow-hidden mb-2" href="{{ route('siswa.materi.detail', $material->id) }}">
                                <img class="img-fluid" src="/home/assets/img/courses-1.jpg" alt="">
                                <div class="courses-text">
                                    <h4 class="text-center text-white px-3">{{ $material->title }}</h4>
                                    <div class="border-top w-100 mt-3">
                                        <div class="d-flex justify-content-between p-4">
                                            <span class="text-white"><i class="	fas fa-check-square mr-2"></i>{{ $material->type }}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0">Persentase Tipe Materi</h5>
            </div>
            <div class="card-body">
                @forelse($typePercentages as $type => $percentage)
                    <p class="mb-2">{{ $type }}: <strong>{{ $percentage }}%</strong></p>
                @empty
                    <p class="text-muted mb-0">Tidak ada data persentase tipe materi.</p>
                @endforelse
            </div>
        </div>

        @if ($wrongAnswers->count() > 0)
            <div class="card shadow-sm mt-5">
                <div class="card-header bg-danger text-white">
                    <h5 class="mb-0">Pertanyaan yang Dijawab Salah</h5>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Pertanyaan</th>
                                <th>Jawaban Anda</th>
                                <th>Jawaban Benar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($wrongAnswers as $index => $answer)
                                @php
                                    $options = [
                                        'a' => $answer->question->option_a,
                                        'b' => $answer->question->option_b,
                                        'c' => $answer->question->option_c,
                                        'd' => $answer->question->option_d,
                                    ];
                                @endphp
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $answer->question->question }}</td>
                                    <td>{{ $options[$answer->answer] ?? '-' }}</td>
                                    <td>{{ $options[$answer->question->answer] ?? '-' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            {{-- <div class="alert alert-success mt-5 text-center">
                <h5 class="mb-2">Selamat!</h5>
                <p class="mb-0">Semua jawaban Anda benar.</p>
            </div> --}}
        @endif

        <form class="mt-4" action="{{ route('siswa.reset.prediksi') }}" method="POST" onsubmit="return confirm('Yakin ingin mereset semua jawaban?')">
            @csrf
            <button type="submit" class="btn btn-fill btn-danger btn-wd">Reset Prediksi</button>
        </form>

    </div>
</div>
@endsection
