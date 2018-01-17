<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Maindispauto;

/**
 * MaindispautoSearch represents the model behind the search form of `app\models\Maindispauto`.
 */
class MaindispautoSearch extends Maindispauto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['autoid', 'questid', 'dunlop', 'hankook', 'goodyear', 'bridgestone', 'accelera', 'gtradial', 'achilles', 'ahm', 'federal', 'pertamina', 'yamalube', 'castrol', 'shell', 'top1', 'totalunit'], 'integer'],
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
        $query = Maindispauto::find();

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
            'autoid' => $this->autoid,
            'questid' => $this->questid,
            'dunlop' => $this->dunlop,
            'hankook' => $this->hankook,
            'goodyear' => $this->goodyear,
            'bridgestone' => $this->bridgestone,
            'accelera' => $this->accelera,
            'gtradial' => $this->gtradial,
            'achilles' => $this->achilles,
            'ahm' => $this->ahm,
            'federal' => $this->federal,
            'pertamina' => $this->pertamina,
            'yamalube' => $this->yamalube,
            'castrol' => $this->castrol,
            'shell' => $this->shell,
            'top1' => $this->top1,
            'totalunit' => $this->totalunit,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'others', $this->others]);

        return $dataProvider;
    }
}
