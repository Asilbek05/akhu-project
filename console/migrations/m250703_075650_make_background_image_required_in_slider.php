<?php

use yii\db\Migration;

class m250703_075650_make_background_image_required_in_slider extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        \Yii::$app->db->createCommand("
        UPDATE {{%slider}} SET background_image = 'default.jpg' WHERE background_image IS NULL;
        UPDATE {{%slider}} SET description = '' WHERE description IS NULL;
        UPDATE {{%slider}} SET button_text = '' WHERE button_text IS NULL;
        UPDATE {{%slider}} SET button_url = '' WHERE button_url IS NULL;
    ")->execute();

        $this->alterColumn('{{%slider}}', 'background_image', $this->string()->notNull());
        $this->alterColumn('{{%slider}}', 'description', $this->text()->notNull());
        $this->alterColumn('{{%slider}}', 'button_text', $this->string()->notNull());
        $this->alterColumn('{{%slider}}', 'button_url', $this->string()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('{{%slider}}', 'background_image', $this->string()->null());
        $this->alterColumn('{{%slider}}', 'description', $this->text()->null());
        $this->alterColumn('{{%slider}}', 'button_text', $this->string()->null());
        $this->alterColumn('{{%slider}}', 'button_url', $this->string()->null());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250703_075650_make_background_image_required_in_slider cannot be reverted.\n";

        return false;
    }
    */
}
