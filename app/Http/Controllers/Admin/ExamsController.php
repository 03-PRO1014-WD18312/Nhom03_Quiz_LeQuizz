<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Exams;
use App\Models\Admin\Subjects;
use App\Models\Admin\Questions;

class ExamsController extends Controller
{
    private $subjects;
    private $exams;
    private $questions;

    public function __construct()
    {
        $this->exams = new Exams();
        $this->subjects = new Subjects();
        $this->questions = new Questions();
    }

    /**
     * Display a listing of the resource.
     */

    // Use the index method to display a list of exams. / Method: GET / URI: /admin/exams
    public function index()
    {
        $listExams = $this->exams->getAllExams();

        $listSubjects = $this->subjects->getAllSubjects();

        $listQuestions = $this->questions->getAllQuestions();

        return view('admin.exams.lists', compact('listExams', 'listSubjects', 'listQuestions'));
    }

    /**
     * Show the form for creating a new resource.
     */

    // Use the create method to display a form for creating a new exam. / Method: GET / URI: /admin/exams/create
    public function create()
    {
        $listSubjects = $this->subjects->getAllSubjects();

        return view('admin.exams.create', compact('listSubjects'));
    }

    /**
     * Store a newly created resource in storage.
     */

    // Use the store method to store a newly created exam in the database. / Method: POST / URI: /admin/exams
    public function store(Request $request)
    {
        $data = $request->all();

        if ($this->exams->createExam($data)) {
            return redirect()->route('admin.exams')->with('success', 'Exam created successfully');
        } else {
            return redirect()->route('admin.exams')->with('error', 'Exam creation failed');
        }
    }

    /**
     * Display the specified resource.
     */

    // Use the show method to display a specific exam. / Method: GET / URI: /admin/exams/{id}
    public function show(string $id)
    {
        $getExam = $this->exams->getExamById($id);

        $listSubjects = $this->subjects->getAllSubjects();

        $listQuestions = $this->questions->getAllQuestions();

        $maxQuestions = $this->exams->getMaxQuestions();

        return view('admin.exams.show', compact('getExam', 'listSubjects', 'listQuestions', 'maxQuestions'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    // Use the edit method to display a form for editing a specific exam. / Method: GET / URI: /admin/exams/edit/{id}
    public function edit(Request $request, string $id)
    {
        $request->session()->put('id_exam', $id);

        $getExam = $this->exams->getExamById($id);

        $listSubjects = $this->subjects->getAllSubjects();

        return view('admin.exams.edit', compact('getExam', 'listSubjects'));
    }

    /**
     * Update the specified resource in storage.
     */

    // Use the update method to update a specific exam in the database. / Method: PUT/PATCH / URI: /admin/exams/{id}
    public function update(Request $request)
    {
        $id = session('id_exam');
        $data = $request->all();

        if ($this->exams->updateExam($data, $id)) {
            return redirect()->route('admin.exams')->with('success', 'Exam updated successfully');
        } else {
            return redirect()->route('admin.exams')->with('error', 'Exam update failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     */

    // Use the destroy method to delete a specific exam from the database. / Method: DELETE / URI: /admin/exams/{id}
    public function destroy(string $id)
    {
        if ($this->exams->deleteExam($id)) {
            return redirect()->route('admin.exams')->with('success', 'Exam deleted successfully');
        } else {
            return redirect()->route('admin.exams')->with('error', 'Exam deletion failed');
        }
    }
}
