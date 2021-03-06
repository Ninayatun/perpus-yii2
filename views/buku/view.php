<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\models\Buku;
use yii\models\Penerbit;
use yii\models\Kategori;
use app\models\Penulis;

/* @var $this yii\web\View */
/* @var $model app\models\Buku */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bukus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buku-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            [
                //untuk merubah nama diatas tabel  di view (detail Buku)
                'label' => 'Nama',
                'attribute' => 'nama',
                'value' => $model->nama
                // . '('.$model->tahun_terbit. ')'
            ],
            [
                'attribute' => 'tahun_terbit',
                'value' => $model->tahun_terbit

            ],

            
            [
            'attribute' => "id_penulis",
            'value' => function($data){
                return $data->getPenulis();
            }
        ],
            
              [
            'attribute' => "id_penerbit",
            'value' => function($data){
                return $data->getPenerbit();
            }
        ],

             [
            'attribute' => "id_kategori",
            'value' => function($data){
                return $data->getKategori();
            }
        ],
        
            'sinopsis:ntext',
                [
              'attribute' => 'sampul',
              'format' =>'raw',
              'value' => function ($model){
                if ($model->sampul != '') {
                    return Html::img('@web/upload/'. $model->sampul,['class'=>'img-responsive','style' => 'height:150px', 'align'=>'center']);
                }else{
                  return '<div align="center"><h1>No Image</h1></div>';
                }
              },
            ],
            'berkas',
            //  [
            //     'attribute' => 'berkas',
            //     'format' => 'raw',
            //     'value' => function ($model) {
            //         if ($model->berkas !='') {
            //             return '<a href="' . Yii::$app->homeUrl . '/upload/berkas/' . $model->berkas . '"><div align="left"><button class="btn btn-primary glyphicon glyphicon-download-alt" type="submit"></button></div></a>';
            //         } else {
            //             return '<div align="center"><h1>No File</h1></div>';
            //         }
            //     },
            // ],
        ],
    ]) ?>


</div>

