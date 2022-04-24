<?php

use yii\helpers\Html;
?>
<div style="text-align: center">
    <h3>ผู้ป่วยโควิดขอรับการรักษา</h3>
    <?=
    Html::img("@web/icon/ems.png", [
        'width' => '250px',
        'height' => '200px'
    ])
    ?>
    <br>
    <br>
    <?= Html::a('คลิกเพื่อลงทะเบียน', ['self-create'], ['class' => 'btn btn-lg btn-success']) ?>
</div>