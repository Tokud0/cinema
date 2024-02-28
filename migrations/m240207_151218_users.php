<?php

use yii\db\Migration;

/**
 * Class m240207_151218_users
 */
class m240207_151218_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users',[
            'id' => $this->primaryKey(),
            'username' => $this->string(250)->notNull(),
            'password' => $this->string(250)->notNull(),
            'email'=> $this->string(250)->notNull(),
            'first_name'=> $this->string(250)->notNull(),
            'second_name'=> $this->string(250)->notNull(),
            'auth_key'=>$this->string(250)->notNull(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240207_151218_users cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240207_151218_users cannot be reverted.\n";

        return false;
    }
    */
}
