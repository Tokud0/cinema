<?php

use yii\db\Migration;

/**
 * Class m240211_150627_films_genre
 */
class m240211_150627_films_genre extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('films_genre',[
            'id'=> $this->primaryKey(),
            'genre'=>$this->string(250)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240211_150627_films_genre cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240211_150627_films_genre cannot be reverted.\n";

        return false;
    }
    */
}
