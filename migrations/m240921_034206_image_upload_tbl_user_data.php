<?php

use yii\db\Migration;

/**
 * Class m240921_034206_image_upload_tbl_user_data
 */
class m240921_034206_image_upload_tbl_user_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{user_data}}', 'image_upload', $this->string()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{user_data}}', 'image_upload');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240921_034206_image_upload_tbl_user_data cannot be reverted.\n";

        return false;
    }
    */
}
