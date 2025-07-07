<?php

use yii\db\Migration;

class m250707_105105_remove_end_date_from_events extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = Yii::$app->db->schema->getTableSchema('{{%events}}');
        if (isset($table->columns['end_date'])) {
            $this->dropColumn('{{%events}}', 'end_date');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%events}}', 'end_date', $this->date()->null());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250707_105105_remove_end_date_from_events cannot be reverted.\n";

        return false;
    }
    */
}
