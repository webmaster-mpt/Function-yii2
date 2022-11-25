<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MsgSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Чат';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="msg-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Создать чат', ['create-msg','unique_code' => $randCode], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
    foreach ($msgLists as $msgList){?>
        <a href="/msg/create?unique_code=<?= $msgList->uniq_code ?>" target="_blank" ><?= $msgList->user->username ?></a>
    <?php } ?>


</div>
