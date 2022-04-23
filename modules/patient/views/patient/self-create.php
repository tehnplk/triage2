<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Patient */

$this->title = 'Create Patient';
//$this->params['breadcrumbs'][] = ['label' => 'Patients', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>

<div class="patient-create">
    <?=
    $this->render('_form-self', [
        'model' => $model,
    ])
    ?>

</div>

<?php
$js = <<<JS
        
        $('#sel-chw').val('65').trigger("change");
        console.log('js');
JS;
$this->registerJs($js);

