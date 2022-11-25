<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Helper */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="chat">
        <?php
        foreach ($msgs as $msg){?>
            <?php if($msg->user_id == Yii::$app->user->id && $msg->question_text !== null){ ?>
                <div class="text-user-div">
                    <div class="text-user-container">
                        <div class="text-user" lang="ru"><?= $msg->question_text ?></div>
                    </div>
                </div>
            <?php } else if($msg->question_text !== null) { ?>
                <div class="text-admin-div">
                    <label id="name"><?= $msg->user->username?></label>
                    <div class="text-admin-container" lang="ru">
                        <div class="text-admin"><?= $msg->question_text ?></div>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    <div class="row">
        <div class="chat__form">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'uniq_code')->hiddenInput()->label(false) ?>

            <?= $form->field($model, 'user_id')->hiddenInput()->label(false) ?>

            <?= $form->field($model, 'admin_id')->hiddenInput()->label(false) ?>

            <?= $form->field($model,'date')->hiddenInput(['value' => date("Y:m:d")])->label(false) ?>

            <div class="chat_main">
                <?= $form->field($model, 'question_text')->input('text', ['id' => 'text-form', 'placeholder' => 'Сообщение...'])->label(false) ?>
                <?= Html::submitButton('', ['class' => 'btn btn-success myBtn']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>