<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%programs}}`.
 */
class m250622_061346_create_programs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%programs}}', [
            'id' => $this->primaryKey(),
            'faculties_id' => $this->integer(),
            'name' => $this->string()->notNull(),
            'description' => $this->text(),
            'image' => $this->string(255),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);
        $this->addForeignKey(
            'fk-programs-faculties_id',
            'programs',
            'faculties_id',
            'faculties',
            'id',
            'SET NULL'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-programs-faculties_id', 'programs');
        $this->dropTable('{{%programs}}');
    }
}
