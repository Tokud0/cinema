<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "films_genre".
 *
 * @property int $id
 * @property string $genre
 *
 * @property FilmsGenres[] $filmsGenres
 */
class FilmsGenre extends \yii\db\ActiveRecord
{
    /**
     * @var int|mixed|null
     */
    public mixed $film_id;
    /**
     * @var mixed|null
     */
    public mixed $genre_id;

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
            [['genre'], 'required'],
            [['genre'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'genre' => Yii::t('common', 'Genre'),
        ];
    }

    /**
     * Gets query for [[FilmsGenres]].
     *
     * @return \yii\db\ActiveQuery|FilmsGenresQuery
     */
    public function getFilmsGenres()
    {
        return $this->hasMany(FilmsGenres::class, ['genre_id' => 'id']);
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
