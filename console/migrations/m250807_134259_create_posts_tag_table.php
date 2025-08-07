<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%posts_tag}}`.
 */
class m250807_134259_create_posts_tag_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%posts_tag}}', [
            'posts_id' => $this->integer()->notNull(), // <-- post_id emas, posts_id
            'tag_id' => $this->integer()->notNull(),
        ]);

        $this->addPrimaryKey('pk-posts_tag', '{{%posts_tag}}', ['posts_id', 'tag_id']);

        $this->addForeignKey(
            'fk-posts_tag-posts_id',
            '{{%posts_tag}}',
            'posts_id',
            '{{%posts}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-posts_tag-tag_id',
            '{{%posts_tag}}',
            'tag_id',
            '{{%tag}}',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk-posts_tag-tag_id', '{{%posts_tag}}');
        $this->dropForeignKey('fk-posts_tag-posts_id', '{{%posts_tag}}');
        $this->dropPrimaryKey('pk-posts_tag', '{{%posts_tag}}');
        $this->dropTable('{{%posts_tag}}');
    }
}
