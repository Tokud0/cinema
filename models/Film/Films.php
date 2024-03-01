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
 * @property string $type
 * @property string description_en
 * @property string description_ru
 * @property string description_kk
 * @property string country_en
 * @property string country_ru
 * @property string country_kk
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
            [['name_en', 'age_limit', 'film_duration', 'name_ru', 'name_kk','type' ], 'required'],
            [['name_en', 'age_limit', 'film_duration', 'name_ru', 'name_kk','type'], 'string', 'max' => 250],
            [['description_en','description_ru','description_kk','country_en','country_ru','country_kk'],'string','max'=>255],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'type'=> Yii::t('common','Type'),
            'name_en' => Yii::t('common', 'Name En'),
            'age_limit' => Yii::t('common', 'Age Limit'),
            'film_duration' => Yii::t('common', 'Film Duration'),
            'name_ru' => Yii::t('common', 'Name Ru'),
            'name_kk' => Yii::t('common', 'Name Kk'),
            'description_en'=> Yii::t('common','Description'),
            'description_ru'=> Yii::t('common','Описание'),
            'description_kk'=> Yii::t('common','Сипаттама'),
            'country_en'=> Yii::t('common','Country'),
            'country_ru'=> Yii::t('common','Страна'),
            'country_kk'=> Yii::t('common','Ел'),




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


    public static function instantiate($row): CartoonFilms|Films|MovieFilms
    {
        switch ($row['type']){
            case MovieFilms::TYPE:
                return new MovieFilms();
            case CartoonFilms::TYPE:
                return new CartoonFilms();
            default:
                return new self;
        }
    }
}
