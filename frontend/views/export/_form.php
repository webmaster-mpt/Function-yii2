<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Export */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="export-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fname')->input('text') ?>

    <?= $form->field($model, 'name')->input('text') ?>

    <?= $form->field($model, 'sname')->input('text') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
