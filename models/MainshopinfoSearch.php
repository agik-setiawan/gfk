<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mainshopinfo;

/**
 * MainshopinfoSearch represents the model behind the search form of `app\models\Mainshopinfo`.
 */
class MainshopinfoSearch extends Mainshopinfo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shopinfoid', 'questid', 'lantai', 'nogedung', 'nojalan', 'luastokop', 'luastokopl', 'jumlahlantai', 'jumlahpegawai', 'hargasewa', 'omzettoko', 'usiatoko'], 'integer'],
            [['namatoko', 'merktunggal', 'namagedung', 'blokgedung', 'jalan', 'blokjalan', 'telp', 'email', 'lokasitoko', 'bentuktoko', 'ukurantoko', 'buktikedatangan', 'photo', 'namaresponden', 'statustoko', 'gsnr', 'kasir', 'software', 'kendaraan'], 'safe'],
            [['longitude', 'lat'], 'number'],
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
        $query = Mainshopinfo::find();

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
            'shopinfoid' => $this->shopinfoid,
            'questid' => $this->questid,
            'lantai' => $this->lantai,
            'nogedung' => $this->nogedung,
            'nojalan' => $this->nojalan,
            'luastokop' => $this->luastokop,
            'luastokopl' => $this->luastokopl,
            'jumlahlantai' => $this->jumlahlantai,
            'jumlahpegawai' => $this->jumlahpegawai,
            'hargasewa' => $this->hargasewa,
            'omzettoko' => $this->omzettoko,
            'usiatoko' => $this->usiatoko,
            'longitude' => $this->longitude,
            'lat' => $this->lat,
        ]);

        $query->andFilterWhere(['like', 'namatoko', $this->namatoko])
            ->andFilterWhere(['like', 'merktunggal', $this->merktunggal])
            ->andFilterWhere(['like', 'namagedung', $this->namagedung])
            ->andFilterWhere(['like', 'blokgedung', $this->blokgedung])
            ->andFilterWhere(['like', 'jalan', $this->jalan])
            ->andFilterWhere(['like', 'blokjalan', $this->blokjalan])
            ->andFilterWhere(['like', 'telp', $this->telp])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'lokasitoko', $this->lokasitoko])
            ->andFilterWhere(['like', 'bentuktoko', $this->bentuktoko])
            ->andFilterWhere(['like', 'ukurantoko', $this->ukurantoko])
            ->andFilterWhere(['like', 'buktikedatangan', $this->buktikedatangan])
            ->andFilterWhere(['like', 'photo', $this->photo])
            ->andFilterWhere(['like', 'namaresponden', $this->namaresponden])
            ->andFilterWhere(['like', 'statustoko', $this->statustoko])
            ->andFilterWhere(['like', 'gsnr', $this->gsnr])
            ->andFilterWhere(['like', 'kasir', $this->kasir])
            ->andFilterWhere(['like', 'software', $this->software])
            ->andFilterWhere(['like', 'kendaraan', $this->kendaraan]);

        return $dataProvider;
    }
}
