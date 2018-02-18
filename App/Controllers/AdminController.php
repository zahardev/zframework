<?php

namespace App\Controllers;

use App\Controller;
use App\Models\News;
use App\MultiException;
use App\View;

class AdminController extends Controller
{
    public function actionIndex()
    {
        $view = new View();

        $view->news = News::getLastNews('DESC', 0, 100);

        if( PHP_SESSION_NONE === session_status()){
            session_start();
        }

        $view->errors  = $_SESSION['errors'] ?? [];

        $view->display('admin');
    }

    public function actionAdd()
    {
        $news = new News();
        $news->title = filter_input(INPUT_POST, 'news_title');
        $news->content = filter_input(INPUT_POST, 'news_content');
        $news->date = filter_input(INPUT_POST, 'news_date');
        if(empty($news->date)){
            $news->date = date('Y-m-d');
        }
        try{
            $news->save();
        } catch (MultiException $errors){
            if( PHP_SESSION_NONE === session_status()){
                session_start();
            }
            if( PHP_SESSION_ACTIVE === session_status()){
                $_SESSION['errors'] = $errors;
            }
        }
        header('LOCATION: ' . '/admin/');
    }

    public function actionDelete()
    {
        $id = filter_input(INPUT_POST, 'id');
        $new = News::findById($id);
        $new->delete();
        header('LOCATION: ' . '/admin/');
    }

    public function actionUpdate()
    {
        $id = filter_input(INPUT_POST, 'id');
        $new = News::findById($id);
        $fields = ['title', 'content', 'date'];

        foreach ($fields as $field) {
            $new->{$field} = filter_input(INPUT_POST, $field);
        }
        $new->save();
        header('LOCATION: ' . '/admin/');
    }
}
