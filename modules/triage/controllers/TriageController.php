<?php

namespace app\modules\triage\controllers;

use app\models\Triage;
use app\models\TriageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TriageController implements the CRUD actions for Triage model.
 */
class TriageController extends Controller {

    /**
     * @inheritDoc
     */
    public function behaviors() {
        return array_merge(
                parent::behaviors(),
                [
                    'access' => [
                        'class' => \yii\filters\AccessControl::className(),
                        'only' => ['list', 'index', 'view', 'create', 'update', 'update-list', 'delete'],
                        'rules' => [
                            [
                                'actions' => ['list', 'index', 'view', 'update',],
                                'allow' => \app\components\MyRole::can_reg() || \app\components\MyRole::is_vww(),
                                'roles' => ['@'],
                            ],
                            [
                                'actions' => ['create', 'update-list'],
                                'allow' => \app\components\MyRole::can_tri() || \app\components\MyRole::isOneStop(),
                                'roles' => ['@'],
                            ],
                            [
                                'actions' => ['delete'],
                                'allow' => \app\components\MyRole::can_tri(),
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
     * Lists all Triage models.
     * @return mixed
     */
    public function actionList() {
        $searchModel = new TriageSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        //$params = \Yii::$app->request->queryParams;
        \Yii::$app->session->set('triage_search', $this->request->queryParams);

        return $this->render('list', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndex($patient_id = NULL) {
        $searchModel = new TriageSearch();
        $searchModel->patient_id = $patient_id;
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('tab_index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Triage model.
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
     * Creates a new Triage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Triage();

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
     * Updates an existing Triage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {

            if (empty($model->color)) {
                if ($model->risk == '??????') {
                    $model->color = '??????????????????';
                } else {
                    $model->color = '???????????????';
                }
            }
            $model->save();
            return $this->redirect(['index', 'patient_id' => $model->patient_id]);
        }

        return $this->renderAjax('update', [
                    'model' => $model,
        ]);
    }

    public function actionUpdateList($id) {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {

            if (empty($model->color)) {
                if ($model->risk == '??????') {
                    $model->color = '??????????????????';
                } else {
                    $model->color = '???????????????';
                }
            }
            $model->save();
            return $this->redirect(['list']);
        }

        return $this->renderAjax('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Triage model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Triage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Triage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Triage::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
