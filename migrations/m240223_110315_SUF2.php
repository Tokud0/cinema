<?php

use yii\db\Migration;

/**
 * Class m240223_110315_SUF2
 */
class m240223_110315_SUF2 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('films','name_ru', $this->string(250)->notNull());
        $this->addColumn('films','name_kk', $this->string(250)->notNull());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240223_110315_SUF2 cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240223_110315_SUF2 cannot be reverted.\n";

        return false;
    }
    */
}
