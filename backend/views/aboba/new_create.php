<?php

use backend\models\Aboba;
use backend\models\Realty;
use backend\models\Status;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AbobaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$post = Yii::$app->request->post();
$this->title = 'New Create';
?>
<div class="aboba-new_create">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin([
        'id' => 'bac-seed',
    ]); ?>
    <?php $form = \yii\widgets\ActiveForm::begin([
        'options' => [
            'data' => ['pjax' => true],
            'method' => 'post',
        ],
    ]); ?>

    <table class="table table-sm table-bordered">
        <thead>
        <tr>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Отчество</th>
            <th>Возраст</th>
            <th style="width: 100px;">Статус</th>
            <th>Дата рождения</th>
            <th>Недвижимость</th>
            <th style="width: 30px;"></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($abobaParts as $id => $abobaPart) { ?>
            <tr>
                <td>
                    <?= $form->field($abobaPart, "[$id]fname")->textInput(['maxlength' => true])->label(false) ?>
                </td>
                <td>
                    <?= $form->field($abobaPart, "[$id]name")->textInput(['maxlength' => true])->label(false) ?>
                </td>
                <td>
                    <?= $form->field($abobaPart, "[$id]sname")->textInput(['maxlength' => true])->label(false) ?>
                </td>
                <td>
                    <?= $form->field($abobaPart, "[$id]age")->input('number')->label(false) ?>
                </td>
                <td>
                    <?= $form->field($abobaPart, "[$id]status_id")->dropDownList(ArrayHelper::map(Status::find()->all(), 'id', 'name'), ['prompt' => ''])->label(false) ?>
                </td>
                <td>
                    <?= $form->field($abobaPart, "[$id]date_birthday")->textInput(['type' => 'date'])->label(false) ?>
                </td>
                <td>
                    <?= $form->field($abobaPart, "[$id]realty_id")->dropDownList(ArrayHelper::map(Realty::find()->all(), 'id', 'name'), ['prompt' => ''])->label(false) ?>
                </td>
                <?= $form->field($abobaPart, "[$id]uniq_id")->hiddenInput(['value' => 1])->label(false) ?>
                <td>
                    <button type="submit" name='delete_<?= Aboba::class ?>' value='<?php echo $abobaPart->id ?>'
                            class="btn btn-danger btn-block">
                        X
                    </button>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>


    <?php echo Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'btnAboba', 'value' => 'aboba']) ?>
    <button type="submit" name='create_<?= Aboba::class ?>' value=1 class="btn btn btn-success">
        Добавить
    </button>
    <button type="submit" name='clear_<?= Aboba::class ?>' value='1' class="btn btn-danger"
            data-confirm="Вы уверены что хотите очистить таблицу?">
        Очистить
    </button>

    <?php ActiveForm::end(); ?>
    <?php Pjax::end(); ?>

</div>
