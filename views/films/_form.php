<?php

use kartik\select2\Select2;
use kartik\widgets\RangeInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var \app\models\Film\FilmsForm $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="films-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php $genre = ArrayHelper::map(\app\models\FilmsGenre::find()->all(), 'id', 'genre') ?>


    <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'name_kk')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model,'type')->dropDownList(
        [
            'movie'=>'movie',
            'cartoon'=>'cartoon'
        ]
    ) ?>

    <?php echo $form->field($model, 'film_genre')->widget(Select2::classname(), [
        'data' => $genre,
        'options' => ['multiple' => true,'placeholder' => 'Выберите жанр ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],

    ]);?>

    <?= $form->field($model, 'age_limit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model,'film_duration')->widget(RangeInput::class,[
        'options'=>[
            'placeholder'=> Yii::t('common','Select duration'),
        ],
        'html5Options'=>[
            'min'=>0,
            'max'=>300,
            'step'=>10,
        ],
        'addon'=>['append'=>['content'=> Yii::t('common','min')]],
    ])
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('common', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
