<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post_images}}`.
 */
class m250622_125357_create_post_images_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%post_images}}', [
            'id' => $this->primaryKey(),
            'post_id' => $this->integer()->notNull(),
            'image' => $this->string()->notNull(),
            'created_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        // foreign key to posts table
        $this->addForeignKey(
            'fk-post_images-post_id',
            '{{%post_images}}',
            'post_id',
            '{{%posts}}',
            'id',
            'CASCADE'
        );
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-post_images-post_id', '{{%post_images}}');
        $this->dropTable('{{%post_images}}');
    }

}

