<?php

namespace app\controllers;

use app\models\User;
use yii\rest\ActiveController;

class UserController extends ActiveController
{

    public $modelClass = User::class;
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
        'linksEnvelope' => null
    ];

    public function behaviors()
    {
        return [
            'corsFilter' => [
                'class' => \yii\filters\Cors::class,
                'cors' => [
                    'Origin' => ['*'],
                    'Access-Control-Request-Method' => ['GET', 'OPTIONS'],
                    'Access-Control-Request-Headers' => ['*'],
                    'Access-Control-Allow-Credentials' => null,
                    'Access-Control-Max-Age' => 86400,
                    'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page'],
                ],
            ],
        ];
    }

    public function actions()
    {
        $actions = parent::actions();

        unset(
            $actions['create'],
            $actions['update'],
            $actions['delete'],
        );

        return $actions;
    }
}
