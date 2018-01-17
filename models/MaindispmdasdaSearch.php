<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Maindispmdasda;

/**
 * MaindispmdasdaSearch represents the model behind the search form of `app\models\Maindispmdasda`.
 */
class MaindispmdasdaSearch extends Maindispmdasda
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mdasdaid', 'questid', 'lg', 'sharp', 'panasonic', 'polytron', 'samsung', 'aqua', 'rinai', 'totalunit'], 'integer'],
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
        $query = Maindispmdasda::find();

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
            'mdasdaid' => $this->mdasdaid,
            'questid' => $this->questid,
            'lg' => $this->lg,
            'sharp' => $this->sharp,
            'panasonic' => $this->panasonic,
            'polytron' => $this->polytron,
            'samsung' => $this->samsung,
            'aqua' => $this->aqua,
            'rinai' => $this->rinai,
            'totalunit' => $this->totalunit,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'others', $this->others]);

        return $dataProvider;
    }
}
