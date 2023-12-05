@extends('layouts.client')

@section('title')
    Do Test
@endsection

@section('content')
    <div class="container">
        @if (session('msg'))
            <div class="alert alert-success">{{ session('msg') }}</div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center pt-4 pb-2 mb-3">Exam:
                    @foreach ($getExam as $exam)
                        {{ $exam->name }}
                    @endforeach
                </h1>
            </div>

            <div class="col-md-12">
                @foreach ($getUserScore as $score)
                    <h2 class="text-center pt-4 pb-2 mb-3">Your point: <span class="text-danger">{{ $score->score }}</span> /
                        10
                    </h2>
                @endforeach
            </div>
        </div>
    </div>
@endsection
