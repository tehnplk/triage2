<?php

namespace app\modules\visit\controllers;

use app\models\Visit;
use app\models\VisitSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Risk;
use app\models\Lab;
use app\models\Triage;

/**
 * VisitController implements the CRUD actions for Visit model.
 */
class VisitController extends Controller {

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
     * Lists all Visit models.
     * @return mixed
     */
    public function actionIndex($patient_id = NULL) {
        $searchModel = new VisitSearch();
        $searchModel->patient_id = $patient_id;
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('tab_index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Visit model.
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
     * Creates a new Visit model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($patient_id = NULL) {
        $this->layout = 'off';
        $patient = \app\models\Patient::findOne($patient_id);

        $model = new Visit();
        $model->patient_id = $patient_id;
        $model->hoscode = $patient->hoscode;
        $model->patient_cid = $patient->cid;
        $model->patient_fullname = $patient->full_name;
        $model->visit_date = date('Y-m-d');

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {


                $triage = new Triage();
                $triage->patient_id = $model->patient_id;
                $triage->patient_cid = $model->patient_cid;
                $triage->patient_fullname = $model->patient_fullname;
                $triage->patient_age = $model->age_y;
                $triage->visit_id = $model->id;

                $triage->triage_date = $model->visit_date;
                $triage->triage_time = $model->visit_time;
                $triage->spo2 = $model->spo2;
                $triage->family = $model->family;

                if ($model->age_y >= 60 || $model->bmi >= 30 || $model->bw >= 90) {
                    $triage->risk = 'มี';
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
     * Updates an existing Visit model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $this->layout = 'off';


        $model = $this->findModel($id);
        $patient = \app\models\Patient::findOne($model->patient_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {

            $triage = Triage::find()->where(['visit_id' => $model->id])->one();
            $triage->triage_date = $model->visit_date;
            $triage->triage_time = $model->visit_time;
            $triage->patient_age = $model->age_y;
            if ($model->age_y >= 60 || $model->bmi >= 30 || $model->bw >= 90) {
                $triage->risk = 'มี';
            } else {
                $triage->risk = 'ไม่มี';
            }
            $triage->spo2 = $model->spo2;
            $triage->family = $model->family;
            $triage->save(false);

            return $this->redirect(['success']);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Visit model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        $risk = Risk::find()->where(['visit_id' => $id])->one();
        $lab = Lab::find()->where(['visit_id' => $id])->one();
        $triage = Triage::find()->where(['visit_id' => $id])->one();
        if ($risk) {
            $risk->delete();
        }
        if ($lab) {
            $lab->delete();
        }
        if ($triage) {
            $triage->delete();
        }
        $model->delete();
        \Yii::$app->session->setFlash('warning', "ทำรายการสำเร็จ!!!");
        return $this->redirect(['index', 'patient_id' => $model->patient_id]);
    }

    /**
     * Finds the Visit model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Visit the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Visit::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionSuccess() {
        $this->layout = 'off';
        return $this->render('_success');
    }

}
