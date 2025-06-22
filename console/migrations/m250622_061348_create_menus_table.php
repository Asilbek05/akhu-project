<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%menus}}`.
 */
class m250622_061348_create_menus_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%menus}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255),
            'slug' => $this->string(255),
            'parent_id' => $this->integer(),
        ]);

        $this->addForeignKey(
            'fk-menus-parent_id',
            'menus',
            'parent_id',
            'menus',
            'id',
            'SET NULL'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-menus-parent_id', 'menus');
        $this->dropTable('{{%menus}}');
    }
}