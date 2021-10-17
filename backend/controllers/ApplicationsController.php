<?php

namespace backend\controllers;

use common\models\Applications;
use common\models\User;
use common\models\search\ApplicationsSearch;
use Yii;
use yii\web\NotFoundHttpException;
use yii2tech\spreadsheet\Spreadsheet;
use yii\data\ActiveDataProvider;

/**
 * ApplicationsController implements the CRUD actions for Applications model.
 */
class ApplicationsController extends MyController
{
    const DELETED = 0;
    public function beforeAction($action)
    {
        if ($action->id == 'update') {
            $this->enableCsrfValidation = false;
        }

        return parent::beforeAction($action);
    }
    /**
     * Lists all Applications models.
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

    public function actionSend()
    {
        $exporter = (new Spreadsheet([
            'title' => 'Monitors',
            'dataProvider' => new ActiveDataProvider([
                'query' => Applications::find(),
            ]),
            'columns' => [
                ['attribute' => 'user_name'],
                ['attribute' => 'applications_name'],
                ['attribute' => 'product_name'],
                ['attribute' => 'tell_number'],
                ['attribute' => 'price'],
            ],
        ]))->render();
        return $exporter->send('items.xls');
    }

    /**
     * Displays a single Applications model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Applications model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Applications();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Applications model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($this->request->isPost && $model->load($this->request->post())) {
            Yii::$app->logs->log($this->request->post('Applications'), $this->findModel($id));
            if ($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Applications model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        Yii::$app->logs->log(User::STATUS_DELETED, $this->findModel($id));
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Applications model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Applications the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Applications::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
