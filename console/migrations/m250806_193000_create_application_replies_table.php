<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%application_replies}}`.
 */
class m250806_193000_create_application_replies_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%application_replies}}', [
            'id' => $this->primaryKey(),
            'request_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'reply_message' => $this->text()->notNull(),
            'created_at' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-application_replies-request_id',
            '{{%application_replies}}',
            'request_id',
            '{{%application_requests}}',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk-application_replies-request_id', '{{%application_replies}}');
        $this->dropTable('{{%application_replies}}');
    }
}
