<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Client\Exams;
use App\Models\Client\Subjects;
use App\Models\Client\Questions;

class ExamsController extends Controller
{
    private $subjects;
    private $exams;
    private $questions;

    public function __construct()
    {
        $this->subjects = new Subjects();
        $this->exams = new Exams();
        $this->questions = new Questions();
    }

    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $listSubjects = $this->subjects->getAllSubjects();

        $listExams = $this->exams->getAllExams();

        $listQuestions = $this->questions->getAllQuestions();


        return view('clients.exams.lists', compact('listSubjects', 'listExams', 'listQuestions'));
    }

    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        $listSubjects = $this->subjects->getAllSubjects();

        $getExam = $this->exams->getExamById($id);

        $listQuestions = $this->questions->getAllQuestions();

        return view('clients.exams.show', compact('listSubjects', 'getExam', 'listQuestions'));
    }
}
