<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\SessionFrontendUser;
use common\models\User;

/**
 * MascotaSearch represents the model behind the search form about `app\models\Mascota`.
 */
class UserSearch extends SessionFrontendUser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['ip', 'id', 'data'], 'safe'],
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
        $query = SessionFrontendUser::find();

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
$query->joinWith('user');
        // grid filtering conditions
        $query->andFilterWhere([
            'id'=>  $this->id,
            'ip'=>  $this->ip,
            'user_id' => $this->user_id,
            'data' => $this->data,
        ]);

        $query->andFilterWhere(['like', 'User.username', $this->user_id])
            ->andFilterWhere(['like', 'ip', $this->ip])
            ->andFilterWhere(['like', 'id', $this->id]);

        return $dataProvider;
    }
}
