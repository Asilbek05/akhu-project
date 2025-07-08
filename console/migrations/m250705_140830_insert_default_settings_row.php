<?php

use yii\db\Migration;

class m250705_140830_insert_default_settings_row extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('{{%settings}}', [
            'contacts' => json_encode([
                'phone' => '+998712024111',
                'email' => 'info@newuu.uz',
                'admission_email' => 'admission@newuu.uz',
                'work_time' => 'Mon - Fri: 09:00 - 18:00',
            ], JSON_UNESCAPED_UNICODE),
            'location' => 'Mirzo Ulug‘bek, Movarounnahr 1, Tashkent, Uzbekistan',
            'socials' => json_encode([
                'telegram'  => 'https://t.me/newuzbekistanuniversity',
                'instagram' => 'https://instagram.com/newuzbekistanuniversity',
                'facebook'  => 'https://facebook.com/newuzbekistanuniversity',
                'youtube'   => 'https://www.youtube.com/@newuzbekistanuniversity',
                'linkedin'  => 'https://www.linkedin.com/company/new-uzbekistan-university',
            ], JSON_UNESCAPED_UNICODE),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->delete('{{%settings}}', ['contacts' => json_encode([
            'phone' => '+998712024111',
            'email' => 'info@newuu.uz',
            'admission_email' => 'admission@newuu.uz',
            'work_time' => 'Mon - Fri: 09:00 - 18:00',
        ], JSON_UNESCAPED_UNICODE)]);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250705_140830_insert_default_settings_row cannot be reverted.\n";

        return false;
    }
    */
}
