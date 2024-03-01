<?php

use yii\db\Migration;

/**
 * Class m240229_100553_updt
 */
class m240229_100553_updt extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('films','type',$this->string(255)->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240229_100553_updt cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240229_100553_updt cannot be reverted.\n";

        return false;
    }
    */
}
