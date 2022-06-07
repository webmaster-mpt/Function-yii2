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
<div class="user-filter-code-buyer">
    <div class="filter-btn">
        <ul class="nav nav-pills" id="nav">
            <li class=""><a class="btn btn-dark margin-left" href="/">Всё</a></li>
            <li class=""><a class="btn btn-dark margin-left" href="/user/filter-code-buyer">Купил</a></li>
            <li class=""><a class="btn btn-dark margin-left" href="/user/filter-code-rooms">Квартиры</a></li>
            <li class=""><a class="btn btn-dark margin-left" href="/user/filter-code-homes">Дома</a></li>
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
            [
                'label'=>'Возраст',
                'attribute'=>'age',
                'value'=> ArrayHelper::getValue($abobaSearchModel,'age'),
            ],
            [
                'label'=>'Статус',
                'attribute'=>'status.name',
                'value'=> ArrayHelper::getValue($abobaSearchModel,'status.name'),
            ],
            [
                'label'=>'Дата рождения',
                'attribute'=>'date_birthday',
                'value'=> ArrayHelper::getValue($abobaSearchModel,'date_birthday'),
            ],
            [
                'label'=>'Недвижимость', 
                'attribute'=>'realty.name', 
                'value'=> ArrayHelper::getValue($abobaSearchModel,'realty.name'), 
            ],
        ],
    ]); ?>
</div>