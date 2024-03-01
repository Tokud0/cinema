<?php

use yii\db\Migration;

/**
 * Class m240226_085017_Description
 */
class m240226_085017_Description extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('films','description_en', $this->string()->notNull());
        $this->addColumn('films','description_ru', $this->string()->notNull());
        $this->addColumn('films','description_kk', $this->string()->notNull());
        $this->addColumn('films','country_en',$this->string()->notNull());
        $this->addColumn('films','country_ru',$this->string()->notNull());
        $this->addColumn('films','country_kk',$this->string()->notNull());
        $this->createTable('country',[
            'id'=> $this->primaryKey(),
            'name_en'=>$this->string()->notNull(),
            'name_ru'=>$this->string()->notNull(),
            'name_kk'=>$this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240226_085017_Description cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240226_085017_Description cannot be reverted.\n";

        return false;
    }
    */
}
