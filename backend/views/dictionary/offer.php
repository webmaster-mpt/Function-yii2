<?php

use backend\models\Dictionary;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DictionarySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Предложения';
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<div class="dictionary-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::button('Добавить новое предложение', ['class' => 'btn btn-primary', 'data-toggle' => 'collapse', 'data-target' => '#collapseExample']) ?>
        <?= Html::a('Назад к админке', ['index'], ['class' => 'btn btn-danger']) ?>
    </p>

    <div class="collapse" id="collapseExample">
        <div class="card card-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
    <div class="row mt-2 m-0">
        <?php foreach ($rows as $row) { ?>
            <div class="card border-success" style="max-width: 16rem; width: 100%; margin: 0 15px 15px 0">
                <div class="card-header bg-transparent border-success">
                    <div class="float-right">
                        <button class="voice-btn border-0" style="background-color: #fff; color: #DAD9E3"><i class="fas fa-volume-up"></i></button>
                        <a href="/dictionary/view?id=<?= $row->id ?>" title="Просмотр" aria-label="Просмотр" data-pjax="0">
                            <svg aria-hidden="true"
                                 style="display:inline-block;color: #DAD9E3;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:1.125em"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                <path fill="currentColor"
                                      d="M573 241C518 136 411 64 288 64S58 136 3 241a32 32 0 000 30c55 105 162 177 285 177s230-72 285-177a32 32 0 000-30zM288 400a144 144 0 11144-144 144 144 0 01-144 144zm0-240a95 95 0 00-25 4 48 48 0 01-67 67 96 96 0 1092-71z">
                                </path>
                            </svg>
                        </a>
                        <a href="/dictionary/update?id=<?= $row->id ?>" title="Редактировать" aria-label="Редактировать"
                           data-pjax="0">
                            <svg aria-hidden="true"
                                 style="display:inline-block;color: #DAD9E3;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:1em"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="currentColor"
                                      d="M498 142l-46 46c-5 5-13 5-17 0L324 77c-5-5-5-12 0-17l46-46c19-19 49-19 68 0l60 60c19 19 19 49 0 68zm-214-42L22 362 0 484c-3 16 12 30 28 28l122-22 262-262c5-5 5-13 0-17L301 100c-4-5-12-5-17 0zM124 340c-5-6-5-14 0-20l154-154c6-5 14-5 20 0s5 14 0 20L144 340c-6 5-14 5-20 0zm-36 84h48v36l-64 12-32-31 12-65h36v48z">
                                </path>
                            </svg>
                        </a>
                        <a href="/dictionary/delete?id=<?= $row->id ?>" title="Удалить" aria-label="Удалить" data-pjax="0"
                           data-confirm="Вы уверены, что хотите удалить этот элемент?" data-method="post">
                            <svg aria-hidden="true"
                                 style="display:inline-block;color: #DAD9E3;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path fill="currentColor"
                                      d="M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="card-body text-success">
                    <h5 class="card-title m-0"><?= $row->deutch ?></h5>
                </div>
                <div class="card-footer bg-transparent border-success"><?= $row->russian ?></div>
            </div>
        <?php } ?>
    </div>
</div>
<script>
    let text = document.querySelectorAll(".card-title");
    let voice = document.querySelectorAll('.voice-btn');
    for (let i = 0; i < voice.length; i++) {
        voice[i].addEventListener('click', () => {
            let speach = new SpeechSynthesisUtterance();
            speach.lang = 'de';
            speach.text = text[i].textContent;
            speechSynthesis.speak(speach);
        });
    }
</script>