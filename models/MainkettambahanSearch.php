<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mainkettambahan;

/**
 * MainkettambahanSearch represents the model behind the search form of `app\models\Mainkettambahan`.
 */
class MainkettambahanSearch extends Mainkettambahan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kettambahanid', 'questid'], 'integer'],
            [['kettambbahan'], 'safe'],
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
        $query = Mainkettambahan::find();

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
            'kettambahanid' => $this->kettambahanid,
            'questid' => $this->questid,
        ]);

        $query->andFilterWhere(['like', 'kettambbahan', $this->kettambbahan]);

        return $dataProvider;
    }
}
