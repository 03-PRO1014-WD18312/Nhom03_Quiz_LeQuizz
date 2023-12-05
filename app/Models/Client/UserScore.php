<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class UserScore extends Model
{
    use HasFactory;

    public function createUserScore($data)
    {
        $create = DB::insert('INSERT INTO users_scores (user_id, exam_id, score) VALUES (?, ?, ?)', [$data['user_id'], $data['exam_id'], $data['score']]);

        return $create;
    }

    public function getUserScoreByExamIdAndUserId($examId, $userId)
    {
        $getUserScore = DB::select('SELECT * FROM users_scores WHERE exam_id = ? AND user_id = ? ORDER BY id DESC LIMIT 1', [$examId, $userId]);

        return $getUserScore;
    }
}
