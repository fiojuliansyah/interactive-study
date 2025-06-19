@extends('layouts.main')

@section('content')
  <div class="main-content position-relative max-height-vh-100 h-100">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12 mt-4">
          <div class="card mb-4">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-1">Kuisioner</h6>
              <p class="text-sm">Silakan isi kuisioner berikut untuk menilai materi pembelajaran</p>
            </div>
            <div class="card-body p-3">
            <form action="{{ route('siswa.kuisioner.submit') }}" method="POST">
                @csrf

                @foreach ($questions as $question)
                    <div class="mb-4">
                        <h5 class="font-weight-bolder">{{ $question->question }}</h5>
                        <input type="hidden" name="questions[]" value="{{ $question->id }}">
                        
                        @foreach (['a', 'b', 'c', 'd'] as $opt)
                            <div class="form-check">
                                <input 
                                    class="form-check-input" 
                                    type="radio" 
                                    name="answers[{{ $question->id }}]" 
                                    value="{{ $opt }}" 
                                    required
                                >
                                <label class="form-check-label">
                                    {{ $opt }}. {{ $question->{'option_' . $opt} }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                @endforeach

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Kirim Jawaban</button>
                </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
