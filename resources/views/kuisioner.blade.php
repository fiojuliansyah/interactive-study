@extends('layouts.app')

@section('content')
<!-- Header Start -->
<div class="jumbotron jumbotron-fluid page-header position-relative overlay-bottom mb-5">
    <div class="container text-center py-5">
        <h1 class="text-white display-1">Kuisioner</h1>
        <div class="d-inline-flex text-white mb-4">
            <p class="m-0 text-uppercase">
                <a class="text-white" href="{{ route('siswa.dashboard') }}">Beranda</a>
            </p>
            <i class="fa fa-angle-double-right pt-1 px-3"></i>
            <p class="m-0 text-uppercase">Kuisioner</p>
        </div>
    </div>
</div>
<!-- Header End -->

<!-- Kuisioner Start -->
<div class="container-fluid py-5">
    <div class="container py-4">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <div class="section-title position-relative mb-4">
                    <h6 class="d-inline-block text-secondary text-uppercase pb-2">Kuisioner</h6>
                    <h1 class="display-5">Silakan isi kuisioner berikut</h1>
                    <p class="text-muted mt-2">Berikan jawaban sesuai dengan pendapat atau pengalaman Anda.</p>
                </div>
            </div>
        </div>

        <form id="kuisionerForm" action="{{ route('siswa.kuisioner.submit') }}" method="POST">
            @csrf

        @foreach ($questions as $question)
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="font-weight-bold mb-3">{{ $loop->iteration }}. {{ $question->question }}</h5>
                    <input type="hidden" name="questions[]" value="{{ $question->id }}">

                    <div class="row">
                        @php
                            $options = ['a', 'b', 'c', 'd'];
                            $availableOptions = [];
                            
                            foreach ($options as $opt) {
                                if (!empty($question->{'option_' . $opt})) {
                                    $availableOptions[] = $opt;
                                }
                            }
                        @endphp

                        @foreach ($availableOptions as $opt)
                            <div class="col-md-6 mt-2">
                                <div class="form-check">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="answers[{{ $question->id }}]"
                                        id="question_{{ $question->id }}_{{ $opt }}"
                                        value="{{ $opt }}"
                                        required
                                    >
                                    <label class="form-check-label" for="question_{{ $question->id }}_{{ $opt }}">
                                        @if (count($availableOptions) > 2)
                                            <strong>{{ strtoupper($opt) }}.</strong> 
                                        @endif
                                        {{ $question->{'option_' . $opt} }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary px-5 py-2">
                    <i class="fa fa-paper-plane mr-2"></i> Kirim Jawaban
                </button>
            </div>
        </form>
    </div>
</div>
<!-- Kuisioner End -->
@endsection
