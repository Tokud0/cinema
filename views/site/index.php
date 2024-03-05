<?php

use yii\helpers\Html;

?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= Yii::t('app', 'Olimpycos Cinema') ?></title>
</head>
<body>

<!-- Carousel -->
<div id="carouselCinema" class="carousel slide my-5" data-bs-ride="carousel" data-bs-interval="5000">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <?php echo Html::img('@web/images/cinema1.jpg', ['alt' => 'Example Image']); ?>
        </div>
        <div class="carousel-item">
            <?php echo Html::img('@web/images/cinema2.jpg', ['alt' => 'Example Image']); ?>
        </div>
        <div class="carousel-item">
            <?php echo Html::img('@web/images/cinema3.jpg', ['alt' => 'Example Image']); ?>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselCinema" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden"><?= Yii::t('app', 'Previous') ?></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselCinema" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden"><?= Yii::t('app', 'Next') ?></span>
    </button>
</div>

<!-- Schedule Section -->
<section class="container my-5">
    <h2 class="text-center mb-4"><?= Yii::t('app', 'Todays Schedule') ?></h2>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <!-- Films -->
        <!-- Film 1 -->
        <div class="col">
            <div class="card h-100">
                <?php echo Html::img('@web/images/film1.jpg', ['alt' => 'Example Image']); ?>
                <div class="card-body">
                    <h5 class="card-title text-center"><?= Yii::t('app', 'Aquaman') ?></h5>
                    <p class="card-text text-center"><?= Yii::t('app', 'Genre: Fantasy') ?></p>
                    <p class="card-text text-center"><?= Yii::t('app', 'Time: 18:00') ?></p>
                    <p class="card-text text-center"><?= Yii::t('app', 'Hall: 1') ?></p>
                    <p class="card-text text-center"><?= Yii::t('app', 'Available Seats: 50') ?></p>
                    <p class="card-text text-center"><?= Yii::t('app', 'Ticket Price: $10') ?></p>
                    <a href="#" class="btn btn-success d-block mx-auto"><?= Yii::t('app', 'Buy Ticket') ?></a>
                </div>
            </div>
        </div>
        <!-- More films similar to this -->
    </div>
    <!-- Additional Information -->
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
