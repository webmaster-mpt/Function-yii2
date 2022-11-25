<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Helper */
/* @var $form yii\widgets\ActiveForm */
?>
<style>

</style>
<div class="chat">
    <div class="chat__wrapper">
        <?php
        foreach ($msgs as $msg){?>
            <?php if($msg->user_id == Yii::$app->user->id && $msg->question_text !== null){ ?>
                <div class="row">
                    <div class="col"></div>
                    <div class="col">
                        <div class="head-user">
                            <label id="name"><?= $msg->user->username?></label>
                        </div>
                        <div class="chat__message-user">
                            <p class="text"><?= $msg->question_text ?></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php } else if($msg->question_text !== null) { ?>
                        <div class="col">
                            <div class="head-admin">
                                <label id="name"><?= $msg->user->username?></label>
                            </div>
                            <div class="chat__message-admin">
                                <p class="text"><?= ($msg->question_text) ?></p>
                            </div>
                        </div>
                        <div class="col"></div>
                    <?php } ?>
                </div>
        <?php } ?>
        <div class="row">
            <div class="chat__form">
                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'uniq_code')->hiddenInput()->label(false) ?>

                <?= $form->field($model, 'user_id')->hiddenInput()->label(false) ?>

                <?= $form->field($model, 'admin_id')->hiddenInput()->label(false) ?>

                <?= $form->field($model,'date')->hiddenInput(['value' => date("Y:m:d")])->label(false) ?>

                <div class="chat_main">
                    <?= $form->field($model, 'question_text')->input('text', ['id' => 'text-form'])->label(false) ?>
                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-success myBtn']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

