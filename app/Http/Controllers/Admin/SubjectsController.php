<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Subjects;
use App\Models\Admin\Exams;
use Illuminate\Support\Facades\Storage;

class SubjectsController extends Controller
{
    private $subjects;
    private $exams;

    public function __construct()
    {
        $this->subjects = new Subjects();
        $this->exams = new Exams();
    }

    /**
     * Display a listing of the resource.
     */

    // Use the index method to display a list of exams. / Method: GET / URI: /admin/exams
    public function index()
    {
        $listSubjects = $this->subjects->getAllSubjects();

        return view('admin.subjects.lists', compact('listSubjects'));
    }

    /**
     * Show the form for creating a new resource.
     */

    // Use the create method to display a form for creating a new exam. / Method: GET / URI: /admin/exams/create
    public function create()
    {
        $listSubjects = $this->subjects->getAllSubjects();

        return view('admin.subjects.create', compact('listSubjects'));
    }

    /**
     * Store a newly created resource in storage.
     */

    // Use the store method to store a newly created exam in the database. / Method: POST / URI: /admin/exams
    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('img')) {
            $file = $request->img;
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $ext;
            $file->storeAs('public', $fileName);
        }

        $data['img'] = $fileName;

        if ($this->subjects->createSubject($data)) {
            return redirect()->route('admin.subjects')->with('success', 'Subject created successfully');
        } else {
            return redirect()->route('admin.subjects')->with('error', 'Subject created failed');
        }
    }

    /**
     * Display the specified resource.
     */

    // Use the show method to display a specific exam. / Method: GET / URI: /admin/exams/{id}
    public function show(string $id)
    {
        $getSubject = $this->subjects->getSubjectById($id);

        $listExams = $this->exams->getAllExams();

        return view('admin.subjects.show', compact('getSubject', 'listExams'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    // Use the edit method to display a form for editing a specific exam. / Method: GET / URI: /admin/exams/{id}/edit
    public function edit(Request $request, string $id)
    {
        $request->session()->put('id_subject', $id);

        $getSubject = $this->subjects->getSubjectById($id);

        return view('admin.subjects.edit', compact('getSubject'));
    }

    /**
     * Update the specified resource in storage.
     */

    // Use the update method to update a specific exam in the database. / Method: PUT/PATCH / URI: /admin/exams/{id}
    public function update(Request $request)
    {
        $id = session('id_subject');

        $data = $request->all();

        $getSubject = $this->subjects->getSubjectById($id);

        if ($request->hasFile('img')) {
            $file = $request->img;
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $ext;
            $file->storeAs('public', $fileName);
            $data['img'] = $fileName;
        } else {
            $data['img'] = $getSubject[0]->image;
        }

        if ($this->subjects->updateSubject($data, $id)) {
            return redirect()->route('admin.subjects')->with('success', 'Subject updated successfully');
        } else {
            return redirect()->route('admin.subjects')->with('error', 'Subject update failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     */

    // Use the destroy method to delete a specific exam from the database. / Method: DELETE / URI: /admin/exams/{id}
    public function destroy(string $id)
    {
        if ($this->subjects->deleteSubject($id)) {
            return redirect()->route('admin.subjects')->with('success', 'Subject deleted successfully');
        } else {
            return redirect()->route('admin.subjects')->with('error', 'Subject deleted failed');
        }
    }
}
