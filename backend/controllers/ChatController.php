<?php

namespace backend\controllers;

use backend\models\Chat;
use common\models\User;
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

    public function actionNewChat($chat_id)
    {
        $model = new Chat();
        $findMsgs = Chat::find()->where(['chat_id' => $chat_id])->all();
        if($model->load(\Yii::$app->request->post()) && $model->save()){
            $model->user_id =  Yii::$app->user->id;
            $model->chat_id = $chat_id;
            $model->created_at = date('d:m:y h:i');
            $model->save();
            return $this->redirect('new-chat?chat_id=' . $model->chat_id);
        }
        return $this->render('new-chat',[
            'model' => $model,
            'findMsgs' => $findMsgs
        ]);
    }

    public function actionUserListToChat(){
        $model = new Chat();
        $users = User::find()->where(['role' => 1])->all();
        if ($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->redirect('new-chat?chat_id=' . $model->chat_id);
        }
        return $this->render('user-list-to-chat',[
            'model' => $model,
            'users' => $users
        ]);
    }

    public function actionChatList($user_id){
        $model = new Chat();
        $chats = Chat::find()->andWhere(['not',['chat_id' => null]])->andWhere(['not',['user_id' => $user_id]])->all();
        return $this->render('chat-list',[
            'model' => $model,
            'chats' => $chats
        ]);
    }
}
