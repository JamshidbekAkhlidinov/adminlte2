<?php

namespace backend\controllers;
use Yii;

class UserController extends MyController
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }



}