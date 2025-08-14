<?php

use yii\db\Migration;

class m250625_123236_update_is_published_and_add_view_count_to_post extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // Make sure is_published is boolean with default 0
        $this->alterColumn('{{%posts}}', 'is_published', $this->boolean()->defaultValue(0));

        // Check if 'view_count' already exists before adding
        $table = Yii::$app->db->schema->getTableSchema('{{%posts}}');
        if (!isset($table->columns['view_count'])) {
            $this->addColumn('{{%posts}}', 'view_count', $this->integer()->defaultValue(0)->after('is_published'));
        }
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Drop column only if exists
        $table = Yii::$app->db->schema->getTableSchema('{{%posts}}');
        if (isset($table->columns['view_count'])) {
            $this->dropColumn('{{%posts}}', 'view_count');
        }

        // Revert column type back to integer with default 0
        $this->alterColumn('{{%posts}}', 'is_published', $this->integer()->defaultValue(0));
    }
}
