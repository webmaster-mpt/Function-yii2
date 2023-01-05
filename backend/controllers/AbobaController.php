<?php

namespace backend\controllers;

use backend\models\Aboba;
use backend\models\AbobaSearch;
use yii\db\ActiveRecord;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AbobaController implements the CRUD actions for Aboba model.
 */
class AbobaController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Aboba models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AbobaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public static function handleTableForm($parent_model_id, $class, $linkFieldName, $parts): array {
        if (!$class) return $parts;

        $reflectionObject = new \ReflectionClass($class);
        /** @var ActiveRecord $instance */
        $instance = $reflectionObject->newInstanceWithoutConstructor();

        $post = \Yii::$app->request->post();
        if ($post) {
            if (isset($post["delete_$class"])) {
                foreach ($parts as $index => $part) {
                    if ($part->id == $post["delete_$class"]) {
                        $part->delete();
                        unset($parts[$index]);
                    }
                }
            }
            if (isset($post["clear_$class"])) {
                foreach ($parts as $part) {
                    $part->delete();
                }
                $parts = [];
            } else if (isset($post["create_$class"])) {
                $newModel = new $class();
                $newModel->$linkFieldName = $parent_model_id;
                $newModel->save();
                $parts[$newModel->id] = $newModel;
            }

            if ($instance->loadMultiple($parts, $post) && $instance->validateMultiple($parts)) {
                foreach ($parts as $bacSeed) {
                    $bacSeed->save(false);
                }
            }
        }
        return $parts;
    }

    public function actionNewCreate($uniq_id){
        $abobaParts = Aboba::find()->where(['uniq_id' => $uniq_id])->indexBy('id')->all();
        $abobaParts = self::handleTableForm($uniq_id, Aboba::class, 'uniq_id', $abobaParts);

        $model = Aboba::find(['uniq_id' => $uniq_id]) ?? new Aboba();

        return $this->render('new_create', [
            'abobaParts' => $abobaParts,
            'model' => $model
        ]);
    }

    /**
     * Displays a single Aboba model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Aboba model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Aboba();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['/']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Aboba model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Aboba model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Aboba model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Aboba the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Aboba::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
