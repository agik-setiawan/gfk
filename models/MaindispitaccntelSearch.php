<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Maindispitaccntel;

/**
 * MaindispitaccntelSearch represents the model behind the search form of `app\models\Maindispitaccntel`.
 */
class MaindispitaccntelSearch extends Maindispitaccntel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['itacctelid', 'questid', 'votre', 'genius', 'logitech', 'westerndigital', 'eyota', 'toshiba', 'vgen', 'hp', 'kingston', 'sandisk', 'advance', 'adata', 'totalunit', 'totalunitcheck'], 'integer'],
            [['description', 'others'], 'safe'],
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
        $query = Maindispitaccntel::find();

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
            'itacctelid' => $this->itacctelid,
            'questid' => $this->questid,
            'votre' => $this->votre,
            'genius' => $this->genius,
            'logitech' => $this->logitech,
            'westerndigital' => $this->westerndigital,
            'eyota' => $this->eyota,
            'toshiba' => $this->toshiba,
            'vgen' => $this->vgen,
            'hp' => $this->hp,
            'kingston' => $this->kingston,
            'sandisk' => $this->sandisk,
            'advance' => $this->advance,
            'adata' => $this->adata,
            'totalunit' => $this->totalunit,
            'totalunitcheck' => $this->totalunitcheck,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'others', $this->others]);

        return $dataProvider;
    }
}
