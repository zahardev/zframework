<?php
/**
 * @var \App\Models\News[] $news
 * */
?><!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>
<h1>Admin</h1>
<h2>Add news</h2>

<?php include __DIR__ . '/add_news_form.php'; ?>
<?php foreach ($news as $new): ?>
    <h2>
        <a href="/article.php?id=<?= $new->id; ?>">
            <?= $new->title; ?>
        </a>
    </h2>
    <div><?= $new->date; ?></div>
    <div><?= $new->content; ?></div>
<?php endforeach; ?>
</body>
</html>