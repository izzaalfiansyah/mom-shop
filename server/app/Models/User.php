<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class User extends Model
{
    use HasFactory;

    public $table = 'user';

    public $fillable = [
        'username',
        'password',
        'nama',
        'role',
    ];

    public $appends = [
        'roleDetail',
    ];

    public function getRoleDetailAttribute()
    {
        $role =  [1 => 'admin', 2 => 'general'][(int) $this->role];
        return $role;
    }

    public static function rules($id = null)
    {
        return [
            'username' => ['required', $id ? Rule::unique('user')->ignore($id) : Rule::unique('user'), 'min:5', 'max:255'],
            'password' => [$id ? 'nullable' : 'required', Password::min(8), 'min:8'],
            'nama' => 'required|max:255|min:2',
            'role' => 'required|in:1,2',
        ];
    }
}
