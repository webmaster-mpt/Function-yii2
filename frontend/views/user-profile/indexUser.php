<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model frontend\models\UserProfile */

$this->title = 'Профиль';
$this->params['breadcrumbs'][] = $this->title;
?>
<header>
    <link rel="stylesheet" href="/indexUser.css"">
</header>
<div class="user-profile-index">
    <?php if($userInfo == null) {?>
    <?= Html::a('Добавить данные о себе', ['create', 'id' => $user->id], ['class' => 'btn btn-info']) ?>
    <?php } ?>
    <?php foreach($userInfo as $user){ ?>
    <div class="container">
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src='../../uploads/<?php echo $user->image?>' alt="UserImg" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4><?php echo $user->name; ?></h4>
                                    <p class="text-secondary mb-1"><?php echo $user->proffession; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Github</h6>
                                <span class="text-secondary"><?php echo $user->linkGithub?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0" style="background-color: #000000; color: #ffffff; padding: 3px;  border-radius: .25rem;">VK</h6>
                                <span class="text-secondary"><?php echo $user->linkVk?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                                <span class="text-secondary"><?php echo $user->linkInstagram?></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">ФИО</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $user->fname . ' ' . $user->name . ' ' . $user->sname; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo Yii::$app->user->identity->email?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Телефонный номер</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $user->phone?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Адрес</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $user->address?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Возраст</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $user->age?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Дата рождения</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?= $user->dateOfBirth?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <?= Html::a('Изменить профиль', ['update', 'id' => $user->id], ['class' => 'btn btn-info']) ?>
                                    <?= Html::a('Добавить комментарий', ['comments/create'], ['class' => 'btn btn-info']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h6>Комментарии</h6>
                    <?php foreach ($comments as $comment){ ?>
                        <div class="card mt-3">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item justify-content-between align-items-center flex-wrap">
                                    <img src="../../uploads/<?php echo $user->image?>" alt="UserImg" class="rounded-circle" width="30">
                                    <span class="text-body"><?php echo $comment->body?></span>
                                </li>
                            </ul>
                        </div>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
