<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Client\Subjects;
use App\Models\Client\Exams;
use App\Models\Client\Users;
use Illuminate\Support\Facades\Auth;

class SubjectsController extends Controller
{
    private $subjects;
    private $exams;
    private $users;

    public function __construct()
    {
        $this->subjects = new Subjects();
        $this->exams = new Exams();
        $this->users = new Users();
    }

    public function index()
    {
        return view('client.subjects.lists');
    }

    public function show(string $id)
    {
        $getSubject = $this->subjects->getSubjectById($id);

        $listExams = $this->exams->getAllExams();

        $checkRegister = $this->checkRegisterSubject($id);

        return view('clients.subjects.show', compact('getSubject', 'listExams', 'checkRegister'));
    }

    public function registerSubject(string $id)
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;

            $register = $this->users->registerSubjectByUserId($id, $user_id);


            if ($register) {
                return redirect()->route('subjects.show', ['id' => $id])->with('success', 'Đăng ký thành công');
            } else {
                return redirect()->route('subjects.show', ['id' => $id])->with('error', 'Đăng ký thất bại');
            }
        } else {
            return redirect()->route('subjects.show', ['id' => $id])->with('error', 'Bạn cần đăng nhập để đăng ký');
        }
    }

    public function unregisterSubject(string $id)
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;

            $unregister = $this->users->unregisterSubjectByUserId($id, $user_id);

            if ($unregister) {
                return redirect()->route('subjects.show', ['id' => $id])->with('success', 'Hủy đăng ký thành công');
            } else {
                return redirect()->route('subjects.show', ['id' => $id])->with('error', 'Hủy đăng ký thất bại');
            }
        } else {
            return redirect()->route('subjects.show', ['id' => $id])->with('error', 'Bạn cần đăng nhập để hủy đăng ký');
        }
    }

    public function checkRegisterSubject(string $id)
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;

            $check = $this->users->checkRegisterSubjectByUserId($id, $user_id);

            return $check;
        } else {
            return false;
        }
    }
}
