<?php

use yii\db\Migration;

class m250708_065135_insert_sample_application_requests_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        for ($i = 1; $i <= 10; $i++) {
            $this->insert('{{%application_requests}}', [
                'name' => "Test User $i",
                'phone' => "+9989012345$i",
                'message' => "This is a sample message $i.",
                'status' => 0,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        for ($i = 1; $i <= 10; $i++) {
            $this->delete('{{%application_requests}}', [
                'name' => "Test User $i",
                'phone' => "+9989012345$i",
            ]);
        }
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250708_065135_insert_sample_application_requests_data cannot be reverted.\n";

        return false;
    }
    */
}
