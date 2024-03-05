<?php

use kartik\select2\Select2;
use kartik\widgets\RangeInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\VarDumper;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var \app\models\Film\FilmsForm $model */
/** @var yii\widgets\ActiveForm $form */
/** @var string $suffix  */
?>

<div class="films-form">



    <?php $form = ActiveForm::begin(); ?>
    <?php $genre = ArrayHelper::map(\app\models\FilmsGenre::find()->all(), 'id', 'genre_'.$suffix) ?>
    <?php $country_en = ArrayHelper::map(\app\models\Country::find()->all(),'id','name_en') ?>
    <?php $country_ru = ArrayHelper::map(\app\models\Country::find()->all(),'name_en','name_ru') ?>
    <?php $country_kk = ArrayHelper::map(\app\models\Country::find()->all(),'name_ru','name_kk') ?>



    <?= $form->field($model,'type')->dropDownList(
        [
            'movie'=>'movie',
            'cartoon'=>'cartoon'
        ]
    ) ?>
    <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'name_kk')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model,'description_en')->textInput(['maxlength'=>true]) ?>
    <?= $form->field($model,'description_ru')->textInput(['maxlength'=>true]) ?>
    <?= $form->field($model,'description_kk')->textInput(['maxlength'=>true]) ?>
    <?php echo $form->field($model, 'country_en')->widget(Select2::classname(), [
        'data' => $country_en,
        'options' => ['placeholder' => 'Choose country'],
        'pluginOptions' => [
            'allowClear' => true
        ],

    ]);?>
    <?php echo $form->field($model, 'country_ru')->widget(Select2::classname(), [
        'data' => $country_ru,
        'options' => ['placeholder' => 'Choose country'],
        'pluginOptions' => [
            'allowClear' => true
        ],

    ]);?>
    <?php echo $form->field($model, 'country_kk')->widget(Select2::classname(), [
        'data' => $country_kk,
        'options' => ['placeholder' => 'Choose country'],
        'pluginOptions' => [
            'allowClear' => true
        ],

    ]);?>


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
