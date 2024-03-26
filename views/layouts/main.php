<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use kartik\select2\Select2Asset;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-4">
        <div class="container">
            <a class="navbar-brand" href="#"><?= Yii::t('app', 'Olimpycos Cinema') ?></a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><?= Yii::t('app', 'Schedule') ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><?= Yii::t('app', 'About Us') ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-light" href="site/login"><?= Yii::t('app', 'Login') ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>



<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="bg-dark text-light text-center py-3">
    <div class="container">
        <p><?= Yii::t('app', 'Olimpycos Cinema') ?> | <?= Yii::t('app', 'Адрес: Город, улица, дом') ?>                         <?= $this->render('language',['class' => 'lang_button'])   ?></p> </div>
    </div>
</footer>




<?php


$this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
