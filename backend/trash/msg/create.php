<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Msg */

$this->title = 'Create Msg';
$this->params['breadcrumbs'][] = ['label' => 'Msgs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="msg-create">

    <h1><?= Html::encode($this->title) ?></h1>

<!--    --><?//= $this->render('_form', [
//        'model' => $model,
//    ]) ?>

    <div class="chat__wrapper">
        <?php
        foreach ($msgs as $msg){?>
            <?php if($msg->user_id == Yii::$app->user->id && $msg->text !== null){ ?>
                <div class="head-green">
                    <label id="name"><?= $msg->user->username?></label>
                </div>
                <div class="chat__message-green">
                    <div><?= $msg->text ?></div>
                </div>
            <?php } else if($msg->text !== null) { ?>
                <div class="head">
                    <label id="name"><?= $msg->user->username?></label>
                </div>
                <div class="chat__message">
                    <div><?= ($msg->text) ?></div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'uniq_code')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'user_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'userGet_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'text')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
