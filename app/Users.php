<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $fillable = [
        'email',
        'password',
        'name',
        'avatar_url',
        'active',
        'admin',
        'rating',
        'data_register',
        'code',
        'api_token'];

    public function generateToken()
    {
        $this->api_token = str_random(60);
        $this->save();

        return $this->api_token;
    }
}
