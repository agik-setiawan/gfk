<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Masterkecamatan;

/**
 * MasterkecamatanSearch represents the model behind the search form of `app\models\Masterkecamatan`.
 */
class MasterkecamatanSearch extends Masterkecamatan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kecamatanid', 'provinceid', 'dati', 'kotamadyaid'], 'integer'],
            [['kecamatan'], 'safe'],
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
        $query = Masterkecamatan::find();

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
            'kecamatanid' => $this->kecamatanid,
            'provinceid' => $this->provinceid,
            'kotamadyaid' => $this->kotamadyaid,
        ]);

        $query->andFilterWhere(['like', 'kecamatan', $this->kecamatan]);
        $query->andFilterWhere(['like', 'dati', $this->dati]);

        return $dataProvider;
    }
}
