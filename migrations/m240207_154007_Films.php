<?php

use yii\db\Migration;

/**
 * Class m240207_154007_Films
 */
class m240207_154007_Films extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('films',[
            'id' => $this->primaryKey(),
            'film_name'=> $this->string(250)->notNull(),
            'film_genre'=> $this->string(250)->notNull(),
            'age_limit'=> $this->string(250)->notNull(),
            'film_duration'=> $this->string(250)->notNull(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240207_154007_Films cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240207_154007_Films cannot be reverted.\n";

        return false;
    }
    */
}
