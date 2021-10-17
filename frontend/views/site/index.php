<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ApplicationsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список товаров';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="applications-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'product_name',

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
