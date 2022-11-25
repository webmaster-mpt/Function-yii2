<?php
/* @var $this yii\web\View */
/* @var $model \backend\models\Chat */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'Мои чаты';
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
<div class="chat-list_form">
    <a href="../../web/index.php" target="_blank">Пользователи</a>
    <div class="container-from-chat">
        <?php foreach ($chats as $chat){
            if($chat->userGet_id == Yii::$app->user->id){
            ?>
            <div class="chat-view">
                <div class="user-data">
                    <span><?= $chat->user->username ?></span>
                </div>
                <div class="link">
                    <a href="../../web/index.php" target="_blank">Войти в чат</a>
                </div>
            </div>
            <?php } else { ?>
                <div class="chat-view">
                    <div class="user-data">
                        <span><?= $chat->userGet->username ?></span>
                    </div>
                    <div class="link">
                        <a href="../../web/index.php" target="_blank">Войти в чат</a>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</div>
