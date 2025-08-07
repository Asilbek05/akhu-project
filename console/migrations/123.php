<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post_tag}}`.
 */
class m250807_133215_create_post_tag_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%posts_tag}}', [
            'post_id' => $this->integer()->notNull(),
            'tag_id' => $this->integer()->notNull(),
        ]);

        // Birlamchi kalit (composite)
        $this->addPrimaryKey('pk-posts_tag', '{{%posts_tag}}', ['post_id', 'tag_id']);

        // Foreign key: post_id -> posts(id)
        $this->addForeignKey(
            'fk-posts_tag-posts',
            '{{%posts_tag}}',
            'post_id',
            '{{%posts}}',
            'id',
            'CASCADE'
        );

        // Foreign key: tag_id -> tag(id)
        $this->addForeignKey(
            'fk-posts_tag-tag',
            '{{%posts_tag}}',
            'tag_id',
            '{{%tag}}',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk-posts_tag-tag', '{{%posts_tag}}');
        $this->dropForeignKey('fk-posts_tag-posts', '{{%posts_tag}}');
        $this->dropPrimaryKey('pk-posts_tag', '{{%posts_tag}}');
        $this->dropTable('{{%posts_tag}}');
    }
}


use yii\db\Migration;

/**
 * Handles the creation of table `{{%tag}}`.
 */
class m250807_133259_create_tag_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tag}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull()->unique(),
            'slug' => $this->string(100)->unique(), // << slug ustuni qo'shildi
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%tag}}');
    }
}
