<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Applications */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="applications-form">
    <h1><?= Html::encode('Отправить заявку') ?></h1>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_name')->textInput(['maxlength' => true])->label('Ф.И.О') ?>

    <?= $form->field($model, 'product_name')->textInput(['maxlength' => true])->label('Наименование товара') ?>

    <?= $form->field($model, 'tell_number')->widget(\yii\widgets\MaskedInput::class, [
        'mask' => '9-999-999-99-99',
    ])->label('Телефон') ?>

    <?= $form->field($model, 'comment')->textarea(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
