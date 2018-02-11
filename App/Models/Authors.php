<?php

namespace App\Models;

use \App\Model;

class Authors extends Model
{
    const TABLE = 'authors';

    public $name;
    public $email;
}