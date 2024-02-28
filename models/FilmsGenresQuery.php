<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[FilmsGenres]].
 *
 * @see FilmsGenres
 */
class FilmsGenresQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return FilmsGenres[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return FilmsGenres|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
