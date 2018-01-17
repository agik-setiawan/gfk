<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Maindispitdpcnperip;

/**
 * MaindispitdpcnperipSearch represents the model behind the search form of `app\models\Maindispitdpcnperip`.
 */
class MaindispitdpcnperipSearch extends Maindispitdpcnperip
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['itdpcid', 'questid', 'hp', 'acer', 'samsung', 'advan', 'lenovo', 'asus', 'canon', 'fujixerox', 'panasonic', 'brother', 'epson', 'totalunit'], 'integer'],
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
        $query = Maindispitdpcnperip::find();

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
            'itdpcid' => $this->itdpcid,
            'questid' => $this->questid,
            'hp' => $this->hp,
            'acer' => $this->acer,
            'samsung' => $this->samsung,
            'advan' => $this->advan,
            'lenovo' => $this->lenovo,
            'asus' => $this->asus,
            'canon' => $this->canon,
            'fujixerox' => $this->fujixerox,
            'panasonic' => $this->panasonic,
            'brother' => $this->brother,
            'epson' => $this->epson,
            'totalunit' => $this->totalunit,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'others', $this->others]);

        return $dataProvider;
    }
}
