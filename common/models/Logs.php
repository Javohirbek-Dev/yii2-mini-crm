<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "logs".
 *
 * @property int $id
 * @property string|null $user_name
 * @property string|null $user_old_log
 * @property string|null $user_new_log
 * @property string|null $datetime
 */
class Logs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'logs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_old_log', 'user_new_log', 'datetime'], 'safe'],
            [['user_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_name' => 'User Name',
            'user_old_log' => 'User Old Log',
            'user_new_log' => 'User New Log',
            'datetime' => 'Datetime',
        ];
    }
}
