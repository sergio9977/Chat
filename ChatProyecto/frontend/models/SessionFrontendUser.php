<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "session_frontend_user".
 *
 * @property string $id
 * @property integer $user_id
 * @property string $ip
 * @property integer $expire
 * @property resource $data
 */
class SessionFrontendUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'session_frontend_user';
    }

    /**
     * @inheritdoc
     */
    public $agregaramigo;
    public  $agregarchat;
    public function rules()
    {
        return [
            [['id', 'user_id', 'ip'], 'required'],
            [['user_id', 'expire'], 'integer'],
            [['data'], 'string'],
            [['id'], 'string', 'max' => 80],
            [['ip'], 'string', 'max' => 15],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User',
            'ip' => 'Ip',
            'expire' => 'Expire',
            'data' => 'Data',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'user_id']);
    }
}
