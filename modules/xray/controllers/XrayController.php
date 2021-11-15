<?php

namespace app\modules\xray\controllers;

use app\models\Xray;
use app\models\XraySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Triage;

/**
 * XrayController implements the CRUD actions for Xray model.
 */
class XrayController extends Controller {

    /**
     * @inheritDoc
     */
    public function behaviors() {
        return array_merge(
                parent::behaviors(),
                [
                    'access' => [
                        'class' => \yii\filters\AccessControl::className(),
                        'only' => ['index', 'view', 'create', 'update', 'delete'],
                        'rules' => [
                            [
                                'actions' => ['index', 'view', 'create', 'update'],
                                'allow' => \app\components\MyRole::can_med() || \app\components\MyRole::isOneStop(),
                                'roles' => ['@'],
                            ],
                            [
                                'actions' => ['delete'],
                                'allow' => \app\components\MyRole::can_med() || \app\components\MyRole::isOneStop(),
                                'roles' => ['@'],
                            ],
                        ],
                    ],
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
     * Lists all Xray models.
     * @return mixed
     */
    public function actionIndex($patient_id = NULL) {
        $searchModel = new XraySearch();
        $searchModel->patient_id = $patient_id;
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('tab_index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Xray model.
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
     * Creates a new Xray model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($patient_id = NULL) {
        $this->layout = 'off';
        $patient = \app\models\Patient::findOne($patient_id);
        $max_visit = \app\models\Visit::find()->where(['patient_id' => $patient_id])->max('id');
        $model = new Xray();
        $model->visit_id = $max_visit;
        $model->patient_id = $patient_id;
        $model->xray_date = date('Y-m-d');
        $model->xray_time = date('H:i:s');


        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {

                $triage = Triage::find()->where(['visit_id' => $model->visit_id])->one();
                $triage->xray = $model->covid19_pneumonia_cat;
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
     * Updates an existing Xray model.
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
            $triage->xray = $model->covid19_pneumonia_cat;
            $triage->save(false);
            return $this->redirect(['success']);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Xray model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);

        $triage = Triage::find()->where(['visit_id' => $model->visit_id])->one();
        $triage->xray = '';
        $triage->save(false);

        $model->delete();

        return $this->redirect(['index', 'patient_id' => $model->patient_id]);
    }

    /**
     * Finds the Xray model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Xray the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Xray::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionSuccess() {
        $this->layout = 'off';
        return $this->render('_success');
    }

}
