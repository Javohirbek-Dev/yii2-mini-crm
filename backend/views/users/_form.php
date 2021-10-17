<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true])->label('Эл. адрес') ?>

    <?= $form->field($model, 'password')->textInput(['maxlength' => true])->label('Пароль') ?>

    <?= $form->field($model, 'rule')->dropDownList( ['Admin'=>'Admin', 'Drektor'=>'Drektor'] )->label('Правило') ?>

    <?= $form->field($model, 'status')->radioList( [10 => 'активный', 9=>'неактивный'] )->label('Статус'); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
