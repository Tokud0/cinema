<?php

namespace app\models\Film;

use app\models\FilmsGenres;
use app\models\FilmsGenresQuery;
use Yii;

/**
 * This is the model class for table "films".
 *
 * @property int $id
 * @property string $name_en
 * @property string $age_limit
 * @property string $film_duration
 * @property string $name_ru
 * @property string $name_kk
 *
 * @property FilmsGenres[] $filmsGenres
 */
class Films extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'films';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_en', 'age_limit', 'film_duration', 'name_ru', 'name_kk', ], 'required'],
            [['name_en', 'age_limit', 'film_duration', 'name_ru', 'name_kk'], 'string', 'max' => 250],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'name_en' => Yii::t('common', 'Name En'),
            'age_limit' => Yii::t('common', 'Age Limit'),
            'film_duration' => Yii::t('common', 'Film Duration'),
            'name_ru' => Yii::t('common', 'Name Ru'),
            'name_kk' => Yii::t('common', 'Name Kk'),

        ];
    }

    /**
     * Gets query for [[FilmsGenres]].
     *
     * @return \yii\db\ActiveQuery|FilmsGenresQuery
     */
    public function getFilmsGenres()
    {
        return $this->hasMany(FilmsGenres::class, ['film_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return FilmsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FilmsQuery(get_called_class());
    }
}
