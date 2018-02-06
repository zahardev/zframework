<?php

require_once __DIR__ . '/../../autoload.php';

$user = \App\Models\Users::findById(3);

$user->delete();

var_dump(\App\Models\Users::fetchAll());
