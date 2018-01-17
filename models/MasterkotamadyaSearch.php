<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Masterkotamadya;

/**
 * MasterkotamadyaSearch represents the model behind the search form of `app\models\Masterkotamadya`.
 */
class MasterkotamadyaSearch extends Masterkotamadya
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kotamadyaid', 'provinceid'], 'integer'],
            [['kotamadya','dati'], 'safe'],
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
        $query = Masterkotamadya::find();

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
            'kotamadyaid' => $this->kotamadyaid,
            'provinceid' => $this->provinceid,
        ]);

        $query->andFilterWhere(['like', 'kotamadya', $this->kotamadya]);
        $query->andFilterWhere(['like', 'dati', $this->dati]);

        return $dataProvider;
    }
}
