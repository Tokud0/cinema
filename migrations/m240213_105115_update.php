<?php

use yii\db\Migration;

/**
 * Class m240213_105115_update
 */
class m240213_105115_update extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex(
            'idx-filmes_genres-film_id',
            'films_genres',
            'film_id',

        );

        $this->createIndex(
            'idx-filmes_genres-genre_id',
            'films_genres',
            'genre_id'
        );
        $this->addForeignKey(
            'fk-films_genres-genre_id',
            'films_genres',
            'genre_id',
            'films_genre',
            'id',
        );
        $this->addForeignKey(
            'fk-films_genres-film_id',
            'films_genres',
            'film_id',
            'films',
            'id',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240213_105115_update cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240213_105115_update cannot be reverted.\n";

        return false;
    }
    */
}
