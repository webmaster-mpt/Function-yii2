<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserProfile */

$this->title = $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Пользователь', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$img_format = function ($model) {
    if ($model->Image)
        return ['image', ['width' => '250', 'height' => '200']];
    else {
        return 'raw';
    }
}
?>
<div class="user-profile-user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
//            'user_id',
            'Fname',
            'Name',
            'Sname',
            'Age',
            'DateOfBirth',
            'Proffession',
            [
                'attribute' => 'image',
                'value' => function ($model) {
                    if ($model->Image)
                        return '/uploads/' . $model->Image;
                    else {
                        return '(Нет изображения)';
                    }
                },
                'format' => $img_format($model),
            ]
        ],
    ])
    ?>
</div>
