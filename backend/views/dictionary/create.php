<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Dictionary */

$this->title = 'Добавить новое слово';
?>
<div class="dictionary-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
