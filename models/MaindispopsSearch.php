<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Maindispops;

/**
 * MaindispopsSearch represents the model behind the search form of `app\models\Maindispops`.
 */
class MaindispopsSearch extends Maindispops
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dipsopsid', 'questid'], 'integer'],
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
        $query = Maindispops::find();

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
            'dipsopsid' => $this->dipsopsid,
            'questid' => $this->questid,
        ]);

        return $dataProvider;
    }
}
