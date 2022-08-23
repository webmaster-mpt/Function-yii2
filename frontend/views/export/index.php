<?php

use frontend\models\Export;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ExportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Exports';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="export-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Export', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'fname:ntext',
            'name:ntext',
            'sname:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Export $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

</div>
