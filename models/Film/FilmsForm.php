<?php

namespace app\models\Film;

use app\models\FilmsGenres;
use yii\base\InvalidConfigException;
use yii\base\Model;
use yii\helpers\ArrayHelper;

class FilmsForm extends Model
{
    public ?int $id = null;
    public ?string $name_en = null;
    public ?string $name_ru= null;
    public ?string $name_kk = null;

    public array $film_genre = [];
    public ?string $age_limit = null;

    public ?string $film_duration = null;





    public function rules(): array
    {
        return[
          [['name_en','name_ru','name_kk','film_genre','age_limit','film_duration'],'required'],
          ['film_genre', 'each', 'rule' => 'number'],
          [['name_en','name_ru','name_kk','age_limit','film_duration',],'string'],
          ['id', 'integer', 'min' => 1],
        ];
    }

    public function loadData(Films|null $film ):void
    {
        if (!$film){
            return;
        }
        $this->id = $film->id;
        $this->name_en = $film->name_en;
        $this->name_kk = $film->name_kk;
        $this->name_ru = $film->name_ru;
        $this->film_genre = ArrayHelper::getColumn ($film->filmsGenres,'genre_id');
        $this->age_limit = $film->age_limit;
        $this->film_duration =$film->film_duration;
    }


    /**
     * @throws InvalidConfigException
     */
    public function save(): bool
    {

        $film = $this->id ? Films::findOne($this->id) : \Yii::createObject(Films::class);
        $film->name_en = $this->name_en;
        $film->name_ru = $this->name_ru;
        $film->name_kk = $this->name_kk;

        $film->film_duration = $this->film_duration;
        $film->age_limit = $this->age_limit;
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