<?php
use common\models\Post;
/** @var $model Post */
?>

<div class="paragraph">
    <h2><a href="/blog/post/<?= $model->id ?>"><?= $model->title ?></a></h2>
    <p><?= $model->discription ?></p>
</div>