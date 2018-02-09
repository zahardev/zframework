<?php

require_once 'autoload.php';

$action = filter_input(INPUT_POST, 'action');
if($action){
    $id = filter_input(INPUT_POST, 'id');
    switch ($action){
        case 'add' :
            $news = new \App\Models\News();
            $news->title = filter_input(INPUT_POST, 'news_title');
            $news->content = filter_input(INPUT_POST, 'news_content');
            $news->date = filter_input(INPUT_POST, 'news_date');
            if(empty($news->date)){
                $news->date = date('Y-m-d');
            }
            $news->save();
            break;
        case 'delete':
            $new = \App\Models\News::findById($id);
            $new->delete();
            break;
        case 'update':
            $new = \App\Models\News::findById($id);
            $fields = ['title', 'content', 'date'];

            foreach ($fields as $field) {
                $new->{$field} = filter_input(INPUT_POST, $field);
            }
            $new->save();
            break;
    }
    header('LOCATION: ' . '/admin.php');
}


$news = \App\Models\News::getLastNews('DESC', 0, 100);

include __DIR__ . '/App/views/admin.php';
