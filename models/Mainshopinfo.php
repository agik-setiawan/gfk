<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mainshopinfo".
 *
 * @property int $shopinfoid
 * @property int $questid
 * @property string $namatoko
 * @property string $merktunggal
 * @property string $namagedung
 * @property int $lantai
 * @property string $blokgedung
 * @property int $nogedung
 * @property string $jalan
 * @property string $blokjalan
 * @property int $nojalan
 * @property string $telp
 * @property string $email
 * @property string $lokasitoko
 * @property string $bentuktoko
 * @property int $luastokop
 * @property int $luastokopl
 * @property string $ukurantoko
 * @property int $jumlahlantai
 * @property int $jumlahpegawai
 * @property int $hargasewa
 * @property int $omzettoko
 * @property string $buktikedatangan
 * @property string $photo
 * @property int $usiatoko
 * @property string $namaresponden
 * @property string $statustoko
 * @property string $gsnr
 * @property double $longitude
 * @property double $lat
 * @property string $kasir
 * @property string $software
 * @property string $kendaraan
 */
class Mainshopinfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

     public $gedungothers;
     public $avatar;
     public $image;

    public static function tableName()
    {
        return 'mainshopinfo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['questid', 'namatoko',  'telp', 'lokasitoko', 'bentuktoko', 'luastokop', 'luastokopl', 'ukurantoko', 'jumlahlantai', 'jumlahpegawai', 'hargasewa', 'omzettoko', 'buktikedatangan', 'usiatoko', 'namaresponden', 'statustoko', 'longitude', 'lat', 'kasir', 'software', 'kendaraan'], 'required'],
            [['image'], 'required', 'on'=> 'create'],

            [['lantai','blokgedung','nogedung'], 'required', 'when' => function ($model) {
                return $model->namagedung != "others" && $model->jalan == "" && $model->namagedung != "";
            }, 'whenClient' => "function (attribute, value) {
                return  $('#namagedung').val() != 'others' && $('#jalan').val() == '' && $('#namagedung').val() != '';
            }"],
            
            [['blokjalan', 'nojalan'], 'required', 'when' => function ($model) {
                return $model->lokasitoko == "Jalan";
            }, 'whenClient' => "function (attribute, value) {
                return $('#lokasitoko').val() == 'Jalan';
            }"],
            [['nogedung'], 'required', 'when' => function ($model) {
                return $model->lokasitoko != "Jalan";
            }, 'whenClient' => "function (attribute, value) {
                return $('#lokasitoko').val() != 'Jalan';
            }"],
            
             [['namagedung'], 'required', 'when' => function ($model) {
                return $model->lokasitoko == "Mall";
            }, 'whenClient' => "function (attribute, value) {
                return $('#lokasitoko').val() == 'Mall';
            }"],
            [['gsnr'], 'required', 'when' => function ($model) {
                 return $model->statustoko == "Panel";
             }, 'whenClient' => "function (attribute, value) {
                return $('#statustoko').val() == 'Panel';
            }"],

            [['questid',  'jumlahlantai', 'jumlahpegawai', 'hargasewa', 'gsnr'], 'integer'],
            [['longitude', 'lat', 'kasir', 'kendaraan'], 'number'],
            [['luastokop', 'luastokopl', 'usiatoko'],'number', 'min'=>1],
            [['namatoko', 'merktunggal', 'namagedung', 'namaresponden'], 'string', 'max' => 200],
            [['omzettoko'], 'string', 'max' => 300],
            [['gedungothers'], 'string', 'max' => 300],
            [['blokgedung', 'blokjalan', 'software','lantai', 'nogedung', 'nojalan'], 'string', 'max' => 10],
            [['jalan','photo'], 'string', 'max' => 500],
            // [['image'], 'safe'],
            [['image'], 'file', 'extensions'=>'jpg, gif, png'],
            [['telp'], 'string', 'max' => 15],
            [['email', 'lokasitoko', 'bentuktoko'], 'string', 'max' => 50],
            [['ukurantoko'], 'string', 'max' => 2],
            [['buktikedatangan', 'statustoko'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'shopinfoid' => 'Shopinfoid',
            'questid' => 'Questid',
            'namatoko' => 'Nama toko',
            'merktunggal' => 'Merk tunggal',
            'namagedung' => 'Nama gedung',
            'gedungothers' => 'Nama Gedung(Others)',
            'lantai' => 'Lantai',
            'blokgedung' => 'Blok',
            'nogedung' => 'No',
            'jalan' => 'Jalan',
            'blokjalan' => 'Blok',
            'nojalan' => 'No',
            'telp' => 'No. Telepon',
            'email' => 'Email/Website',
            'lokasitoko' => 'Lokasi toko',
            'bentuktoko' => 'Bentuk toko',
            'luastokop' => 'Luas toko [p]',
            'luastokopl' => 'Luas toko [l]',
            'ukurantoko' => 'Ukuran toko',
            'jumlahlantai' => 'Jumlah lantai',
            'jumlahpegawai' => 'Jumlah pegawai',
            'hargasewa' => 'Harga sewa',
            'omzettoko' => 'Omzet toko',
            'buktikedatangan' => 'Bukti kedatangan',
            'photo' => 'Photo',
            'usiatoko' => 'Usia toko',
            'namaresponden' => 'Nama responden',
            'statustoko' => 'Status toko',
            'gsnr' => 'GSNR',
            'longitude' => 'Longitude',
            'lat' => 'Latitude',
            'kasir' => 'Kasir',
            'software' => 'Software Pembukuan(POS)',
            'kendaraan' => 'Kendaraan pengantar',
        ];
    }


}
