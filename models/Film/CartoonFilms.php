<?php

namespace app\models\Film;

class CartoonFilms extends Films
{
    const TYPE ='cartoon';

    public function init()
    {
        $this->type = self::TYPE;
        parent::init();
    }
    public static function find(): FilmsQuery
    {
        return new FilmsQuery(get_called_class(),['type'=> self::TYPE,'tableName'=> self::tableName()]);
    }
    public function beforeSave($insert): bool
    {
        $this->type = self::TYPE;
        return parent::beforeSave($insert);
    }

}