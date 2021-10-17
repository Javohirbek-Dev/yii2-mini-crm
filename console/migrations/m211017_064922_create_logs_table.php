<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%logs}}`.
 */
class m211017_064922_create_logs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%logs}}', [
            'id' => $this->primaryKey(),
            'user_name' => $this->string(),
            'user_old_log' => $this->json(),
            'user_new_log' => $this->json(),
            'datetime' => $this->timestamp(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%logs}}');
    }
}
