<?php

namespace app\modules\triage\controllers;

use yii\web\Controller;

/**
 * Default controller for the `triage` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
