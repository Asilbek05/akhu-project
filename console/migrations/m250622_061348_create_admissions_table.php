<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%admissions}}`.
 */
class m250622_061348_create_admissions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%admissions}}', [
            'id' => $this->primaryKey(),
            'year' => $this->tinyInteger(4),
            'content' => $this->text(),
            'tuition_fee' => $this->decimal(10, 2),
            'deadline' => $this->date(),
            'created_at' => $this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%admissions}}');
    }
}
