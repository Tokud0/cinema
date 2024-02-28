<?php

use yii\db\Migration;

/**
 * Class m240222_101055_update2
 */
class m240222_101055_update2 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('films','film_genre');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240222_101055_update2 cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240222_101055_update2 cannot be reverted.\n";

        return false;
    }
    */
}
