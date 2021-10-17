<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Авторизоваться';
?>
<div class="site-login">
    <div class="mt-5 offset-lg-3 col-lg-6">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php
        if(Yii::$app->session->hasFlash('success')){
            echo "<div class='alert alert-success'>".Yii::$app->session->getFlash('success')."</div>";
        }
        ?>
        <p>Пожалуйста, заполните следующие поля для входа:</p>

        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Адрес эл. почты') ?>

        <?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>

            <?= $form->field($model, 'rememberMe')->checkbox() ?>

            <?= Html::a('Регистрация', ['site/signup']) ?>

            <div class="form-group">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
            </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
