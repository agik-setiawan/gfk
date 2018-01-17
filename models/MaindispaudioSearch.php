<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Maindispaudio;

/**
 * MaindispaudioSearch represents the model behind the search form of `app\models\Maindispaudio`.
 */
class MaindispaudioSearch extends Maindispaudio
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pdisplayaudid', 'questid', 'lg', 'sharp', 'panasonic', 'polytron', 'samsung', 'sony', 'gmc', 'totalunit'], 'integer'],
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
        $query = Maindispaudio::find();

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
            'pdisplayaudid' => $this->pdisplayaudid,
            'questid' => $this->questid,
            'lg' => $this->lg,
            'sharp' => $this->sharp,
            'panasonic' => $this->panasonic,
            'polytron' => $this->polytron,
            'samsung' => $this->samsung,
            'sony' => $this->sony,
            'gmc' => $this->gmc,
            'totalunit' => $this->totalunit,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'others', $this->others]);

        return $dataProvider;
    }
}
