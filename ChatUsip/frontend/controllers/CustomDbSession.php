<?php

namespace frontend\controllers;


use Yii;
use yii\db\Connection;
use yii\db\Query;
use yii\base\InvalidConfigException;
use yii\di\Instance;

class CustomDbSession extends \yii\web\DbSession {

    public $writeCallback = ['\frontend\controllers\CustomDbSession', 'writeCustomFields'];

    public function writeCustomFields($session) {

        try
        {
            $uid = (\Yii::$app->user->getIdentity(false) == null)?null:\Yii::$app->user->getIdentity(false)->id;
            return [ 'user_id' => $uid, 'ip' => $_SERVER['REMOTE_ADDR'] ];
        }
        catch(Exception $excp)
        {
            \Yii::info(print_r($excp), 'informazioni');


        }
    }


}