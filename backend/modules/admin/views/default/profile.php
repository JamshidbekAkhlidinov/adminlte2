<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
$admin = Yii::$app->user->identity;
$this->title = "Assalom alaylim ".$admin->username;
$this->params['title'] = $this->title;
$this->params['breadcrumbs'][] = $this->title;

?>
<section class="content">
    <div class="row">
        <div class="col-md-3">

            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="<?=url::to('@web/dist/img/user2-160x160.jpg')?>"
                        alt="User profile picture">
                    <h3 class="profile-username text-center"><?=$admin->username?></h3>
                    <p class="text-muted text-center">Adminstrator</p>
                    <a href="<?=Url::to(['default/logout'])?>" class="btn btn-primary btn-block"><b>Chiqish</b></a>
                </div>

            </div>

        </div>

        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#activity" data-toggle="tab">About Me</a></li>
                    <li><a href="#timeline" data-toggle="tab">Edit name</a></li>
                    <li><a href="#settings" data-toggle="tab">Settings pasword</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">

                        <div class="">
                         <div class="box-body">
                                <strong><i class="fa fa-user margin-r-5"></i> username</strong>
                                <p class="text-muted">
                                    <?=$admin->username?>
                                </p>
                                <hr>
                                <strong><i class="fa fas fa-envelope margin-r-5"></i> Email</strong>
                                <p class="text-muted"><?=$admin->email?></p>
                                <hr>
                              
                            </div>

                        </div>


                    </div>

                    <div class="tab-pane" id="timeline">

                    <?php $form = ActiveForm::begin(['options'=>['class'=>'form-horizontal']]);  ?>

                    <?=$form->field($user,'username',['template'=>'<label for="inputSkills" class="col-sm-2 control-label">{label}</label><div class="col-sm-10">{input}</div><div class="col-sm-10 text-danger">{error}</div>'])->textInput()?>
                    <?=$form->field($user,'email',['template'=>'<label for="inputSkills" class="col-sm-2 control-label">{label}</label><div class="col-sm-10">{input}</div><div class="col-sm-10 text-danger">{error}</div>'])->textInput()?>
                    <?=Html::submitButton('Saqlash',['class'=>'btn btn-success'])?>
                   <?php    ActiveForm::end();  ?>

                    </div>

                    <div class="tab-pane" id="settings">
                       
                    <?php $form = ActiveForm::begin(['options'=>['class'=>'form-horizontal']]);  ?>
                    <?=$form->field($pasword,'password',['template'=>'<label for="inputSkills" class="col-sm-2 control-label">{label}</label><div class="col-sm-10">{input}</div>'])->passwordInput()?>
                    <?=$form->field($pasword,'password1',['template'=>'<label for="inputSkills" class="col-sm-2 control-label">{label}</label><div class="col-sm-10">{input}</div>'])->passwordInput()?>
                    <?=$form->field($pasword,'password2',['template'=>'<label for="inputSkills" class="col-sm-2 control-label">{label}</label><div class="col-sm-10">{input}</div>'])->passwordInput()?>
                    <?=Html::submitButton('Saqlash',['class'=>'btn btn-success col-sm-offset-2'])?>
                   <?php    ActiveForm::end();  ?>


                    </div>

                </div>

            </div>

        </div>

    </div>

</section>