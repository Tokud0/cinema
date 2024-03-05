<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var \app\models\Film\Films $model */
/** @var  string $suffix */

$this->title = Yii::t('common', 'Update Films: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Films'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('common', 'Update');
?>
<div class="films-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'suffix'=>$suffix,
    ]) ?>

</div>
