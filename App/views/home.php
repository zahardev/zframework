<?php
/**
 * @var \App\Models\News[] $news
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
  <h1>News</h1>
    <?php foreach ($news as $new): ?>
        <h2>
            <a href="/article.php?id=<?= $new->id; ?>">
                <?= $new->title; ?>
            </a>
        </h2>
        <div>Author: <?php echo $new->author->name ?? 'no author'; ?></div>
        <div><?= $new->date; ?></div>
        <div><?= $new->content; ?></div>
    <?php endforeach; ?>
</body>
</html>