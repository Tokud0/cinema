<?php

namespace app\models\Film;

use app\models\FilmsGenres;
use yii\base\InvalidConfigException;
use yii\base\Model;
use yii\helpers\ArrayHelper;

class FilmsForm extends Model
{
    public ?int $id = null;
    public ?string $type = null;
    public ?string $name_en = null;
    public ?string $name_ru= null;
    public ?string $name_kk = null;

    public array $film_genre = [];
    public ?string $age_limit = null;

    public ?string $film_duration = null;
    public ?string $description_en = null;
    public ?string $description_ru = null;
    public ?string $description_kk = null;
    public ?string $country_en = null;
    public ?string $country_ru = null;
    public ?string $country_kk = null;





    public function rules(): array
    {
        return[
          [['name_en','name_ru','name_kk','film_genre','age_limit','film_duration','type','description_en','description_ru','description_kk','country_en','country_ru','country_kk'],'required'],
          ['film_genre', 'each', 'rule' => 'number'],
          [['name_en','name_ru','name_kk','age_limit','film_duration','type','description_en','description_ru','description_kk','country_en','country_ru','country_kk'],'string'],
          ['id', 'integer', 'min' => 1],
        ];
    }

    public function loadData(Films|null $film ):void
    {
        if (!$film){
            return;
        }
        $this->id = $film->id;
        $this->type = $film ->type;
        $this->name_en = $film->name_en;
        $this->name_kk = $film->name_kk;
        $this->name_ru = $film->name_ru;
        $this->film_genre = ArrayHelper::getColumn ($film->filmsGenres,'genre_id');
        $this->age_limit = $film->age_limit;
        $this->film_duration =$film->film_duration;
        $this->description_en = $film->description_en;
        $this->description_ru = $film->description_ru;
        $this->description_kk = $film->description_kk;
        $this->country_en = $film->country_en;
        $this->country_ru = $film->country_ru;
        $this->country_kk = $film->country_kk;

    }


    /**
     * @throws InvalidConfigException
     */
    public function save(): bool
    {

        $film = $this->id ? Films::findOne($this->id) : \Yii::createObject(Films::class);
        $film->type = $this->type;
        $film->name_en = $this->name_en;
        $film->name_ru = $this->name_ru;
        $film->name_kk = $this->name_kk;

        $film->film_duration = $this->film_duration;
        $film->age_limit = $this->age_limit;
        $film->description_en = $this->description_en;
        $film->description_ru = $this->description_ru;
        $film->description_kk = $this->description_kk;
        $film->country_en = $this->country_en;
        $film->country_ru = $this->country_ru;
        $film->country_kk = $this->country_kk;
        $film->save();

        $this->id = $film->id;
        $genresToSave = array_map(function ($v) {
            return intval($v);
        }, $this->film_genre);
        $model_genres = FilmsGenres::find()->indexBy('id')->andWhere(['film_id' => $film->id])->all();

        if ($this->film_genre) {
            $diffs = array_diff($genresToSave,ArrayHelper::getColumn($model_genres,'genre_id'));
            $diff = array_diff(ArrayHelper::getColumn($model_genres, 'genre_id'), $genresToSave);
            if($diffs) {
                foreach ($diffs as $genre) {

                    $FilmsGenres = new FilmsGenres();
                    $FilmsGenres->film_id = $film->id;
                    $FilmsGenres->genre_id = $genre;
                    $FilmsGenres->save();


                    if ($FilmsGenres->validate()) {
                        $FilmsGenres->save(false);
                    }
                }
            }
            if ($diff) {
                foreach ($model_genres as $genre) {
                    if (in_array($genre->genre_id, $diff)){
                        $genre->delete();
                    }
                }
            }


        }


//        VarDumper::dump(ArrayHelper::getColumn($model_genres, 'genre_id'), 10, true);
//        VarDumper::dump($genresToSave, 10, true);
//        VarDumper::dump($diff, 10, true);
//        VarDumper::dump($model_genres, 10, true);
//        die;
//        if ($diff) {
//                foreach ($model_genres as $genre) {
//                    if (in_array($genre->genre_id, $diff)){
//                        $genre->delete();
//                    }
//                }
//            }

        return true;
    }




}
//