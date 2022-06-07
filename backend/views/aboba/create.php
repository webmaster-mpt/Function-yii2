<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Aboba */

$this->title = 'Добавить';
$this->params['breadcrumbs'][] = ['label' => 'Abobas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aboba-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
