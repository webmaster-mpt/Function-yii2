<?php

use backend\models\Ocenka;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OcenkaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ocenkas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ocenka-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Ocenka', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label' => 'Студент',
                'attribute'=>'student.name',
                'value'=> ArrayHelper::getValue($model,'student.name'),
            ],
            [
                'label' => 'Группа',
                'attribute'=>'group.label',
                'value'=> ArrayHelper::getValue($model,'group.label'),
            ],
            'grade',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Ocenka $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
