<?php
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;

$this->title = 'Angel_Rize';
?>
<div class="site-index">
        <h4>Admin</h4>
        <table class="table table-bordered">
            <thead>
            <th>Пользователи</th>
            </thead>
            <tbody>
            <tr>
                <?php foreach($users as $user){ ?>
                <td>
                    <?= Html::a($user->username, Yii::$app->urlManagerFrontend->createUrl([
                        '/index.php/site/auth-login', 'id'=>$user->id,'username'=>$user->username]),[
                        'target' => '_blank',
                        'id' =>'users'
                    ]);
                    ?>
                </td>
            </tr>
            </tbody>
            <?php } ?>
        </table>
    <?php $abobaDataProvider->sort =false; ?>
    <?= \yii\grid\GridView::widget([
        'dataProvider' => $abobaDataProvider,
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
    ]);?>
</div>