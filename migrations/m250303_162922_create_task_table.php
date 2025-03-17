<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%task}}`.
 */
class m250303_162922_create_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%task}}', [
            'id' => $this->primaryKey(),
            'title' => $this->text()->notNull(),
            'description' => $this->text(),
            'status' => $this->text(),
            'user_id' => $this->integer()->notNull(),
            'project_id' => $this->integer()->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%task}}');
    }
}
