<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Applications */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Applications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="applications-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_name',
            'applications_name',
            'product_name',
            'tell_number',
            [
                'attribute' => 'product_status',
                'value' => function($model){
                    switch ($model->product_status) {
                        case 0:
                            $status = 'не активный';
                            break;
                        case 1:
                            $status =  "активный";
                            break;
                    }
                    return $status;

                },
            ],
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
            'comment',
            'price',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
