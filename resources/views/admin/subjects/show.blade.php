@extends('layouts.admin')

@section('title')
    Manage Questions Exam
@endsection

@section('content')
    @if (session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>
    @endif

    <div class="row">
        @include('admin.blocks.sidebar')
        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            @php $i = 1; @endphp

            @foreach ($getSubject as $subject)
                <h2 class="pt-3 pb-2 mb-3">Manage Questions Exam: {{ $subject->name }}</h2>


                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Exam Name</th>
                                <th>Exam Time Limit</th>
                                <th>Exam Limit Quest</th>
                                <th>Exam Description</th>
                                <th>Subject</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listExams as $exam)
                                @if ($exam->subject_id == $subject->id)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $exam->name }}</td>
                                        <td>{{ $exam->time_limit }} Minute</td>
                                        <td>{{ $exam->number_of_questions }} Questions</td>
                                        <td>{{ $exam->description }}</td>
                                        <td>
                                            @foreach ($getSubject as $subject)
                                                @if ($subject->id == $exam->subject_id)
                                                    {{ $subject->name }}
                                                @endif
                                            @endforeach
                                        </td>

                                        <td>
                                            <a href="{{ route('admin.exams.edit', $exam->id) }}"
                                                class="btn btn-sm btn-primary">Edit</a>

                                            <form action="{{ route('admin.exams.destroy', $exam->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
            @endforeach
        </div>

    </div>
@endsection
