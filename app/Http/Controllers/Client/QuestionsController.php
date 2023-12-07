<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Client\Subjects;
use App\Models\Client\Exams;
use App\Models\Client\Questions;
use App\Models\Client\UserScore;

class QuestionsController extends Controller
{
    private $subjects;
    private $exams;
    private $questions;
    private $userScore;

    public function __construct()
    {
        $this->subjects = new Subjects();
        $this->exams = new Exams();
        $this->questions = new Questions();
        $this->userScore = new UserScore();
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $getExam = $this->exams->getExamById($id);

        $listQuestions = $this->questions->getAllQuestions();

        foreach ($getExam as $exam) {
            $timeLimit = $exam->time_limit;
            foreach ($listQuestions as $question) {
                if ($exam->id == $question->exam_id) {
                    $countdown = $timeLimit * 60;
                }
            }
        }

        return view('clients.questions.show', compact('getExam', 'listQuestions', 'countdown'));
    }

    public function completeExam(Request $request, string $examId, string $userId)
    {
        $answers = $request->all();

        $getExam = $this->exams->getExamById($examId);

        $listQuestions = $this->questions->getAllQuestions();

        $userAnswers = $answers['answers'];

        $point = 0;

        foreach ($getExam as $exam) {
            $limitQuest = $exam->number_of_questions;

            foreach ($listQuestions as $question) {
                if ($exam->id == $question->exam_id) {
                    foreach ($userAnswers as $key => $userAnswer) {
                        if ($question->id == $key) {
                            if ($question->correct_answer == $userAnswer) {
                                $point++;
                            }
                        }
                    }
                }
            }
        }

        $point = $point / $limitQuest * 10;

        $data = [
            'user_id' => $userId,
            'exam_id' => $examId,
            'score' => $point
        ];

        $createUserScore = $this->userScore->createUserScore($data);

        if ($createUserScore) {
            return redirect()->route('questions.result', [$examId, $userId])->with('success', 'Exam completed successfully!');
        } else {
            return redirect()->route('questions.result', [$examId, $userId])->with('error', 'Exam completed failed!');
        }
    }

    public function result(string $examId, string $userId)
    {
        $getExam = $this->exams->getExamById($examId);

        $getUserScore = $this->userScore->getUserScoreByExamIdAndUserId($examId, $userId);

        return view('clients.questions.result', compact('getExam', 'getUserScore'));
    }
}
