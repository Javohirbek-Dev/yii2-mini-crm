<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\LogsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'история изменений';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="logs-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'user_name',
            [
                'attribute' => 'user_old_log',
                'value' => function($model){
                    $text = '';
                    foreach ($model->user_old_log as  $value){
                        foreach ($value as $key=>$value){
                            $text .= $key.'=>'.$value.', '.PHP_EOL;
                        }
                    }
                    return $text;
                },
            ],
            [
                'attribute' => 'user_new_log',
                'value' => function($model){
                    if (is_array($model->user_new_log)){
                        $text = '';
                        foreach ($model->user_new_log as  $value){
                            foreach ($value as $key=>$value){
                                $text .= $key.'=>'.$value.', '.PHP_EOL;
                            }
                        }
                    }else{
                        $text = $model->user_new_log;
                    }

                    return $text;
                },
            ],
            'datetime',

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
