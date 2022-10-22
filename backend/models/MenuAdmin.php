<?php


namespace backend\models;

use Yii;
use yii\base\Model;
use yii\helpers\Url;

class MenuAdmin extends Model{

    public static function getData()
    {
        return  Menu::widget([
            'options'=>[
                'class'=>'sidebar-menu',
                'data-widget'=>"tree",
            ],
            'encodeLabels' => false,
            'items'=>[
                [
                    'label' => 'Asosiy menyu',
                    'options' =>[
                        'class' => 'header',
                    ]
                ],
                [
                    'label' => 'Bosh sahifa',
                    'icon' => 'home',
                    'url' => Url::to(['/dashboard/index']),
                    'active' => in_array(Yii::$app->controller->getRoute(), [
                        'user/index',
                        'user/view',
                        'user/update',
                        'user/create',
                    ]),
                ],
                [
                    'label' => 'Shop Bot',
                    'icon' => 'telegram',
                    'url' => '#',
                    'items' => [
                        [
                            'label'=>'<span>Menyu</span>',
                            'icon'=>'home',
                            'url'=>Url::to(['/shopbot/menyu/index']),
                            'active' => in_array(Yii::$app->controller->getRoute(), [
                                '#',
                                '#',
                                '#',
                                '#',
                            ]),
                        ],
                    ],
                ],

            ],
        ]);
    }



}



?>