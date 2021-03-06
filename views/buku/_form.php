<?php

use app\models\Kategori;
use app\models\Penerbit;
use app\models\Penulis;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Buku */
/* @var $form yii\widgets\ActiveForm */
?>  

<div class="buku-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tahun_terbit')->textInput(['maxlength' => true]) ?>


    <?php if ($model->id_penulis == null) { ?>
    <?= $form->field($model, 'id_penulis')->widget(Select2::classname(), [
            'data' =>  Penulis::getList(),
            'options' => [
              'placeholder' => '- Pilih Penulis -',
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>
    <?php }?>

    <?php if ($model->id_penerbit == null) { ?>
    <?= $form->field($model, 'id_penerbit')->widget(Select2::classname(), [
            'data' =>  Penerbit::getList(),
            'options' => [
              'placeholder' => '- Pilih Penerbit -',
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>
    <?php }?>

    <?php if ($model->id_kategori == null) { ?>
     <?= $form->field($model, 'id_kategori')->widget(Select2::classname(), [
            'data' =>  Kategori::getList(),
            'options' => [
              'placeholder' => '- Pilih Kategori -',
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>
        <?php }?>


    <?= $form->field($model, 'sinopsis')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sampul')->widget(FileInput::classname(), [
        'data' => $model->berkas,
        'options' => ['multiple' => true],
    ]); ?>

    <?= $form->field($model, 'berkas')->widget(FileInput::classname(), [
        'data' => $model->berkas,
        'options' => ['multiple' => true],
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
