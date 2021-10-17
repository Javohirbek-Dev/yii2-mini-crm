<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Logs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="logs-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_old_log')->textInput() ?>

    <?= $form->field($model, 'user_new_log')->textInput() ?>

    <?= $form->field($model, 'datetime')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
