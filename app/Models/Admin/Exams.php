<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Exams extends Model
{
    use HasFactory;

    protected $table = 'exams';

    public function getAllExams()
    {
        $exams = DB::select('SELECT * FROM exams');

        return $exams;
    }

    public function getExamById(string $id)
    {
        $exam = DB::select('SELECT * FROM exams WHERE id = ?', [$id]);

        return $exam;
    }

    public function createExam(array $data)
    {
        $exam = DB::insert('INSERT INTO exams (name, time_limit, number_of_questions, description, subject_id) VALUES (?, ?, ?, ?, ?)', [$data['name'], $data['timeLimit'], $data['limitQuest'], $data['desc'], $data['subject']]);

        return $exam;
    }

    public function updateExam(array $data, string $id)
    {
        $exam = DB::update('UPDATE exams SET name = ?, time_limit = ?, number_of_questions = ?, description = ?, subject_id = ? WHERE id = ?', [$data['name'], $data['timeLimit'], $data['limitQuest'], $data['desc'], $data['subject'], $id]);

        return $exam;
    }

    public function deleteExam(string $id)
    {
        $exam = DB::delete('DELETE FROM exams WHERE id = ?', [$id]);

        return $exam;
    }

    public function getMaxQuestions()
    {
        $maxQuestions = DB::select('SELECT exams.id, COUNT(questions.id) AS number_of_questions FROM exams LEFT JOIN questions ON exams.id = questions.exam_id GROUP BY exams.id');

        return $maxQuestions;
    }
}
