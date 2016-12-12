<?php

namespace frontend\models;

use Yii;
use common\models\User;
/**
 * This is the model class for table "amigos".
 *
 * @property integer $Id
 * @property integer $Id_Amigo
 *
 * @property User $idAmigo
 */
class Amigos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'amigos';
    }

    /**
     * @inheritdoc
     */
    public $agregarchat;
    public function rules()
    {
        return [
            [['Id_Amigo', 'Id_Usuario'], 'required'],
            [['Id_Amigo', 'Id_Usuario'], 'integer'],
            [['Id_Amigo'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['Id_Amigo' => 'id']],
            [['Id_Usuario'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['Id_Usuario' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Id_Amigo' => 'Id  Amigo',
            'Id_Usuario' => 'Id  Usuario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAmigo()
    {
        return $this->hasOne(User::className(), ['id' => 'Id_Amigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsuario()
    {
        return $this->hasOne(User::className(), ['id' => 'Id_Usuario']);
    }
}
