<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Maindispphoto;

/**
 * MaindispphotoSearch represents the model behind the search form of `app\models\Maindispphoto`.
 */
class MaindispphotoSearch extends Maindispphoto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['photoid', 'questid', 'canon', 'nikon', 'samsung', 'olympus', 'fujifilm', 'tamron', 'sony', 'totalunit'], 'integer'],
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
        $query = Maindispphoto::find();

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
            'photoid' => $this->photoid,
            'questid' => $this->questid,
            'canon' => $this->canon,
            'nikon' => $this->nikon,
            'samsung' => $this->samsung,
            'olympus' => $this->olympus,
            'fujifilm' => $this->fujifilm,
            'tamron' => $this->tamron,
            'sony' => $this->sony,
            'totalunit' => $this->totalunit,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'others', $this->others]);

        return $dataProvider;
    }
}
