<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Subjects;
use App\Models\Admin\Exams;
use App\Models\Admin\Questions;

class QuestionsController extends Controller
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
    public function index(Request $request)
    {
        $search = $request->input('exam');

        $listExams = $this->exams->getAllExams();

        $listSubjects = $this->subjects->getAllSubjects();

        $listQuestions = $this->questions->getAllQuestions();

        return view('admin.questions.lists', compact('listExams', 'listSubjects', 'listQuestions', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $listExams = $this->exams->getAllExams();

        return view('admin.questions.create', compact('listExams'));
    }

    public function createByExam(string $id)
    {
        $getExam = $this->exams->getExamById($id);

        return view('admin.questions.createByExam', compact('getExam'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if ($this->questions->createQuestion($data)) {
            return redirect()->route('admin.questions')->with('success', 'Question created successfully');
        } else {
            return redirect()->route('admin.questions')->with('error', 'Question created failed');
        }
    }

    public function storeByExam(Request $request, string $id)
    {
        $data = $request->all();

        if ($this->questions->createQuestion($data)) {
            return redirect()->route('admin.exams.show', $id)->with('success', 'Question created successfully');
        } else {
            return redirect()->route('admin.exams.show', $id)->with('error', 'Question created failed');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $getQuestion = $this->questions->getQuestionById($id);

        return view('admin.questions.show', compact('getQuestion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        $request->session()->put('id_question', $id);

        $getQuestion = $this->questions->getQuestionById($id);

        $listExams = $this->exams->getAllExams();

        return view('admin.questions.edit', compact('getQuestion', 'listExams'));
    }

    public function editByExam(Request $request, string $id)
    {
        $request->session()->put('id_question', $id);

        $getQuestion = $this->questions->getQuestionById($id);

        $listExams = $this->exams->getAllExams();

        return view('admin.questions.editByExam', compact('getQuestion', 'listExams'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = session('id_question');
        $data = $request->all();

        if ($this->questions->updateQuestion($data, $id)) {
            return redirect()->route('admin.questions')->with('success', 'Question updated successfully');
        } else {
            return redirect()->route('admin.questions')->with('error', 'Question updated failed');
        }
    }

    public function updateByExam(Request $request)
    {
        $id = session('id_question');
        $data = $request->all();

        if ($this->questions->updateQuestion($data, $id)) {
            return redirect()->route('admin.exams.show', [$data['exam']])->with('success', 'Question updated successfully');
        } else {
            return redirect()->route('admin.exams.show', [$data['exam']])->with('error', 'Question updated failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if ($this->questions->deleteQuestion($id)) {
            return redirect()->route('admin.questions')->with('success', 'Question deleted successfully');
        } else {
            return redirect()->route('admin.questions')->with('error', 'Question deleted failed');
        }
    }

    public function destroyByExam(string $id)
    {

        if ($this->questions->deleteQuestion($id)) {
            return redirect()->back()->with('success', 'Question deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Question deleted failed');
        }
    }
}
