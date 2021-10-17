<?php

namespace frontend\controllers;

use common\models\Applications;
use common\models\search\ApplicationsSearch;
use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ApplicationsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }



    public function actionApplications()
    {
        $model = new Applications();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect('index');
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('applications', [
            'model' => $model,
        ]);
    }
}
