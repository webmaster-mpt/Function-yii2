<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Status;
use backend\models\Realty;

/* @var $this yii\web\View */
/* @var $model backend\models\Aboba */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aboba-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'age')->textInput() ?>
    <?= $form->field($model, 'status_id')->dropDownList(Status::find()->select(['name','id'])->indexBy('id')->column(),['prompt'=>'']) ?>

    <?= $form->field($model, 'date_birthday')->textInput(['type'=>'date']) ?>

    <?= $form->field($model, 'realty_id')->dropDownList(Realty::find()->select(['name','id'])->indexBy('id')->column(),['prompt'=>'']) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
