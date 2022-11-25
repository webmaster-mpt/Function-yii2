<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'Пользователи';
?>
<style>
    .container-from-chat{
        border: 1px solid black;
    }
    .chat-view{
        display: flex;
        justify-content: space-between;
        height: auto;
        padding: 15px;
    }
    .user-data,.link{
        display: inline-block;
    }
</style>
<div class="user-list-to-chat_form">
    <a href="../../web/index.php" target="_blank">Мои чаты(Beta)</a>
    <span>Текущий пользователь: <?= Yii::$app->user->id ?></span>
    <div class="container-from-chat">
        <?php foreach ($users as $user){ ?>
            <div class="chat-view">
                <div class="user-data">
                    <span><?= $user->username . ' ' . $user->id ?></span>
                </div>
                <div class="link">
                    <a href="../../web/index.php">Написать</a>
                </div>
            </div>
<!--            <div class="chat-view">-->
<!--                <div class="user-data">-->
<!--                    <span>--><?//= $user->user->username . ' ' . $user->user->id ?><!--</span>-->
<!--                </div>-->
<!--                <div class="link">-->
<!--                    <a href="my-chat/?user_get_id=--><?//= $user->user->id ?><!--">Написать</a>-->
<!--                </div>-->
<!--            </div>-->
        <?php } ?>
    </div>
</div>
