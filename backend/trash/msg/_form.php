<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Msg */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="msg-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'uniq_code')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'userGet_id')->textInput() ?>

    <?= $form->field($model, 'text')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
