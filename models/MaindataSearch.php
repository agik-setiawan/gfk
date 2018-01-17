<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Maindata;

/**
 * MaindataSearch represents the model behind the search form of `app\models\Maindata`.
 */
class MaindataSearch extends Maindata
{
   public $statusrole;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['questid', 'provinceid', 'kotamadyaid', 'kecamatanid', 'desaid', 'kodepos', 'createdby', 'lastmodifiedby', 'status','tipetokoid'], 'integer'],
            [['quescode', 'nopeta', 'date', 'interviewer', 'teamleader', 'dataentry', 'createdon', 'lastmodifiedon', 'kettambahan', 'dati','namatoko','statusrole'], 'safe'],
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
        $query = Maindata::find();

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
	if(Yii::$app->user->identity->groupuser==3){
            $query->andFilterWhere(['createdby'=>Yii::$app->user->id]);
            }
        // grid filtering conditions
        $query->andFilterWhere([
            'questid' => $this->questid,
            'date' => $this->date,
            'provinceid' => $this->provinceid,
            'kotamadyaid' => $this->kotamadyaid,
            'kecamatanid' => $this->kecamatanid,
            'desaid' => $this->desaid,
            'kodepos' => $this->kodepos,
            'createdby' => $this->createdby,
            'createdon' => $this->createdon,
            'lastmodifiedby' => $this->lastmodifiedby,
            'lastmodifiedon' => $this->lastmodifiedon,
            'status' => $this->status,
            'tipetokoid' => $this->tipetokoid,
        ]);


        $query->andFilterWhere(['like', 'quescode', $this->quescode])
            ->andFilterWhere(['like', 'nopeta', $this->nopeta])
            ->andFilterWhere(['like', 'interviewer', $this->interviewer])
            ->andFilterWhere(['like', 'teamleader', $this->teamleader])
            ->andFilterWhere(['like', 'dataentry', $this->dataentry])
            ->andFilterWhere(['like', 'kettambahan', $this->kettambahan])
            ->andFilterWhere(['like', 'dati', $this->dati])
            ->andFilterWhere(['like', 'namatoko', $this->namatoko]);
            // ->andFilterWhere(['like', 'namatoko', $this->namatoko]);
            // ->andFilterWhere(['like', 'tipetokoid', $this->tipetokoid]);

        return $dataProvider;
    }
}
