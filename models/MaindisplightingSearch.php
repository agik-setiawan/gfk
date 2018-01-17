<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Maindisplighting;

/**
 * MaindisplightingSearch represents the model behind the search form of `app\models\Maindisplighting`.
 */
class MaindisplightingSearch extends Maindisplighting
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lightingid', 'questid', 'omi', 'philips', 'hannochs', 'panasonic', 'osram', 'atama', 'totalunit'], 'integer'],
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
        $query = Maindisplighting::find();

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
            'lightingid' => $this->lightingid,
            'questid' => $this->questid,
            'omi' => $this->omi,
            'philips' => $this->philips,
            'hannochs' => $this->hannochs,
            'panasonic' => $this->panasonic,
            'osram' => $this->osram,
            'atama' => $this->atama,
            'totalunit' => $this->totalunit,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'others', $this->others]);

        return $dataProvider;
    }
}
