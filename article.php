<?php

require_once 'autoload.php';

$id      = filter_input(INPUT_GET, 'id');
$article = \App\Models\News::findById($id);

if ($article) {
    include __DIR__.'/App/views/article.php';
} else {
    echo 'Page not found!';
}
