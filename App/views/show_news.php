<?php foreach ($news as $new): ?>
    <h2>
        <a href="/article.php?id=<?= $new->id; ?>">
            <?= $new->title; ?>
        </a>
    </h2>
    <div><?= $new->date; ?></div>
    <div><?= $new->content; ?></div>
<?php endforeach; ?>