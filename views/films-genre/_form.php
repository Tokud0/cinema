<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\FilmsGenre $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="films-genre-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'genre_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'genre_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'genre_kk')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('common', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
