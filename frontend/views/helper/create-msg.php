<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Helper */

$this->title = 'Поддержка';
?>
<div class="helper_create-msg">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'uniq_code')->hiddenInput(['value'=>$randCode])->label(false) ?>

    <?= $form->field($model, 'user_id')->hiddenInput(['value'=> Yii::$app->user->id])->label(false) ?>

    <?= $form->field($model, 'admin_id')->hiddenInput(['value' => 1])->label(false) ?>

    <?= $form->field($model,'date')->hiddenInput(['value' => date("Y:m:d")])->label(false) ?>

    <?= $form->field($model, 'question_text')->textarea() ?>
    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
