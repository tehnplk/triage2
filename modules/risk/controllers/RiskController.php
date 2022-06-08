<?php

namespace app\modules\risk\controllers;

use app\models\Risk;
use app\models\RiskSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Triage;

/**
 * RiskController implements the CRUD actions for Risk model.
 */
class RiskController extends Controller {

    /**
     * @inheritDoc
     */
    public function behaviors() {
        return array_merge(
                parent::behaviors(),
                [
                    'verbs' => [
                        'class' => VerbFilter::className(),
                        'actions' => [
                            'delete' => ['POST'],
                        ],
                    ],
                ]
        );
    }

    /**
     * Lists all Risk models.
     * @return mixed
     */
    public function actionIndex($patient_id = NULL) {
        $searchModel = new RiskSearch();
        $searchModel->patient_id = $patient_id;
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('tab_index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Risk model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Risk model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($patient_id = NULL) {
        $this->layout = 'off';
        $patient = \app\models\Patient::findOne($patient_id);
        $model = new Risk();
        $model->patient_id = $patient->id;

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {

                $triage = Triage::find()->where(['visit_id' => $model->visit_id])->one();
                if ($model->bed == '1' || $model->stroke == '1' || $model->suppress == '1' || $model->aging == '1' || $model->bmi == 1 || $model->cancer == 1 || $model->cancer == 1 || $model->cirrhosis == 1 || $model->copd == 1 || $model->dm == 1 || $model->hiv == 1 || $model->ihd == 1 || $model->preg == 1 || $model->kidney == 1 || $model->vacless == 1) {
                    $triage->risk = 'มี';
                } else {
                    $triage->risk = 'ไม่มี';
                }

                $triage->save(false);

                return $this->redirect(['success']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Risk model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $this->layout = 'off';
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {

            $triage = Triage::find()->where(['visit_id' => $model->visit_id])->one();
            if ($model->stroke == 1 || $model->suppress == 1 || $model->aging == 1 || $model->bmi == 1 || $model->cancer == 1 || $model->cancer == 1 || $model->cirrhosis == 1 || $model->copd == 1 || $model->dm == 1 || $model->hiv == 1 || $model->ihd == 1 || $model->preg == 1 || $model->kidney == 1 || $model->vacless == 1) {
                $triage->risk = 'มี';
            } else {
                $triage->risk = 'ไม่มี';
            }

            $triage->save(false);

            return $this->redirect(['success']);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Risk model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        $model->delete();
        return $this->redirect(['index', 'patient_id' => $model->patient_id]);
    }

    /**
     * Finds the Risk model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Risk the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Risk::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionSuccess() {
        $this->layout = 'off';
        return $this->render('_success');
    }

}
