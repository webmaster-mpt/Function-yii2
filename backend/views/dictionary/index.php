<?php

use backend\models\Dictionary;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DictionarySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Словарь';
?>
<div class="dictionary-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'deutch:ntext',
            'russian:ntext',
            'transcription:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Dictionary $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>

    <p>
        <?= Html::a('Добавить новое слово', ['create'], ['class' => 'btn btn-danger']) ?>
        <?= Html::a('Учить', ['show'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Предложения', ['offer'], ['class' => 'btn btn-primary']) ?>
    </p>
</div>
