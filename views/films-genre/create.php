<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\FilmsGenre $model */

$this->title = Yii::t('common', 'Create Films Genre');
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Films Genres'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="films-genre-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
