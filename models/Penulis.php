<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "penulis".
 *
 * @property int $id
 * @property string $nama
 * @property string $alamat
 * @property string $telepon
 * @property string $email
 */
class Penulis extends \yii\db\ActiveRecord
{

     /**
     * @inheritdoc
     * @return array untuk dropdown
     */
    public static function getList()
    {
        return \yii\helpers\ArrayHelper::map(self::find()->all(), 'id', 'nama');
    }

    //untuk menampilkan di buku sebagai nama

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'penulis';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['alamat'], 'string'],
            [['nama', 'telepon', 'email'], 'string', 'max' => 255],
        ];

    }
   

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'telepon' => 'Telepon',
            'email' => 'Email',
        ];

    }

      //Untuk menampilkan data buku yg berkaitan dengan form view masing-masing
    public function findAllBuku() {
        return Buku::find()->andwhere(['id_penulis' 
            => $this->id])
        ->orderBy(['nama' => SORT_ASC])
        ->all();

    }

    public function getJumlahbuku()
    {
        return Buku::find()->andwhere(['id_buku' => $this->id])
        ->all();

    }
    
}