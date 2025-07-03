<?php

use yii\db\Migration;

class m250703_082124_make_leadership_fields_not_null extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        \Yii::$app->db->createCommand("
        UPDATE {{%leadership}} SET email = '' WHERE email IS NULL;
        UPDATE {{%leadership}} SET phone = '' WHERE phone IS NULL;
        UPDATE {{%leadership}} SET photo = 'default.jpg' WHERE photo IS NULL;
    ")->execute();
        $this->alterColumn('{{%leadership}}', 'email', $this->string()->notNull());
        $this->alterColumn('{{%leadership}}', 'phone', $this->string()->notNull());
        $this->alterColumn('{{%leadership}}', 'photo', $this->string()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('{{%leadership}}', 'email', $this->string()->null());
        $this->alterColumn('{{%leadership}}', 'phone', $this->string()->null());
        $this->alterColumn('{{%leadership}}', 'photo', $this->string()->null());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250703_082124_make_leadership_fields_not_null cannot be reverted.\n";

        return false;
    }
    */
}
