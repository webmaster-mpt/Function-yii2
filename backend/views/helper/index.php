<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\HelperSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Поддержка';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="helper-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
<!--        --><?//= Html::a('Create helper', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Обращения', ['user-list'], ['class' => 'btn btn-danger']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'uniq_code',
            'user_id',
            'admin_id',
            'question_text',
            'date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
