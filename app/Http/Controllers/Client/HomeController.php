<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Client\Subjects;

class HomeController extends Controller
{
    private $subjects;

    public function __construct()
    {
        $this->subjects = new Subjects();
    }

    public function index()
    {
        $listSubjects = $this->subjects->getAllSubjects();

        $token = csrf_token();

        return view('clients.home', compact('listSubjects', 'token'));
    }
}
