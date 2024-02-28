<?php
use yii\bootstrap5\Html;









    echo Html::a('Русский',array_merge(Yii::$app->request->get(),
    [Yii::$app->controller->route, 'language'=>'ru-RU']));
    echo '|';
    echo Html::a('English',array_merge(Yii::$app->request->get(),
    [Yii::$app->controller->route, 'language'=>'en-US']));
    echo '|';
    echo Html::a('Қазақша',array_merge(Yii::$app->request->get(),
    [Yii::$app->controller->route, 'language'=>'kk-KZ']));


    

