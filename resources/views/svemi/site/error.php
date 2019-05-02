<?php

use yii\helpers\Html;

$this->title = $name;
?>

<div class="container text-center">
    <div class="content-404">
        <h1><b>OPPS!</b> <?= Html::encode($this->title) ?></h1>
        <div class="alert alert-danger">
            <h3><?= nl2br(Html::encode($message)) ?></h3>
        </div>
        <h2><a href="<?= \yii\helpers\Url::home()?>">Вернуться на Главную</a></h2>
    </div>
</div>