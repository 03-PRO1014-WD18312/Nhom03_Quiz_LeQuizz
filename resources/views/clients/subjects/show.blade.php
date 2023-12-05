@extends('layouts.client')

@section('title')
    Detail Subject
@endsection

@section('content')
    <div class="container">
        @if (session('msg'))
            <div class="alert alert-success">{{ session('msg') }}</div>
        @endif

        @foreach ($getSubject as $subject)
            <div class="row pt-4 pb-2 mb-3">
                <h2 class="col-md-4">{{ $subject->name }}</h2>
                <div class="col-md-8">
                    <div class="mb-3">
                        @if (Auth::check())
                            @if ($checkRegister == false)
                                <form action="{{ route('subjects.register', $subject->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Register</button>
                                </form>
                            @else
                                <form action="{{ route('subjects.unregister', $subject->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Unregister</button>
                                </form>
                            @endif


                            @if (session('message'))
                                <div class="alert alert-success">{{ session('message') }}</div>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary">Register</a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($listExams as $exam)
                    @if ($subject->id == $exam->subject_id)
                        <div class="col-sm-4 mb-4 mb-sm-0">
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $exam->name }}</h5>
                                    <p class="card-text">{{ $exam->description }}.</p>
                                    <p class="card-text">Time: {{ $exam->time_limit }} minutes</p>
                                    <p class="card-text">{{ $exam->number_of_questions }} Questions</p>

                                    @if (Auth::check())
                                        @if ($checkRegister == true)
                                            <a href="{{ route('questions.show', [$exam->id, Auth::user()]) }}"
                                                class="btn btn-primary">Do
                                                test</a>
                                        @else
                                            <button type="button" class="btn btn-primary btn-custom">Do
                                                test</button>

                                            <span class="small badge text-bg-danger" style="visibility: hidden">You need to
                                                register to take the
                                                quiz!</span>
                                        @endif
                                    @else
                                        <a href="{{ route('login') }}" class="btn btn-primary">Register</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @endforeach
    </div>
    </div>
@endsection

@section('script')
    <script>
        document.querySelectorAll('.btn-custom').forEach(function(button) {
            button.addEventListener('click', function() {
                button.nextElementSibling.style.visibility = 'visible';
                setTimeout(function() {
                    button.nextElementSibling.style.visibility = 'hidden';
                }, 3000);
            });
        });
    </script>
@endsection
