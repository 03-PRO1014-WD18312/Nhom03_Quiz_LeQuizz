@extends('layouts.client')

@section('title')
    Do Test
@endsection

@section('content')
    <div class="container">
        @if (session('msg'))
            <div class="alert alert-success">{{ session('msg') }}</div>
        @endif

        @foreach ($getExam as $exam)
            <h2 class="text-center pt-4 pb-2 mb-3">{{ $exam->name }}</h2>
            @php
                $index = 1;
            @endphp

            <form action="{{ route('questions.complete', [$exam->id, Auth::user()]) }}" method="post">
                @csrf

                <div class="row">
                    @foreach ($listQuestions as $question)
                        @if ($exam->id == $question->exam_id)
                            <div class="col-md-12">
                                <p><span class="fw-bold">Question {{ $index++ }}: {{ $question->name }}</span>
                                </p>
                            </div>

                            <div class="col-md-12 mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]"
                                        id="choice{{ $question->id }}_1" value="A">
                                    <label class="form-check-label" for="choice{{ $question->id }}_1">
                                        {{ $question->option_a }}
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]"
                                        id="choice{{ $question->id }}_2" value="B">
                                    <label class="form-check-label" for="choice{{ $question->id }}_2">
                                        {{ $question->option_b }}
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]"
                                        id="choice{{ $question->id }}_3" value="C">
                                    <label class="form-check-label" for="choice{{ $question->id }}_3">
                                        {{ $question->option_c }}
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]"
                                        id="choice{{ $question->id }}_4" value="D">
                                    <label class="form-check-label" for="choice{{ $question->id }}_4">
                                        {{ $question->option_d }}
                                    </label>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
