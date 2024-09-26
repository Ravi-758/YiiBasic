<?php

use yii\db\Migration;

/**
 * Class m240923_172825_image_file
 */
class m240923_172825_image_file extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{user_data}}', 'imageFile', $this->string()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240923_172825_image_file cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240923_172825_image_file cannot be reverted.\n";

        return false;
    }
    */
}
