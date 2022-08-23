<?php

use kartik\depdrop\DepDrop;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Ocenka */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ocenka-form">

    <?php $form = ActiveForm::begin();
    $myStud = \yii\helpers\ArrayHelper::map(\backend\models\Student::find()->all(),'id','name');
    $myGroup = \yii\helpers\ArrayHelper::map(\backend\models\Group::find()->all(),'id','label');
    $myGrade = [
        '2' => '2 - Плохо',
        '3' => '3 - Не плохо',
        '4' => '4 - Хорошо',
        '5' => '5 - Отлично',
    ]
    ?>

    <?= $form->field($model, 'student_id')->dropDownList($myStud,[
            'id' => 'student_id',
            'prompt' => ''
    ]) ?>

    <?= $form->field($model, 'group_id')->widget(DepDrop::className(),[
        'options' => ['id' => 'group_id'],
        'pluginOptions'=>[
            'depends'=>['student_id'],
            'placeholder'=>' ',
            'url'=>Url::to(['ocenka/group'])
        ]
    ]) ?>

    <?= $form->field($model, 'grade')->dropDownList($myGrade) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
