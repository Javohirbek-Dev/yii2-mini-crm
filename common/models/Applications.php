<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "applications".
 *
 * @property int $id
 * @property string|null $user_name
 * @property string|null $applications_name
 * @property string|null $product_name
 * @property int|null $tell_number
 * @property int $product_status
 * @property int $applications_status
 * @property string|null $comment
 * @property int|null $price
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Applications extends \yii\db\ActiveRecord
{
    const DELETED = 0;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'applications';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => function(){ return date('Y-m-d');},
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tell_number', 'product_name', 'user_name', 'comment'], 'required'],
            [['product_status', 'applications_status', 'price'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['tell_number', 'user_name', 'applications_name', 'product_name', 'comment'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_name' => 'Имя пользователя',
            'applications_name' => 'Наименование заявки',
            'product_name' => 'Наименование товара',
            'tell_number' => 'телефон',
            'product_status' => 'Статус продукта',
            'applications_status' => 'заявки Статус',
            'comment' => 'Комментарий',
            'price' => 'Цена',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
