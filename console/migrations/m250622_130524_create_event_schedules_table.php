<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%event_schedules}}`.
 */
class m250622_130524_create_event_schedules_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%event_schedule}}', [
            'id' => $this->primaryKey(),
            'event_id' => $this->integer()->notNull(),
            'start_time' => $this->time()->notNull(),
            'end_time' => $this->time()->null(),
            'title' => $this->string()->notNull(),
            'description' => $this->text()->null(),
            'sort_order' => $this->integer()->defaultValue(0),
        ]);

        $this->addForeignKey(
            'fk_event_schedule_event',
            '{{%event_schedule}}',
            'event_id',
            '{{%events}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_event_schedule_event', '{{%event_schedule}}');
        $this->dropTable('{{%event_schedule}}');
    }
}
