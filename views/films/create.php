<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var \app\models\Film\Films $model */
/** @var string $suffix */

$this->title = Yii::t('common', 'Create Films');
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Films'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="films-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'suffix'=>$suffix,
    ]) ?>

</div>
