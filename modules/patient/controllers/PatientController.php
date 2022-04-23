<?php

namespace app\modules\patient\controllers;

use app\models\Patient;
use app\models\PatientSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\components\MyRole;

/**
 * PatientController implements the CRUD actions for Patient model.
 */
class PatientController extends Controller {

    /**
     * @inheritDoc
     */
    public function behaviors() {
        return array_merge(
                parent::behaviors(),
                [
                    'access' => [
                        'class' => \yii\filters\AccessControl::className(),
                        'only' => ['index', 'view', 'create', 'update', 'delete', 'gen-cid'],
                        'rules' => [
                            [
                                'actions' => ['index', 'view', 'create', 'update', 'gen-cid'],
                                'allow' => \app\components\MyRole::can_reg(),
                                'roles' => ['@'],
                            ],
                            [
                                'actions' => ['delete'],
                                'allow' => \app\components\MyRole::can_reg(),
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
     * Lists all Patient models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new PatientSearch();
        if (MyRole::is_reg()) {
            $searchModel->hoscode = \Yii::$app->user->identity->hoscode;
        }
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Patient model.
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
     * Creates a new Patient model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionSelfIndex() {
        return $this->renderPartial('self-index');
    }

    public function actionSelfCreate() {
        $this->layout = 'self';
        $model = new Patient();
        //$model->addr_chw = '65';
        //$model->hoscode = MyRole::getUserHosCode();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                //visit
                $visit = new \app\models\Visit();
                $visit->hoscode = $model->hoscode;
                $visit->patient_id = $model->id;
                $visit->patient_cid = $model->cid;
                $visit->patient_fullname = $model->prefix . "" . $model->first_name . " " . $model->last_name;
                $visit->visit_date = date('Y-m-d');
                $visit->visit_time = date('H:i:s');
                $visit->spo2 = 98;
                $visit->bw = $this->request->post('bw');
                $visit->bh = $this->request->post('bh');
                $visit->cc = $this->request->post('cc');
                $visit->age_y = $model->age_y;
                $visit->age_m = $model->age_m;
                $visit->save();

                //lab
                $lab = \app\models\Lab::find()->where(['visit_id' => $visit->id])->one();
                $lab->lab_place = "-";
                $lab->lab_result = "ATK-Positive";
                $lab->save(false);

                //triage
                $triage = new \app\models\Triage();
                $triage->hoscode = $model->hoscode;
                $hos = \app\models\Hos::findOne($model->hoscode);
                if ($hos) {
                    $triage->hosname = $hos->name;
                }
                $triage->patient_id = $model->id;
                $triage->patient_cid = $model->cid;
                $triage->patient_fullname = $visit->patient_fullname;
                $triage->patient_gender = $model->gender;
                $triage->patient_age = $model->age_y;
                $chw = \app\models\Changwat::findOne($model->addr_chw);
                $triage->patient_chw = $chw->name;
                $amp = \app\models\Amphur::find()->where(['codefull' => $model->addr_amp])->one();
                $triage->patient_amp = $amp->name;
                $triage->visit_id = $visit->id;
                $triage->triage_date = $visit->visit_date;
                $triage->triage_time = $visit->visit_time;
                $triage->spo2 = $visit->spo2;
                $triage->lab_result = $lab->lab_result;

                $risk = $this->request->post('risk');
                //$triage->risk = empty($risk) ? 'ไม่มี' : 'มี';
                $triage->color = empty($risk) ? 'เขียว' : 'เหลือง';
                $triage->save(false);

                \Yii::$app->session->setFlash('warning', "ทำรายการสำเร็จ!!!");
                return $this->redirect(['self-update', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('self-create', [
                    'model' => $model,
        ]);
    }

    public function actionCreate() {
        $model = new Patient();
        //$model->addr_chw = '65';
        $model->hoscode = MyRole::getUserHosCode();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                \Yii::$app->session->setFlash('warning', "ทำรายการสำเร็จ!!!");
                return $this->redirect(['update', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Patient model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $visit = \app\models\Visit::find()->where(['patient_id' => $model->id])->one();
        $triage = \app\models\Triage::find()->where(['patient_id' => $model->id])->one();


        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {

            if ($visit) {
                $visit->hoscode = $model->hoscode;
                $visit->patient_cid = $model->cid;
                $visit->patient_fullname = "$model->prefix$model->first_name $model->last_name";
                $visit->age_y = $model->age_y;
                $visit->age_m = $model->age_m;
                $visit->save(false);
            }

            if ($triage) {
                $triage->hoscode = $model->hoscode;
                $hos = \app\models\Hos::findOne($triage->hoscode);
                if ($hos) {
                    $triage->hosname = $hos->name;
                }
                $triage->patient_cid = $model->cid;
                $triage->patient_fullname = "$model->prefix$model->first_name $model->last_name";
                $triage->patient_age = $model->age_y;
                $triage->save(false);
            }


            \Yii::$app->session->setFlash('warning', "ทำรายการสำเร็จ!!!");
            return $this->redirect(['update', 'id' => $model->id]);
        }

        return $this->render('tab_update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Patient model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        $model->delete();
        \app\models\Triage::deleteAll(['patient_id' => $model->id]);

        return $this->redirect(['index']);
    }

    /**
     * Finds the Patient model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Patient the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Patient::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public static function gen_cid() {
        $tt = time();
        $ran = '60' . $tt;
        $arr = str_split($ran);
        $n = 13;
        $t = 0;
        foreach ($arr as $c) {
            $s = $c * $n;
            $n--;
            $t += $s;
        }

        $mod = 11 - $t % 11;


        $cid = $ran . $mod;
        return $cid;
    }

    public function actionGenCid() {
        $cid = $this->gen_cid();
        return $this->renderPartial('gen-cid', [
                    'cid' => $cid
        ]);
    }

}
