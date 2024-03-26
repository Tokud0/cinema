<?php

use yii\bootstrap5\Carousel;
use yii\grid\GridView;
use yii\helpers\Html;
use app\models\Film;
use app\controllers\SiteController;
use yii\widgets\DetailView;

/** @var string $dataProvider */
/** @var string $suffix */
/* @var $this yii\web\View */
/* @var $model app\models\Film\Films */


?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= Yii::t('app', 'Olimpycos Cinema') ?></title>
</head>
<!--<div>-->

<!---->
<!--    <div class="carousel-container"-->
<!--        --><?php
//        $items = [
//                [
//                        'content'=> '<img src="' . Yii::getAlias('@web') . '/images/cinema8.jpg">',
//                        'options'=>[],
//                ],
//                [
//                        'content'=>'<img src="' . Yii::getAlias('@web') . '/images/cinema4.jpg">',
//                        'options'=>[],
//                ]
//        ];
//        $carouselOptions =[
//                'id'=>'carousel1',
//                'items'=>$items,
//                'controls' => ['<span class="glyphicon glyphicon-chevron-left"></span>', '<span class="glyphicon glyphicon-chevron-right"></span>'],
//                'options' => ['class' => 'slide'],
//
//        ];
//        echo Carousel::widget($carouselOptions);
//        ?>
<!---->
<!--    </div>-->
<!-- Schedule Section -->
<section class="container my-5">
    <h2 class="text-center mb-4"><?= Yii::t('app', 'Todays Schedule') ?></h2>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <div class="film1">
        <?php
        $model = Film\Films::findOne(19);
        echo DetailView::widget([
            'model' => $model,
            'attributes' => [
                    [
                        'label' => '',

                        'value' => function ($model) {
                            return $model->getImage();
                        },
                    ],
                    [
                        'label' => '',
                        'value' => $model->{'name_'.$suffix},
                    ],
                    [
                        'label' => '',
                        'value' => $model->age_limit,
                    ],
                    [
                        'label' => '',
                        'value' => $model->{'description_'.$suffix},
                    ],
                    [
                        'label' => '',
                        'value' => function (app\models\Film\MovieFilms $model) use ($suffix) {
                            $cur_gen1 = [];
                            foreach ($model->filmsGenres as $genre) {
                                $cur_gen1['en'][] = $genre->genre->genre_en;
                                $cur_gen1['ru'][] = $genre->genre->genre_ru;
                                $cur_gen1['kk'][] = $genre->genre->genre_kk;
                            }
                            return implode(', ', $cur_gen1[$suffix] ?? []);
                        },],

            ],
            'options'=>['class'=>'gried_film'],

        ]);

        ?>
        </div>
        <div class="film2">
            <?php
            $model = Film\Films::findOne(17);
            echo DetailView::widget([
                'model' => $model,
                'attributes' => [
                    [
                        'label' => '',
                        'value' => $model->{'name_'.$suffix},
                    ],
                    [
                        'label' => '',
                        'value' => $model->age_limit,
                    ],
                    [
                        'label' => '',
                        'value' => $model->{'description_'.$suffix},
                    ],
                    [
                        'label' => '',
                        'value' => function (app\models\Film\MovieFilms $model) use ($suffix) {
                            $cur_gen1 = [];
                            foreach ($model->filmsGenres as $genre) {
                                $cur_gen1['en'][] = $genre->genre->genre_en;
                                $cur_gen1['ru'][] = $genre->genre->genre_ru;
                                $cur_gen1['kk'][] = $genre->genre->genre_kk;
                            }
                            return implode(', ', $cur_gen1[$suffix] ?? []);
                        },],

                ],
                'options'=>['class'=>'gried_film'],

            ]);

            ?>
        </div>




    </div>
    <div class="text-center mt-5">
        <h4 class="mb-3"><?= Yii::t('app', 'Useful Information:') ?></h4>
        <div class="interesting-facts">
            <p class="mb-2"><?= Yii::t('app', '🎉 Today, the cinema features movies of various genres – find your perfect pick!') ?></p>
            <p class="mb-2"><?= Yii::t('app', '🍿 There are seats for everyone in the cinema halls: choose a comfortable one and enjoy the show.') ?></p>
            <p class="mb-2"><?= Yii::t('app', '💰 Get a 10% discount when buying tickets online!') ?></p>
        </div>
        <h4 class="mt-4"><?= Yii::t('app', 'Total Number of Films:') ?> <span class="badge bg-secondary">4</span></h4>
        <h4><?= Yii::t('app', 'Total Number of Tickets for Sale:') ?> <span class="badge bg-secondary">160</span></h4>
    </div>
</section>

</body>
</html>
