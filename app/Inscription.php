<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Inscription extends Model
{
    protected $table = 'inscriptions';



    public function user()
    {
        return User::find($this->id_user);
    }
}
