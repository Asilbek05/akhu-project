<?php

use yii\db\Migration;

class m250806_084602_add_code_and_status_to_application_requests_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%application_requests}}', 'email', $this->string()->notNull()->after('name'));
        $this->addColumn('{{%application_requests}}', 'code', $this->string(32)->unique()->null()->after('email'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%application_requests}}', 'code');
        $this->dropColumn('{{%application_requests}}', 'email');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250806_084602_add_code_and_status_to_application_requests_table cannot be reverted.\n";

        return false;
    }
    */
}
