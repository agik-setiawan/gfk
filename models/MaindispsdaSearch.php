<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Maindispsda;

/**
 * MaindispsdaSearch represents the model behind the search form of `app\models\Maindispsda`.
 */
class MaindispsdaSearch extends Maindispsda
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sdaid', 'questid', 'kirin', 'maspion', 'philips', 'panasonic', 'miyako', 'yongma', 'cosmos', 'unilever', 'ariston', 'totalunit'], 'integer'],
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
        $query = Maindispsda::find();

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
            'sdaid' => $this->sdaid,
            'questid' => $this->questid,
            'kirin' => $this->kirin,
            'maspion' => $this->maspion,
            'philips' => $this->philips,
            'panasonic' => $this->panasonic,
            'miyako' => $this->miyako,
            'yongma' => $this->yongma,
            'cosmos' => $this->cosmos,
            'unilever' => $this->unilever,
            'ariston' => $this->ariston,
            'totalunit' => $this->totalunit,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'others', $this->others]);

        return $dataProvider;
    }
}
