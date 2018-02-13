<?php

namespace App\Controllers;

use App\Controller;
use App\Models\News;
use App\View;

class NewsController extends Controller
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }


    function actionIndex()
    {
        $news = News::getLastNews();

        $this->view->news = $news;

        $this->view->display('home');
    }

    public function actionArticle()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if($id){
            $this->view->article = News::findById($id);

            if ($this->view->article) {
                $this->view->display('article');
                return;
            }
        }
        echo 'Page not found!';
    }
}