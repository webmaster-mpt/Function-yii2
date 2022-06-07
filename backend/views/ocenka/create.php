<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Ocenka */

$this->title = 'Create Ocenka';
$this->params['breadcrumbs'][] = ['label' => 'Ocenkas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ocenka-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
