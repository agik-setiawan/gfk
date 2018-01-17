<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Maindispittel;

/**
 * MaindispittelSearch represents the model behind the search form of `app\models\Maindispittel`.
 */
class MaindispittelSearch extends Maindispittel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ittelid', 'questid', 'oppo', 'mi', 'lenovo', 'samsung', 'advan', 'nokia', 'asus', 'totalunit', 'totalunitcheck'], 'integer'],
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
        $query = Maindispittel::find();

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
            'ittelid' => $this->ittelid,
            'questid' => $this->questid,
            'oppo' => $this->oppo,
            'mi' => $this->mi,
            'lenovo' => $this->lenovo,
            'samsung' => $this->samsung,
            'advan' => $this->advan,
            'nokia' => $this->nokia,
            'asus' => $this->asus,
            'totalunit' => $this->totalunit,
            'totalunitcheck' => $this->totalunitcheck,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'others', $this->others]);

        return $dataProvider;
    }
}
