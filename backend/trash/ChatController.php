<?php

namespace backend\controllers;

use backend\models\Chat;
use common\models\User;
use Yii;

class ChatController extends \yii\web\Controller
{
    public function actionMyChat($userGet_id) //Чат с пользователем
    {
        $model = new Chat();
        $findMsgs = $model->getChatMessage($userGet_id);
        if($model->load(\Yii::$app->request->post()) && $model->save()){
            $model->user_id =  Yii::$app->user->id;
            $model->userGet_id = $userGet_id;
            $model->created_at = date('d:m:y h:i');
            $model->save();
            return $this->redirect('my-chat?userGet_id=' . $model->userGet_id);
        }
        return $this->render('my-chat',[
            'model' => $model,
            'findMsgs' => $findMsgs
        ]);
    }

//    public function actionNewChat($userGet_id)
//    {
//        $model = new Chat();
//        $findMsgs = Chat::find()->where(['userGet_id' => $userGet_id])->all();
//        if($findMsgs == null){
//            return $this->redirect('my-chat');
//        }
//        if($model->load(\Yii::$app->request->post()) && $model->save()){
//            $model->user_id =  Yii::$app->user->id;
//            $model->userGet_id = $userGet_id;
//            $model->created_at = date('d:m:y h:i');
//            $model->save();
//            return $this->redirect('new-chat?userGet_id=' . $model->userGet_id);
//        }
//        return $this->render('new-chat',[
//            'model' => $model,
//            'findMsgs' => $findMsgs
//        ]);
//    }

    public function actionUserListToChat(){ //Пользователи для чата
        $model = new Chat();
        $users = $model->getNewChatLists();
        return $this->render('user-list-to-chat',[
            'model' => $model,
            'users' => $users
        ]);
    }

    public function actionChatList($user_id){ //Список существующих чатов с пользователями
        $model = new Chat();
        $chats = $model->getChatLists($user_id);
        return $this->render('chat-list',[
            'model' => $model,
            'chats' => $chats
        ]);
    }
}
