<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\ApplicationsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="applications-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_name') ?>

    <?= $form->field($model, 'applications_name') ?>

    <?= $form->field($model, 'product_name') ?>

    <?= $form->field($model, 'tell_number') ?>

    <?php // echo $form->field($model, 'product_status') ?>

    <?php // echo $form->field($model, 'applications_status') ?>

    <?php // echo $form->field($model, 'comment') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
