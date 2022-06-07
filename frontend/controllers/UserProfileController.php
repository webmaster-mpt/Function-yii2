<?php

namespace frontend\controllers;

use Yii;
use frontend\models\UserProfile;
use frontend\models\Comments;
use frontend\models\UserProfileSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile as WebUploadedFile;

/**
 * UserProfileController implements the CRUD actions for UserProfile model.
 */
class UserProfileController extends Controller
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
     * Lists all UserProfile models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserProfileSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all UserProfile models.
     * @return mixed
     */
    public function actionIndexUser($user_id)
    {
        $model = new UserProfile();
        $userId = \Yii::$app->user->identity->getId();
        $userInfo = UserProfile::find()->where(['user_id' => $user_id])->all();
        $comments = Comments::find()->where(['user_id' => $user_id])->all();
        if($user_id != \Yii::$app->user->identity->getId()){
            $this->redirect('/');
        }
        else{
            return $this->render('indexUser', [
                'model' => $model,
                'userId' => $userId,
                'userInfo' => $userInfo,
                'comments' => $comments
            ]);
        }
    }

    /**
     * Displays a single UserProfile model.
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
     * Creates a new UserProfile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserProfile();
        $file = WebUploadedFile::getInstance($model, 'image');
        if ($model->load(\Yii::$app->request->post())) {
            if ($file) {
                $photoname= uniqid($model->name) . $file->baseName . '.' . $file->extension;
                $file->saveAs(\Yii::getAlias('@frontend/web') . '/uploads/' . $photoname);
                $model->image = $photoname;
                if($model->save()){
                    return $this->redirect(['/user-profile/index-user' . '?user_id='. Yii::$app->user->identity->getId()]);
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing UserProfile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $user_id = \Yii::$app->user->identity->getId();
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index-user', 'user_id' => $user_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing UserProfile model.
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
     * Finds the UserProfile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return UserProfile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserProfile::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
