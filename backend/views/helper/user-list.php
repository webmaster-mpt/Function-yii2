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
<div class="user-list">

    <?php
    if(isset($msgLists)){?>
        <h3 style="font-weight: 700">Обращения</h3>
        <?php foreach ($msgLists as $msgList){?>
            <a id="other_a" href="/helper/create?unique_code=<?= $msgList->uniq_code ?>" target="_blank"><?= $msgList->user->username ?></a>
        <?php } ?>
    <?php } ?>
    <p>
        <?= Html::a('Написать в поддержу', ['create-msg','unique_code' => $randCode], ['class' => 'btn btn-success']) ?>
    </p>

</div>
