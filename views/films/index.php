<?php

use app\models\Film\Films;
use yii\grid\ActionColumn;
use yii\grid\GridView;
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
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                    'attribute'=>'name_'.$suffix,
                    'format'=>'raw',

            ],
            ['attribute'=> 'filmsGenres',
                'format'=>'raw',
                'contentOptions'=>['class'=>'text-center align-mode'],
                'headerOptions'=>['class'=>'text-center align-mode'],
                'value'=> static function(Films $model) {
                    $cur_gen =[];
                    foreach ($model->filmsGenres as $genre) {
                        $cur_gen[] = $genre->genre->genre;
                    }
                    return implode(', ', $cur_gen);
                }],
            'age_limit',
            'film_duration',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Films $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
