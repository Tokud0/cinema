<?php

use yii\db\Migration;

/**
 * Class m240213_101059_films_genres
 */
class m240213_101059_films_genres extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('films_genres',[
            'id'=>$this->primaryKey(),
             'film_id'=>$this->integer(250)->notNull(),
             'genre_id'=>$this->integer(250)->notNull(),
            ]
        );






    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240213_101059_films_genres cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240213_101059_films_genres cannot be reverted.\n";

        return false;
    }
    */
}
