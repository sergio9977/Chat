<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Amigos;
use common\models\User;

/**
 * AmigosSearch represents the model behind the search form about `frontend\models\Amigos`.
 */
class AmigosSearch extends Amigos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id', 'Id_Usuario'], 'integer'],
            [['Id_Amigo'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Amigos::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->joinWith('idAmigo');
        // grid filtering conditions
        $query->andFilterWhere([
            //'Id' => $this->Id,
            //'Id_Amigo' => $this->Id_Amigo,
            'Id_Usuario' => $this->Id_Usuario = \Yii::$app->User->getId(),
        ]);

        $query
            ->andFilterWhere(['like', 'User.username', $this->Id_Amigo]);
        return $dataProvider;
    }
}
