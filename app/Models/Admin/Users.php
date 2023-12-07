<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Users extends Model
{
    use HasFactory;

    public function getAllUsers()
    {
        $users = DB::select('SELECT * FROM users');

        return $users;
    }

    public function getUserById(string $id)
    {
        $user = DB::select('SELECT * FROM users WHERE id = ?', [$id]);

        return $user;
    }

    public function createUser(array $data)
    {
        $user = DB::insert('INSERT INTO users (name, email, email_verified_at, password, role) VALUES (?, ?, ?, ?, ?)', [$data['name'], $data['email'], $data['email_verified_at'], $data['password'], $data['role']]);

        return $user;
    }

    public function updateUser(array $data, string $id)
    {
        $user = DB::update('UPDATE users SET name = ?, email = ?, password = ?, role = ? WHERE id = ?', [$data['name'], $data['email'], $data['password'], $data['role'], $id]);

        return $user;
    }

    public function deleteUser(string $id)
    {
        $user = DB::delete('DELETE FROM users WHERE id = ?', [$id]);

        return $user;
    }
}
