<?php
namespace frontend\controllers;
use yii;
use yii\web\Controller;

class ChatController extends Controller{
public function actionSendChat() {
    if (!empty($_POST)) {
        echo \sintret\chat\ChatRoom::sendChat($_POST);
    }
}
}
