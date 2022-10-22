<?php

namespace backend\modules\admin\controllers;

use backend\modules\admin\models\PasswordForm;
use common\models\User;
use Yii;
use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {

        return $this->render('index');
    }


    public function actionProfile()
    {
        $user = User::findOne(Yii::$app->user->identity->id);
        $pasword = new PasswordForm();
        if($user->load(Yii::$app->request->post())){
            if($user->save()){
                Yii::$app->session->setFlash('success','Muvafaqqiyatli o\'zgartirildi');
                return $this->redirect(['default/profile']);
            }else{
                Yii::$app->session->setFlash('warning',"Saqlashda xatolik");
                return $this->redirect(['default/profile']);
            }
        }
        if($pasword->load(Yii::$app->request->post())){
            If(Yii::$app->getSecurity()->validatePassword($pasword->password,$user->password_hash)){
                $user->password_hash = Yii::$app->getSecurity()->generatePasswordHash($pasword->password2);
                if($user->save()){
                    Yii::$app->session->setFlash('success','Parol muvafaqqiyatli o\'zgartirildi');
                    return $this->redirect(['default/profile']);
                }else{
                    Yii::$app->session->setFlash('warning',"Saqlashda xatolik");
                    return $this->redirect(['default/profile']);
                }
            }else{
                Yii::$app->session->setFlash('error',"Parol xato");
                return $this->redirect(['default/profile']);

            }
        }
        return $this->render('profile',['user'=>$user,'pasword'=>$pasword]);

    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


}
