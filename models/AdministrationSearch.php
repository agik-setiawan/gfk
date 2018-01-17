<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Administration;

/**
 * AdministrationSearch represents the model behind the search form of `app\models\Administration`.
 */
class AdministrationSearch extends Administration
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['admid', 'questid'], 'integer'],
            [['date', 'interviewer', 'teamleader', 'dataentry'], 'safe'],
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
        $query = Administration::find();

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
            'admid' => $this->admid,
            'questid' => $this->questid,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'interviewer', $this->interviewer])
            ->andFilterWhere(['like', 'teamleader', $this->teamleader])
            ->andFilterWhere(['like', 'dataentry', $this->dataentry]);

        return $dataProvider;
    }
}
