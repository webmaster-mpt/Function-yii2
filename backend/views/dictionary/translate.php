<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Dictionary */
/* @var $form yii\widgets\ActiveForm */


$this->title = 'Переводчик';
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
<div class="dictionary-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col">
            <label class="fromLang">Немецкий</label>
        </div>
        <div class="col">
            <label class="toLang">Русский</label>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <input type="text" class="form-control fromText" placeholder="Введите текст">
        </div>
        <span class="exchange"><i class="fas fa-exchange-alt"></i></span>
        <div class="col">
            <input type="text" class="form-control toText" placeholder="Перевод">
        </div>
    </div>
    <br>


    <?php ActiveForm::end(); ?>

</div>
