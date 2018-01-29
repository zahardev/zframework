<?php

require_once 'autoload.php';

$db = new \App\Db();

var_dump(\App\Models\Users::fetchAll());

