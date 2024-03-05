<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "films_genre".
 *
 * @property int $id
 * @property string $genre_en
 * @property string $genre_ru
 * @property string $genre_kk
 *
 * @property FilmsGenres[] $filmsGenres
 */
class FilmsGenre extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'films_genre';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['genre_en', 'genre_ru', 'genre_kk'], 'required'],
            [['genre_en'], 'string', 'max' => 250],
            [['genre_ru', 'genre_kk'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'genre_en' => Yii::t('common', 'Genre En'),
            'genre_ru' => Yii::t('common', 'Genre Ru'),
            'genre_kk' => Yii::t('common', 'Genre Kk'),
        ];
    }

    /**
     * Gets query for [[FilmsGenres]].
     *
     * @return \yii\db\ActiveQuery|FilmsGenresQuery
     */
    public function getFilmsGenres()
    {
        return $this->hasMany(FilmsGenres::className(), ['genre_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return FilmsGenreQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FilmsGenreQuery(get_called_class());
    }
}
