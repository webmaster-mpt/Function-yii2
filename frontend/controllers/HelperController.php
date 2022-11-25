<?php

namespace frontend\controllers;

use backend\models\Msg;
use frontend\models\Export;
use http\Url;
use Yii;
use common\models\Helper;
use frontend\models\HelperSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HelperController implements the CRUD actions for Helper model.
 */
class HelperController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Helper models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new Helper();
        $chats = $model->getChat(\Yii::$app->user->id);
        if(!empty($chats)){
            foreach ($chats as $chat){
                return $this->redirect(['create', 'unique_code' => $chat->uniq_code]);
            }
        } else{
            return $this->redirect(['create-msg']);
        }
        return $this->render('index', [
            'model' => $model,
            'chats' => $chats
        ]);
    }

    public function actionUserList()
    {
        $model = new Helper();
        $msgLists = $model->getMsgLists(\Yii::$app->user->id);
        $randCode = mt_rand(100,1000);
        $checkCode = $model->getUniqCode();
        return $this->render('user-list', [
            'model' => $model,
            'msgLists' => $msgLists,
            'randCode' => $randCode
        ]);
    }

    /**
     * Displays a single Helper model.
     * @param integer $id
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
     * Creates a new Helper model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($unique_code)
    {
        $model = new Helper();
        $msgs = $model->getMsg($unique_code);
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->uniq_code = $unique_code;
                $model->user_id = \Yii::$app->user->id;
                foreach ($msgs as $msg){
                    $model->admin_id = $msg->user_id;
                }
                $model->save();
                return $this->redirect(['create', 'unique_code' => $unique_code]);
            }
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
    public function actionCreateMsg()
    {
        $model = new Helper();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
//                $model->user_id = \Yii::$app->user->id;
//                foreach ($msgs as $msg){
//                    $model->admin_id = $msg->user_id;
//                }
                return $this->redirect(['create', 'unique_code' => $model->uniq_code]);
            }
        } else {
            $model->loadDefaultValues();
        }
        $randCode = rand(100,1000);
        $checkCode = Helper::find()->select('uniq_code')->all();
        if($checkCode !== $randCode){
            return $this->render('create-msg', [
                'model' => $model,
                'randCode' => $randCode
            ]);
        }
    }


    /**
     * Updates an existing Helper model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Helper model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Helper model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Helper the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Helper::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
