<?php

namespace backend\controllers;

use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class MyController extends \yii\web\Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error', 'signup'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'controllers' => ['site'],
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['Admin', 'Drektor', 'User'],
                    ],
                    [
                        'controllers' => ['users', 'applications'],
                        'actions' => ['index', 'create', 'update', 'delete', 'view', 'send'],
                        'allow' => true,
                        'roles' => ['Admin'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

}
