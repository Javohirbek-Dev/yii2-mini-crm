<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%applications}}`.
 */
class m211015_211712_create_applications_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%applications}}', [
            'id' => $this->primaryKey(),
            'user_name' => $this->string(),
            'applications_name' => $this->string(),
            'product_name' => $this->string(),
            'tell_number' => $this->string(),
            'product_status' => $this->smallInteger()->notNull()->defaultValue(1),
            'applications_status' => $this->smallInteger()->notNull()->defaultValue(0),
            'comment' => $this->string(),
            'price' => $this->integer(),
            'created_at' => $this->timestamp()->notNull(),
            'updated_at' => $this->timestamp()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%applications}}');
    }
}
