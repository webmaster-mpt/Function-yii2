<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Dictionary */

$this->title = 'Изменить слово: ' . $model->deutch . ($model->russian);
?>
<div class="dictionary-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
