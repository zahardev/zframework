<?php

namespace App\Models;

use \App\Model;

class Users extends Model
{
    const TABLE = 'users';

    public $name;
    public $email;
}