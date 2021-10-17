<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('создать пользователя', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'username',
//            'full_name',
//            'image',
//            'auth_key',
            //'password_hash',
            //'password_reset_token',
            'email:email',
            'rule',
            [
                'label' => 'status',
                'attribute' => 'status',
                'filter' => ['10' => 'активный', '9' => 'неактивный'],
                'filterInputOptions' => ['prompt' => 'Все образования', 'class' => 'form-control', 'id' => null],
                'value' => function ($model) {
                    if ($model->status == 10){
                        return 'активный';
                    }else{
                        return 'неактивный';
                    }
                }
            ],
            [
                'attribute' => 'created_at',
                'filter' => true,
                'format' => 'raw',
                'value' => function ($model) {
                    return date('Y-m-d', $model->created_at);
                }
            ],
            //'updated_at',
            //'verification_token',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>