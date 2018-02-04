<?php

require_once __DIR__ . '/../../autoload.php';

$user = new \App\Models\Users();

$user->name = 'testInsert2';

$user->email = 'testinsert@test.test';

$user->insert();

var_dump(\App\Models\Users::fetchAll());
