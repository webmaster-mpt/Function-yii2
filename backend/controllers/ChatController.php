<?php

namespace backend\controllers;

use backend\models\Chat;
use Yii;

class ChatController extends \yii\web\Controller
{
    public function actionMyChat()
    {
        $model = new Chat();
        $findMsgs = Chat::find()->all();
        if($model->load(\Yii::$app->request->post()) && $model->save()){
            $model->user_id =  Yii::$app->user->id;
            $model->created_at = date('d:m:y h:i');
            $model->save();
            return $this->redirect('my-chat');
        }

        return $this->render('my-chat',[
            'model' => $model,
            'findMsgs' => $findMsgs
        ]);
    }

}
