<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%logs}}`.
 */
class m250709_090522_create_logs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%logs}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->null(),
            'action' => $this->string(255)->notNull(),
            'message' => $this->text()->null(),
            'ip' => $this->string(45)->null(),
            'user_agent' => $this->string(512)->null(),
            'level' => $this->string(50)->defaultValue('info'),
            'created_at' => $this->integer()->notNull(),
        ]);

        $this->createIndex(
            'idx-logs-user_id',
            '{{%logs}}',
            'user_id'
        );

         $this->addForeignKey(
             'fk-logs-user_id',
             '{{%logs}}',
             'user_id',
             '{{%user}}',
             'id',
             'SET NULL',
             'CASCADE'
         );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-logs-user_id', '{{%logs}}');
        $this->dropIndex('idx-logs-user_id', '{{%logs}}');
        $this->dropTable('{{%logs}}');
    }
}
