<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Dictionary */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dictionary-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'deutch')->input('text') ?>

    <?= $form->field($model, 'russian')->input('text') ?>

    <?= $form->field($model, 'transcription')->input('text') ?>

    <?= $form->field($model, 'type')->dropDownList([
            'wort' => 'wort',
            'bieten' => 'bieten'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
