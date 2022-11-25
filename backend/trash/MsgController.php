<?php

namespace backend\controllers;

use app\models\User;
use backend\models\Msg;
use backend\models\MsgSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MsgController implements the CRUD actions for Msg model.
 */
class MsgController extends Controller
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
     * Lists all Msg models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new Msg();
        $msgLists = $model->getMsgLists(\Yii::$app->user->id);
        $randCode = rand(100,1000);
        $checkCode = Msg::find()->select('uniq_code')->all();
        if($checkCode !== $randCode){
            return $this->render('index', [
                'model' => $model,
                'msgLists' => $msgLists,
                'randCode' => $randCode
            ]);
        }
    }

    /**
     * Displays a single Msg model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Msg model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($unique_code)
    {
        $model = new Msg();
        $msgs = $model->getMsg($unique_code);
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->uniq_code = $unique_code;
                $model->user_id = \Yii::$app->user->id;
                foreach ($msgs as $msg){
                    $model->userGet_id = $msg->user_id;
                }
                $model->save();
                return $this->redirect(['create', 'unique_code' => $unique_code]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'msgs' => $msgs
        ]);
    }

    /**
     * Creates a new Msg model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreateMsg($unique_code)
    {
        $model = new Msg();
        $msgs = $model->getMsg($unique_code);
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->uniq_code = $unique_code;
                $model->user_id = \Yii::$app->user->id;
                $model->userGet_id = 2;
                $model->save();
                return $this->redirect(['create-msg', 'unique_code' => $unique_code]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create-msg', [
            'model' => $model,
            'msgs' => $msgs
        ]);
    }

    /**
     * Updates an existing Msg model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
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
     * Deletes an existing Msg model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Msg model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Msg the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Msg::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
