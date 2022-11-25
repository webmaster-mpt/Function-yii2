<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Helper */

$this->title = 'Поддержка';
?>
<div class="helper-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>Данная вкладка предназначена для связи с администрацией! Задавайте ваши вопросы тут!</p>

    <?= $this->render('_form-test', [
        'model' => $model,
        'msgs' => $msgs,
    ]) ?>

</div>
