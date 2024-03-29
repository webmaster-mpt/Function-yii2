<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);

    if(Yii::$app->user->getIdentity()->isAdmin()){
       $menuItems[] = ['label' => 'Админка', 'items' => [
           ['label' => 'Пользователи', 'url' => ['/user']],
           ['label' => 'Абоба', 'url' => ['/aboba']],
           ['label' => 'Realty', 'url' => ['/realty']],
           ['label' => 'Status', 'url' => ['/status']],
       ]];
        $menuItems[] = ['label' => 'DepDrop', 'items' => [
            ['label' => 'Студент', 'url' => ['/student']],
            ['label' => 'Группа', 'url' => ['/group']],
            ['label' => 'Оценка', 'url' => ['/ocenka']],
        ]];
//        $menuItems[] = ['label' => 'Чат', 'url' => ['/chat/my-chat','userGet_id' => Yii::$app->user->id]];
//        $menuItems[] = ['label' => 'Msg', 'url' => ['/msg']];
        $menuItems[] = ['label' => 'Поддержка', 'url' => ['/helper/index']];
        $menuItems[] = ['label' => 'Словарь', 'url' => ['/dictionary/index']];

    }
    if(Yii::$app->user->getIdentity()->isModer()){
        $menuItems[] = ['label' => 'Модерка', 'items' => [
            ['label' => 'Пользователи', 'url' => ['/user/index-moder']],
//            ['label' => 'Поддержка', 'url' => ['/helper/user-list']]
        ]];
    }
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username .')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
