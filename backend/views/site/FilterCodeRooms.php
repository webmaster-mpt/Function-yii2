<?php
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $this yii\web\View */
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\helpers\Url;
use yii\grid\GridView;

$this->title = 'Angel_Rize';
?>
<style>
    .margin-left{
        position: relative;
        margin-left: 5px;

    }
</style>
<div class="site-filter_code_rooms">
    <div class="filter-btn">
        <ul class="nav nav-pills" id="nav">
            <li class=""><a class="btn btn-dark margin-left" href="/">Всё</a></li>
            <li class=""><a class="btn btn-dark margin-left" href="filter-code-buyer">Купил</a></li>
            <li class=""><a class="btn btn-dark margin-left" href="filter-code-rooms">Квартиры</a></li>
            <li class=""><a class="btn btn-dark margin-left" href="filter-code-homes">Дома</a></li>
        </ul>
    </div>
    <br>
    <?php $abobaDataProvider->sort =false; ?>
    <?= GridView::widget([
        'dataProvider' => $abobaDataProvider,
//        'filterModel' => $abobaSearchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'=>'fname',
                'label'=>'ФИО',
                'value' => function ($abobaSearchModel) {
                    return Html::encode($abobaSearchModel->fname . ' ' . $abobaSearchModel->name . ' ' . $abobaSearchModel->sname);
                },
                'format' => 'raw',
            ],
            'age',
            'status',
            'date_birthday',
            'realty',
        ],
    ]); ?>
</div>