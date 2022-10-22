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
                    'url' => Url::to(['/']),
                    'active' => in_array(Yii::$app->controller->getRoute(), [
                        'admin/index',
                        'admin/view',
                        'admin/update',
                        'admin/create',
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
                            'url'=>Url::to(['/']),
                            'active' => in_array(Yii::$app->controller->getRoute(), [
                                '#',
                                '#',
                                '#',
                                '#',
                            ]),
                        ],
                        [
                            'label'=>'<span>Menyu</span>',
                            'icon'=>'home',
                            'url'=>Url::to(['/']),
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