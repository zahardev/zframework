<?php

require_once 'autoload.php';

if(isset($_POST['news_title'])){
    $news = new \App\Models\News();
    $news->title = filter_input(INPUT_POST, 'news_title');
    $news->content = filter_input(INPUT_POST, 'news_content');
    $news->date = filter_input(INPUT_POST, 'news_date');
    if(empty($news->date)){
      $news->date = date('Y-m-d');
    }
    $news->save();
    header('LOCATION: ' . '/admin.php');
}


$news = \App\Models\News::getLastNews('DESC', 0, 100);

include __DIR__ . '/App/views/admin.php';
