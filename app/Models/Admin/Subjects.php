<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Subjects extends Model
{
    use HasFactory;

    public function getAllSubjects()
    {
        $subjects = DB::select('SELECT * FROM subjects');

        return $subjects;
    }

    public function getSubjectById(string $id)
    {
        $subject = DB::select('SELECT * FROM subjects WHERE id = ?', [$id]);

        return $subject;
    }

    public function createSubject(array $data)
    {
        $subject = DB::insert('INSERT INTO subjects (name, description, image) VALUES (?, ?, ?)', [$data['name'], $data['detail'], $data['img']]);

        return $subject;
    }

    public function updateSubject(array $data, string $id)
    {
        $subject = DB::update('UPDATE subjects SET name = ?, description = ?, image = ? WHERE id = ?', [$data['name'], $data['detail'], $data['img'], $id]);

        return $subject;
    }

    public function deleteSubject(string $id)
    {
        $subject = DB::delete('DELETE FROM subjects WHERE id = ?', [$id]);

        return $subject;
    }
}
