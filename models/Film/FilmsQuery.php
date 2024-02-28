<?php

namespace app\models\Film;

/**
 * This is the ActiveQuery class for [[Films]].
 *
 * @see Films
 */
class FilmsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Films[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Films|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
