<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Applications */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="applications-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'applications_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tell_number')->textInput() ?>

    <?= $form->field($model, 'product_status')->dropDownList([0 => 'не активный', 1 => 'активный']);  ?>

    <?= $form->field($model, 'applications_status')->dropDownList([1 => 'Принята', 2=>'отказана', 3=>'брак']); ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
