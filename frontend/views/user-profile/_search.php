<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserProfileSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-profile-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'Fname') ?>

    <?= $form->field($model, 'Name') ?>

    <?= $form->field($model, 'Sname') ?>

    <?php // echo $form->field($model, 'Age') ?>

    <?php // echo $form->field($model, 'DateOfBirth') ?>

    <?php // echo $form->field($model, 'Phone') ?>

    <?php // echo $form->field($model, 'Address') ?>

    <?php // echo $form->field($model, 'linkGithub') ?>

    <?php // echo $form->field($model, 'linkVk') ?>

    <?php // echo $form->field($model, 'linkInstagram') ?>

    <?php // echo $form->field($model, 'Proffession') ?>

    <?php // echo $form->field($model, 'Image') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
