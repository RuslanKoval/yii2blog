<?php
use common\models\Post;
/** @var $model Post */
?>

<div class="paragraph">
    <h3><a href="/blog/post/<?= $model->id ?>"><?= $model->title ?></a></h3>
    <p><?= $model->discription ?></p>
    <?php if (!empty($categoryNames)):?>
        <p><b>Категории</b>: <?= implode(', ', $categoryNames) ?></p>
    <?php else: ?>
        <p><b>Без категории</b></p>
    <?php endif?>
</div>