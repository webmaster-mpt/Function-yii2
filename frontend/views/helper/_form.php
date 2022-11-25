<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Helper */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    .chat__message {
        font-size: 18px;
        padding: 10px 20px;
        border-radius: 25px;
        color: #FFFFFF;
        background-color: #FF6D6D;
        max-width: 300px;
        position: relative;
        direction: ltr;
        margin-bottom: 15px;
    }
    #name{
        margin-left: 20px;
    }
    .head{
        display: flex;
        justify-content: space-between;
        max-width: 580px;
        height: 20px;
        margin-bottom: 5px;
    }
    #date-green{
        margin-right: 20px;
    }
    .head-green{
        display: flex;
        justify-content: space-between;
        height: 20px;
        margin-bottom: 5px;
        margin-left: 80%;
    }
    .chat__message-green{
        font-size: 18px;
        padding: 10px 20px;
        border-radius: 25px;
        color: #FFFFFF;
        background-color: #7FC04B;
        max-width: 300px;
        position: relative;
        direction: ltr;
        margin-bottom: 15px;
        margin-left: 80%;
    }
    .chat__form{
        width: 940px;
    }
    .chat_main{
        display: inline-flex;
        width: 940px;
    }
    #text-form{
        width: 1020px;
        padding-left: 15px;
    }
    .myBtn{
        height: 35px;
        margin-left: 15px;
    }
</style>
<div class="chat">
    <div class="chat__wrapper">
        <?php
        foreach ($msgs as $msg){?>
            <?php if($msg->user_id == Yii::$app->user->id && $msg->question_text !== null){ ?>
                <div class="head-green">
                    <label id="name"><?= $msg->user->username?></label>
                </div>
                <div class="chat__message-green">
                    <div><?= $msg->question_text ?></div>
                </div>
            <?php } else if($msg->question_text !== null) { ?>
                <div class="head">
                    <label id="name"><?= $msg->user->username?></label>
                </div>
                <div class="chat__message">
                    <div><?= ($msg->question_text) ?></div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</div>
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
