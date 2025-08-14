<?php

use yii\db\Migration;

class m250622_133006_create_leadership_and_sections_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%leadership}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'position' => $this->string()->notNull(),
            'email' => $this->string()->null(),
            'phone' => $this->string()->null(),
            'photo' => $this->string()->null(),
            'sort_order' => $this->integer()->defaultValue(0),
            'created_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        //leadership_sections
        $this->createTable('{{%leadership_sections}}', [
            'id' => $this->primaryKey(),
            'leadership_id' => $this->integer()->notNull(),
            'title' => $this->string()->notNull(),
            'content' => $this->text()->null(),
            'sort_order' => $this->integer()->defaultValue(0),
        ]);

        $this->addForeignKey(
            'fk_leadership_sections_leadership',
            '{{%leadership_sections}}',
            'leadership_id',
            '{{%leadership}}',
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
        $this->dropForeignKey(
            'fk_leadership_sections_leadership',
            '{{%leadership_sections}}'
        );

        $this->dropTable('{{%leadership_sections}}');
        $this->dropTable('{{%leadership}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250622_133006_create_leadership_and_sections_tables cannot be reverted.\n";

        return false;
    }
    */
}
