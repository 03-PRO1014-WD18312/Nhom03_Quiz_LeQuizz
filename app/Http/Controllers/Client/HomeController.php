<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Exams;
use App\Models\Subjects;
use App\Models\UsersExams;

class HomeController extends Controller
{
    public function index()
    {
        $listSubjects = Subjects::all();

        return view('clients.home', compact('listSubjects'));
    }

    public function score(Request $request, string $id)
    {
        $listExams = Exams::all();

        $usersExams = UsersExams::join('exams', 'users_exams.exam_id', '=', 'exams.id')
            ->join('subjects', 'exams.subject_id', '=', 'subjects.id')
            ->where('users_exams.user_id', '=', $id)
            ->select('users_exams.score', 'users_exams.created_at', 'exams.name as exam_name', 'subjects.name as subject_name')
            ->get();

        return view('clients.info.score', compact('listExams', 'usersExams'));
    }
}
