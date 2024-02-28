<?php

use yii\db\Migration;

/**
 * Class m240207_151309_add_admin
 */
class m240207_151309_add_admin extends Migration
{
    /**
     * {@inheritdoc}
     * @throws \yii\base\Exception
     */
    public function safeUp()
    {
        $this->insert('users', [
            'username'=>'admin',
            'password'=> Yii::$app->security->generatePasswordHash('qwerty'),
            'email'=>'admin@gmail.com',
            'first_name'=>'Admin',
            'second_name'=>'Adminov',
            'auth_key'=> Yii::$app->security->generateRandomString(),
            ]);


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240207_151309_add_admin cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240207_151309_add_admin cannot be reverted.\n";

        return false;
    }
    */
}
