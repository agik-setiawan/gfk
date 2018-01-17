<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mainpersendisplay;

/**
 * MainpersendisplaySearch represents the model behind the search form of `app\models\Mainpersendisplay`.
 */
class MainpersendisplaySearch extends Mainpersendisplay
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pdisplayid', 'questid'], 'integer'],
            [['audiovisual', 'homeentertaint', 'sda', 'mda', 'photo', 'it', 'telecom', 'auto', 'lighting', 'other', 'itdpcppc', 'peripherals', 'accessories', 'component', 'networking', 'othersit'], 'number'],
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
        $query = Mainpersendisplay::find();

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
            'pdisplayid' => $this->pdisplayid,
            'questid' => $this->questid,
            'audiovisual' => $this->audiovisual,
            'homeentertaint' => $this->homeentertaint,
            'sda' => $this->sda,
            'mda' => $this->mda,
            'photo' => $this->photo,
            'it' => $this->it,
            'telecom' => $this->telecom,
            'auto' => $this->auto,
            'lighting' => $this->lighting,
            'other' => $this->other,
            'itdpcppc' => $this->itdpcppc,
            'peripherals' => $this->peripherals,
            'accessories' => $this->accessories,
            'component' => $this->component,
            'networking' => $this->networking,
            'othersit' => $this->othersit,
        ]);

        return $dataProvider;
    }
}
