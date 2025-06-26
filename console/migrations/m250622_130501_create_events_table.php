<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%events}}`.
 */
class m250622_130501_create_events_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%events}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'location' => $this->string()->null(),
            'start_date' => $this->date()->notNull(),
            'end_date' => $this->date()->null(),
            'time' => $this->time()->null(),
            'description' => $this->text()->null(),
            'views' => $this->integer()->notNull()->defaultValue(0),
            'created_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%events}}');
    }
}
