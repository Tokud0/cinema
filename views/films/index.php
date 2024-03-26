<?php

use app\models\Film\Films;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var string $suffix  */

$this->title = Yii::t('common', 'Films');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="films-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('common', 'Create Films'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => SerialColumn::class],

            'id',

            'type',
            [
                    'attribute'=>'name_'.$suffix,
                    'format'=>'raw',

            ],
            [
                    'attribute'=>'description_'.$suffix,
                    'format'=>'raw',
            ],
            [
                'attribute'=>'country_'.$suffix,

            ],
            ['attribute'=> 'filmsGenres',
                'format'=>'raw',
                'contentOptions'=>['class'=>'text-center align-mode'],
                'headerOptions'=>['class'=>'text-center align-mode'],
                'value'=> static function(Films $model)use ($suffix) {
                    $cur_gen =[];
                    foreach ($model->filmsGenres as $genre)  {
                        $cur_gen['en'][] = $genre->genre->genre_en;
                        $cur_gen['ru'][] = $genre->genre->genre_ru;
                        $cur_gen['kk'][] = $genre->genre->genre_kk;
                    }
                    return implode(', ', $cur_gen[$suffix]??[]);
                }],
            'age_limit',
            'film_duration',
            [
                'label' => 'poster',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->getImage();
                },
            ],
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Films $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
