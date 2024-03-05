<?php

use yii\db\Migration;

/**
 * Class m240305_113259_translate_multi
 */
class m240305_113259_translate_multi extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn('films_genre','genre','genre_en');
        $this->addColumn('films_genre','genre_ru',$this->string(255)->notNull());
        $this->addColumn('films_genre','genre_kk',$this->string(255)->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240305_113259_translate_multi cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240305_113259_translate_multi cannot be reverted.\n";

        return false;
    }
    */
}
