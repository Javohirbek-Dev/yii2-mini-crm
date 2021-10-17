<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ApplicationsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заявки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="applications-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
<!--        --><?php //echo Html::a('Создать заявку', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Экспорт еxcel', ['send'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'user_name',
            'applications_name',
            'product_name',
            [
                'attribute' => 'applications_status',
                'value' => function($model){
                    switch ($model->applications_status) {
                        case 1:
                            $status = 'Принята';
                            break;
                        case 2:
                            $status =  "отказана";
                            break;
                        case 3:
                            $status =  "брак";
                            break;
                        default:
                            $status = "не просмотрено";
                    }
                    return $status;

                },
            ],
//            'tell_number',
//            'product_status',
//            'applications_status',
//            'comment',
//            'price',
//            'created_at',
            [
                'class' => \yii\grid\ActionColumn::className(),
                'template'=>'{view}{delete}{update}',
            ]
        ],
    ]); ?>



</div>
