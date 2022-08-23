<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'Пользователи';
?>
<style>
    .container-from-chat{
        border: 1px solid black;
    }
    .chat-view{
        display: flex;
        justify-content: space-between;
        height: auto;
        padding: 15px;
    }
    .user-data,.link{
        display: inline-block;
    }
</style>
<div class="user-list-to-chat_form">
        <a href="chat-list?user_id=<?= Yii::$app->user->id ?>" target="_blank">Мои чаты(Beta)</a>
    <div class="container-from-chat">
        <?php $form = ActiveForm::begin(); ?>
        <?php foreach ($users as $user){ ?>
            <div class="chat-view">
                <div class="user-data">
                    <span><?= $user->username ?></span>
                </div>
                <div class="link">
                    <?= $form->field($model, 'user_id')->hiddenInput(['value' => $user->id])->label(false) ?>
                    <?= $form->field($model, 'chat_id')->hiddenInput(['value' => rand(0,1000)])->label(false) ?>
                    <?= Html::submitButton('Написать', ['class' => 'btn btn-danger']) ?>
                </div>
            </div>
        <?php } ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>
