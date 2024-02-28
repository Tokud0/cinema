<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class BaseController extends Controller
{
    public string $suffix = '';
    public function init(): void
    {
        $this->suffix = array_flip(Yii::$app->urlManager->languages)[Yii::$app->language];
        parent::init();
    }
}