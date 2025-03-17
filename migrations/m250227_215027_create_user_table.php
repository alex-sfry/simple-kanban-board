<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m250227_215027_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->text(),
            'password' => $this->text(),
            'password_hash' => $this->text(),
            'password_reset_token' => $this->text(),
            'verification_token' => $this->text(),
            'email' => $this->text(),
            'auth_key' => $this->text(),
            'status' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
