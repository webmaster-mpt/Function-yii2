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
<style>
    #other_a{
        color: #fff;
    }
    #other_a:hover{
        color: white;
        text-decoration: none;
    }
</style>
<div class="helper-index">

    <?= $this->render('_form', [
        'model' => $model,
        'msgs' => $chats,
    ]) ?>

</div>
