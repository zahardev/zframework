<?php

require_once __DIR__ . '/../../autoload.php';

$user = \App\Models\Users::findById(1);

$user->name = 'testupdate';
$user->email = 'testupdate@test.test';

$user->update();

var_dump(\App\Models\Users::fetchAll());
