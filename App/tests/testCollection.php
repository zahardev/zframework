<?php

require_once __DIR__ . '/../../autoload.php';

$collection = new \App\MultiException();

$collection[] = 11;
$collection[] = 22;
$collection[] = 333;

foreach ($collection as $item) {
   echo $item;
}
