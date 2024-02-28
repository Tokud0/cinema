<?php

namespace app\models;

use app\models\Film\Films;
use app\models\Film\FilmsQuery;
use Yii;

/**
 * This is the model class for table "films_genres".
 *
 * @property int $id
 * @property int $film_id
 * @property int $genre_id
 *
 * @property Films $film
 * @property FilmsGenre $genre
 */
class FilmsGenres extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'films_genres';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['film_id', 'genre_id'], 'required'],
            [['film_id', 'genre_id'], 'integer'],
            [['film_id'], 'exist', 'skipOnError' => true, 'targetClass' => Films::className(), 'targetAttribute' => ['film_id' => 'id']],
            [['genre_id'], 'exist', 'skipOnError' => true, 'targetClass' => FilmsGenre::className(), 'targetAttribute' => ['genre_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'film_id' => Yii::t('common', 'Film ID'),
            'genre_id' => Yii::t('common', 'Genre ID'),
        ];
    }

    /**
     * Gets query for [[Film]].
     *
     * @return \yii\db\ActiveQuery|FilmsQuery
     */
    public function getFilm()
    {
        return $this->hasOne(Films::className(), ['id' => 'film_id']);
    }

    /**
     * Gets query for [[Genre]].
     *
     * @return \yii\db\ActiveQuery|FilmsGenreQuery
     */
    public function getGenre()
    {
        return $this->hasOne(FilmsGenre::class, ['id' => 'genre_id']);
    }

    /**
     * {@inheritdoc}
     * @return FilmsGenresQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FilmsGenresQuery(get_called_class());
    }
}
