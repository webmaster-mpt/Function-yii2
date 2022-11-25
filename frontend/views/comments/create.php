<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Comments */

$this->title = 'Добавить комментарий';
?>
<div class="comments-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
