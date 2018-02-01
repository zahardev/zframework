<?php
/**
 * @var \App\Models\News $article
 * */
?><!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>News</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>
  <h1><?= $article->title; ?></h1>
    <?= $article->date; ?>
    <?= $article->content; ?>
</body>
</html>