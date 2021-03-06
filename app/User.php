<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public fucntion path() {
        return true;
    }

    public fucntion age($id) 
    {
        $user = User::findOrFail($id);

        return $user->age;
    }

    public function details()
    {
        $users = User::all();

        return $users->map( function ($user) {
            return [
                'name' => $user->firstname . ' ' . $user->secondname,
                'age' => $user->age,
                'username' => $user->username
            ];
        });
    }
}
