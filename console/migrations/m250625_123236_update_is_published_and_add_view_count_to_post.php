<?php

use yii\db\Migration;

class m250625_123236_update_is_published_and_add_view_count_to_post extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('{{%posts}}', 'is_published', $this->boolean()->defaultValue(0));


        $this->addColumn('{{%posts}}', 'view_count', $this->integer()->defaultValue(0)->after('is_published'));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%posts}}', 'view_count');


        $this->alterColumn('{{%posts}}', 'is_published', $this->integer()->defaultValue(0));

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250625_123236_update_is_published_and_add_view_count_to_post cannot be reverted.\n";

        return false;
    }
    */
}
