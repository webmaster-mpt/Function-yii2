<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Dictionary */

$this->title = $model->deutch . ($model->russian);
\yii\web\YiiAsset::register($this);
?>
<div class="dictionary-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Учить', ['show'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Добавить новое слово', ['create'], ['class' => 'btn btn-danger']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Удалить?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'deutch:ntext',
            'russian:ntext',
            'transcription:ntext',
        ],
    ]) ?>

</div>
