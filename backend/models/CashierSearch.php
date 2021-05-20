<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Cashier;

/**
 * CashierSearch represents the model behind the search form of `common\models\Cashier`.
 */
class CashierSearch extends Cashier
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cashierId', 'userId', 'contactNumber', 'alternativeNumber', 'role'], 'integer'],
            [['fullName', 'address1', 'address2', 'city', 'state'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Cashier::find();

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

        // grid filtering conditions
        $query->andFilterWhere([
            'cashierId' => $this->cashierId,
            'userId' => $this->userId,
            'contactNumber' => $this->contactNumber,
            'alternativeNumber' => $this->alternativeNumber,
            'role' => $this->role,
        ]);

        $query->andFilterWhere(['like', 'fullName', $this->fullName])
            ->andFilterWhere(['like', 'address1', $this->address1])
            ->andFilterWhere(['like', 'address2', $this->address2])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'state', $this->state]);

        return $dataProvider;
    }
}
