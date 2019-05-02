<?php

use app\models\CommentForm;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$commentForm = new CommentForm();

?>

<!--Comments-->
<div class="response-area">
    <?php if (!empty($comments)): ?>
        <h2>Комментарии (<?= count($comments) ?>)</h2>
    <?php else: ?>
        <h2>Оставьте первый комментарий к статье</h2>
    <?php endif;?>

    <?php if (!empty($comments)): ?>
        <ul class="media-list">

            <?php foreach($comments as $comment): ?>
                <li class="media"><!-- Для дочерних коментов добавить класс second-media-->
                    <a class="pull-left" href="#">
                        <?php if ($comment->user): ?>
                            <?= Html::img('@web/images/avatar/'.$comment->user->avatar, ['alt' => $comment->user->username, 'class' => 'media-object'])?>
                        <?php else : ?>
                            <?= Html::img('https://www.gravatar.com/avatar/'.md5($comment->userComment->email).'?d=mm&s=100', ['alt' => $comment->userComment->username, 'class' => 'media-object'])?>
                        <?php endif; ?>

                    </a>
                    <div class="media-body">
                        <ul class="sinlge-post-meta">
                            <li><i class="fa fa-user"></i>
                                <?php if ($comment->user): ?>
                                    <?= $comment->user->username ?>
                                <?php else : ?>
                                    <?= $comment->userComment->username ?>
                                <?php endif; ?>
                            </li>
                            <li><i class="fa fa-clock-o"></i><?= date("g:i a", $comment->date) ?></li>
                            <li><i class="fa fa-clock-o"></i><?= getDates($comment->date) ?></li>
                        </ul>
                        <p><?= $comment->text ?></p>
                        <!--<a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>-->
                    </div>
                </li>
            <?php endforeach;?>

        </ul>

    <?php endif;?>
</div>

<!--/Response-area-->
<div class="replay-box">
    <div class="row">

        <?php if(Yii::$app->session->getFlash('comment')):?>
            <div class="alert alert-success" role="alert">
                <?= Yii::$app->session->getFlash('comment'); ?>
            </div>
        <?php endif;?>

<!--        <h2>Добавление комментариев</h2>-->

        <?php $form = ActiveForm::begin([
            'action'=>['/blog/comment'],
            'options'=>['class'=>'form-horizontal contact-form', 'role'=>'form']]);
        ?>

        <? echo $form->field($commentForm, 'article_id')->hiddenInput(['value' => isset($article->id) ? $article->id : ''])->label(false); ?>
        <? echo $form->field($commentForm, 'product_id')->hiddenInput(['value' => isset($product->id) ? $product->id : ''])->label(false); ?>

        <?php if(Yii::$app->user->isGuest): ?>

            <div class="col-sm-4">
                <div class="blank-arrow">
                    <label>Ваше имя</label>
                </div>
                <?= $form->field($commentForm, 'username')->textInput(['maxlength' => true,'placeholder'=>'Ваше имя...', 'value' => 'Гость'])->label(false) ?>
                <div class="blank-arrow">
                    <label>Email адрес</label>
                </div>
                <span>*</span>
                <?= $form->field($commentForm, 'email')->input('email', ['maxlength' => true,'placeholder'=>'Ваш email адрес...', 'value' => Yii::$app->user->identity->email])->label(false) ?>
            </div>
        <?php else: ?>

            <? echo $form->field($commentForm, 'username')->hiddenInput(['value' => Yii::$app->user->identity->username])->label(false); ?>

            <? echo $form->field($commentForm, 'email')->hiddenInput(['value' => Yii::$app->user->identity->email])->label(false); ?>

        <?php endif;?>

        <div class="col-sm-8">
            <div class="text-area">
                <div class="blank-arrow">
                    <label>Комментарий</label>
                </div>
                <span>*</span>
                <?= $form->field($commentForm, 'comment')->textarea(['class'=>'form-control','placeholder'=>'Ваше сообщение', 'rows' => '7'])->label(false)?>
            </div>
        </div>
        <div class="clearfix"></div>
        <?= Html::submitButton('Добавить комментарий', ['class' => 'btn btn-primary']) ?>
        <?php ActiveForm::end();?>

    </div>
</div><!--/Repaly Box-->