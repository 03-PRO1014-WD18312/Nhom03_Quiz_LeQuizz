<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Users extends Model
{
    use HasFactory;

    public function joinUserAndSubject()
    {
        $user = DB::select('SELECT * FROM users INNER JOIN users_subjects ON users.id = users_subjects.user_id INNER JOIN subjects ON users_subjects.subject_id = subjects.id');

        return $user;
    }

    public function registerSubjectByUserId(string $subject_id, string $user_id)
    {
        $register = DB::insert('INSERT INTO users_subjects (user_id, subject_id) VALUES (?, ?)', [$user_id, $subject_id]);

        return $register;
    }

    public function unregisterSubjectByUserId(string $subject_id, string $user_id)
    {
        $unregister = DB::delete('DELETE FROM users_subjects WHERE user_id = ? AND subject_id = ?', [$user_id, $subject_id]);

        return $unregister;
    }

    public function checkRegisterSubjectByUserId(string $subject_id, string $user_id)
    {
        $check = DB::select('SELECT * FROM users_subjects WHERE user_id = ? AND subject_id = ?', [$user_id, $subject_id]);

        return $check;
    }
}
