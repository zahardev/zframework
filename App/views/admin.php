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
        <hr>

        <a href="/article.php?id=<?= $new->id; ?>">
            View
        </a>
        <form action="" method="post">
            <input type="hidden" name="action" value="update" />
            <input type="hidden" name="id" value="<?= $new->id; ?>" />
            <h2>
                <input type="text" name="title" value="<?= $new->title; ?>" />
            </h2>
            <div>
                <input type="text" name="date" value="<?= $new->date; ?>" />
            </div>
            <div>
                <textarea cols="100" rows="5" name="content"><?= $new->content; ?></textarea>
            </div>

            <input type="submit" value="update" style="float:;" />
        </form>
        <form action="" method="post">
            <input type="hidden" name="action" value="delete" />
            <input type="hidden" name="id" value="<?= $new->id; ?>" />
            <input type="submit" value="delete" />
        </form>
    <?php endforeach; ?>

</body>
</html>