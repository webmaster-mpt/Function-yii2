<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AbobaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Abobas';
?>
<div class="aboba-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'fname',
            'name',
            'sname',
            'age',
            [ 
                'label'=>'Недвижимость',
                'attribute'=>'status.name',
                'value'=> ArrayHelper::getValue($model,'status.name'),
            ],
            'date_birthday',
            'realty_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('New create', ['new_create', 'uniq_id' => 1], ['class' => 'btn btn-light']) ?>
    </p>

</div>
