<!doctype html>
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

    <?php $news = \App\Models\News::getLastNews(); ?>

    <?php foreach ($news as $new): ?>
        <h2><?= $new->title; ?></h2>
        <div><?= $new->date; ?></div>
        <div><?= $new->content; ?></div>
    <?php endforeach; ?>
</body>
</html>