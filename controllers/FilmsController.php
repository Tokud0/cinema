<?php

namespace app\controllers;

use app\models\Film\Films;
use app\models\Film\FilmsForm;
use app\models\FilmsGenres;
use Faker\Provider\Image;
use Yii;
use yii\base\InvalidConfigException;
use yii\base\Response;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\helpers\VarDumper;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * FilmsController implements the CRUD actions for Films model.
 */
class FilmsController extends BaseController
{


    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Films models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Films::find(),

            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'suffix'=>$this->suffix,
        ]);
    }

    /**
     * Displays a single Films model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
            'suffix'=>$this->suffix,

        ]);
    }

    /**
     * Creates a new Films model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     * @throws InvalidConfigException
     */
    public function actionCreate(): Response|string
    {
        $model = new FilmsForm();

        if ($model->load(Yii::$app->request->post())){;
        $model->image = UploadedFile::getInstance($model,'image');
        $image_name = $model->name_en.rand(1,4000).'.'.$model->image->extension;
        $image_path = 'poster/'.$image_name;
        $model->image->saveAs($image_path);
        $model->image = $image_path;
        $model->poster = $image_path;
        $model->save();
//        VarDumper::dump($image_name,10,true);
//            VarDumper::dump($image_path,10,true);
//            VarDumper::dump($model,10,true);
//        die;
            return $this->redirect(['view','id'=>$model->id]);




        }else {
            $model->loadData(null);
        }

        return $this->render('create', [
            'model' => $model,
            'suffix' => $this->suffix,
        ]);
    }

    /**
     * Updates an existing Films model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $film = $this->findModel($id);
        $model = Yii::createObject(FilmsForm::class);
        $model->loadData($film);
        //$currentGenres = ArrayHelper::getColumn($film->filmsGenres, 'genre_id');
//        $model_genres = FilmsGenres::find()->indexBy('id')->andWhere(['film_id' => $film->id])->all();

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            $newGenres = $this->request->post()["FilmsForm"]['film_genre'];
//            $diff = array_diff($newGenres, ArrayHelper::getColumn($model_genres, 'genre_id'));
//
//            if ($diff) {
//                foreach ($model_genres as $genre) {
//                    if (in_array($genre->genre_id, $diff)){
//                        $model_genres->delete();
//                    }
//                }
//            }

//            $genresToRemove = array_diff($currentGenres, $newGenres);
//            $genresToAdd = array_diff($newGenres, $currentGenres);
//
//            foreach ($genresToRemove as $genre) {
//                FilmsGenres::deleteAll(['film_id' => $model->id, 'genre_id' => $genre]);
//            }
//
//            foreach ($genresToAdd as $genre) {
//                $new_genre = new FilmsGenres();
//                $new_genre->film_id = $model->id;
//                $new_genre->genre_id = $genre;
//                $new_genre->save();
//            }

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'suffix'=>$this->suffix,
        ]);
    }

    /**
     * @throws NotFoundHttpException
     * @throws InvalidConfigException
     */
//    public function actionUpload()
//    {
//        $model = new FilmsForm();
//
//        if (Yii::$app->request->isPost) {
//            $model->load(Yii::$app->request->post());
//            $model->poster = UploadedFile::getInstance($model, 'poster');
//
//            if ($model->save()) {
//                return $this->redirect(['view', 'id' => $model->id]);
//            }
//        }
//
//        return $this->render('upload', [
//            'model' => $model,
//        ]);
//    }

    public function
    actionUpload(): bool|string
    {
        $model = new FilmsForm();

        if (Yii::$app->request->isPost) {
            $model->image = UploadedFile::getInstance($model, 'image');
            if ($model->upload()) {
                return true;
            }
        }

        return $this->render('upload', ['model' => $model]);
    }



    /**
     * Deletes an existing Films model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $genres = FilmsGenres::find()->andWhere(['film_id'=>$id])->all();
        foreach ($genres as $genre){
            $genre->delete();
        }
        $this->findModel($id)->delete();


        return $this->redirect(['index']);
    }

    /**
     * Finds the Films model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Films the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Films::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('common', 'The requested page does not exist.'));
    }
}
