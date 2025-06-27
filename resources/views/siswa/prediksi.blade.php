@extends('layouts.main')

@section('content')
<div class="main-content position-relative max-height-vh-100 h-100">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12 mt-4">
                <div class="card mb-4">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-1">Prediksi Nilai</h6>
                        <p class="text-sm">Hasil Prediksi Nilai Siswa</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <h5 class="mb-3">Semua Jawaban</h5>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pertanyaan</th>
                                        <th>Pilihan</th>
                                        <th>Hasil</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($answers as $index => $answer)
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
                                                    <span class="text-success">Benar</span>
                                                @else
                                                    <span class="text-danger">Salah</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="mt-4">
                                <h5>Prediksi Tipe Materi:</h5>
                                <p>
                                    @if ($predictedType)
                                        {{ $predictedType ? $predictedType : 'Tipe belum dapat diprediksi' }}
                                    @else
                                        Tidak bisa diprediksi.
                                    @endif
                                </p>
                            </div>

                            <div class="mt-4">
                                <h5>Persentase Tipe Materi:</h5>
                                <ul>
                                    @foreach($typePercentages as $type => $percentage)
                                        <li>{{ $type }}: {{ $percentage }}%</li>
                                    @endforeach
                                </ul>
                            </div>

                            @if($wrongAnswers->count() > 0)
                                <div class="mt-5">
                                    <h5>Pertanyaan yang Dijawab Salah:</h5>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Pertanyaan</th>
                                                <th>Jawaban Siswa</th>
                                                <th>Jawaban Benar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($wrongAnswers as $index => $answer)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $answer->question->question }}</td>
                                                    <td>
                                                        @php
                                                            $options = [
                                                                'a' => $answer->question->option_a,
                                                                'b' => $answer->question->option_b,
                                                                'c' => $answer->question->option_c,
                                                                'd' => $answer->question->option_d,
                                                            ];
                                                        @endphp
                                                        {{ $options[$answer->answer] ?? '-' }}
                                                    </td>
                                                    <td>{{ $options[$answer->question->answer] ?? '-' }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="mt-5">
                                    <h5>Selamat!</h5>
                                    <p>Semua jawaban Anda benar.</p>
                                </div>
                            @endif

                        </div>
                        <div class="mt-4">
                            <form action="{{ route('siswa.reset.prediksi') }}" method="POST" onsubmit="return confirm('Yakin ingin mereset semua jawaban?')">
                                @csrf
                                <button type="submit" class="btn btn-danger">Reset Prediksi</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>
@endsection
