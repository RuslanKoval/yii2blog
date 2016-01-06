<?php
use common\models\Post;
/** @var $model Post */
?>

<div class="paragraph">
    <h3><a href="/blog/post/<?= $model->id ?>"><?= $model->title ?></a></h3>
    <p><?= $model->discription ?></p>
</div>