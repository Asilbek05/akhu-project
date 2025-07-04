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
            'title' => $this->string()->notNull(),
            'slug' => $this->string()->notNull(),
            'parent_id' => $this->integer()->null(),
            'content' => $this->text()->null(),
            'order_num' => $this->integer()->defaultValue(0),
            'isactive' => $this->boolean()->defaultValue(1),
            'created_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        $this->addForeignKey(
            'fk_menus_parent',
            '{{%menus}}',
            'parent_id',
            '{{%menus}}',
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
        $this->dropForeignKey('fk_menus_parent', '{{%menus}}');
        $this->dropTable('{{%menus}}');
    }
}