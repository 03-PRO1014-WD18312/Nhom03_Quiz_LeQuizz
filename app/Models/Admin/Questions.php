<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Questions extends Model
{
    use HasFactory;

    public function getAllQuestions()
    {
        $questions = DB::select('SELECT * FROM questions');

        return $questions;
    }

    public function getQuestionById(string $id)
    {
        $question = DB::select('SELECT * FROM questions WHERE id = ?', [$id]);

        return $question;
    }

    public function createQuestion(array $data)
    {
        $question = DB::insert('INSERT INTO questions (name, option_a, option_b, option_c, option_d, correct_answer, exam_id) VALUES (?, ?, ?, ?, ?, ?, ?)', [$data['question'], $data['choice1'], $data['choice2'], $data['choice3'], $data['choice4'], $data['correct'], $data['exam']]);

        return $question;
    }

    public function updateQuestion(array $data, string $id)
    {
        $question = DB::update('UPDATE questions SET name = ?, option_a = ?, option_b = ?, option_c = ?, option_d = ?, correct_answer = ?, exam_id = ? WHERE id = ?', [$data['question'], $data['choice1'], $data['choice2'], $data['choice3'], $data['choice4'], $data['correct'], $data['exam'], $id]);

        return $question;
    }

    public function deleteQuestion(string $id)
    {
        $question = DB::delete('DELETE FROM questions WHERE id = ?', [$id]);

        return $question;
    }
}
