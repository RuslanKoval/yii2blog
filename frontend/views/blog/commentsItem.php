<?php
use common\models\Coments;
/** @var $model Coments */
?>

<div class="paragraph">
    <h3><a href="/blog/post/<?= $model->id ?>"><?= $model->title ?></a></h3>
    <p><?= $model->discription ?></p>
</div>

<div class="paragraph">
    <h3>Коментарии</h3>
    <?= $comments;?>
</div>

