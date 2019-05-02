<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\widgets\Pjax;

$this->params['breadcrumbs'][] = 'Контакты';
?>
<div class="site-contact">

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Ваше сообщение отправлено и в скором времени будет рассмотрено
        </div>

    <?php else: ?>

        <p>
            Если у вас есть деловые предложения или другие вопросы, пожалуйста, заполните следующую форму, чтобы связаться с нами.<br />Спасибо.
        </p>

        <div class="row">
            <div class="col-lg-6">
                <h2 class="title text-center">Форма обратной связи</h2>

                <?php Pjax::begin(['enablePushState' => false]) ?>
                <?php $form = ActiveForm::begin(['id' => 'contact-form', 'options' => ['data-pjax' => true]]); ?>

                    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'body')->textArea(['rows' => 6]) ?>

                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>
                <?php Pjax::end() ?>

            </div>
            <div class="col-lg-6">
                <h2 class="title text-center">Реквизиты</h2>
                <?= $contact->text ?>
            </div>

        </div>

    <?php endif; ?>
</div>