<?php
/* @var $this yii\web\View */
/* @var $model \backend\models\Chat */

use yii\widgets\ActiveForm;
$this->title = 'Чат';
$this->params['breadcrumbs'][] = $this->title;
?>
<link rel="stylesheet" href="/chat.css">
<div class="chat">
    <div class="chat__wrapper">
        <?php
        foreach ($findMsgs as $findMsg){?>
            <?php if($findMsg->user_id == Yii::$app->user->id){ ?>
                <div class="head-green">
                    <label id="name"><?= $findMsg->user->username ?></label>
                </div>
                <div class="chat__message-green">
                    <div><?= $findMsg->text ?></div>
                </div>
            <?php } else { ?>
                <div class="head">
                    <label id="name"><?= $findMsg->user->username ?></label>
                </div>
                <div class="chat__message">
                        <div><?= $findMsg->text ?></div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</div>
<div class="chat__form">
    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'user_id')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'created_at')->hiddenInput()->label(false) ?>
        <div class="chat_main">
            <?= $form->field($model, 'text')->input('text', ['id' => 'text-form','placeholder' => 'Ваш текст'])->label(false) ?>

            <?= \yii\helpers\Html::submitButton('Отправить', ['class' => 'btn btn-success myBtn']) ?>
        </div>
    <?php ActiveForm::end() ?>
</div>