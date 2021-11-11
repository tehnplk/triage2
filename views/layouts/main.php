<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="d-flex flex-column h-100">
        <?php $this->beginBody() ?>

        <header>
            <?php
            NavBar::begin([
                'brandLabel' => '<i class="far fa-laptop-medical"></i>  ' . Yii::$app->name,
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar navbar-expand-md navbar-dark bg-secondary fixed-top',
                ],
                'innerContainerOptions' => ['class' => 'container-fluid'],
            ]);
            ?>
            <?php if (!empty($this->params['pt_fullname'])): ?>
                <div class="nav-item bg-primary border border-light ml-5 px-2 text-light d-flex justify-content-center">
                    <span style="font-size: 16px" class="py-1"><?= $this->params['pt_fullname'] ?></span>
                    <span class="mx-2"></span>
                    <span style="font-size: 16px" class="py-1"><?= Html::a('<i class="far fa-times"></i>', ['/patient/patient/index'], ['class' => 'text-dark']) ?></span>
                </div>
            <?php endif; ?>
            <?php
            $mnu_items = [
                ['label' => '<i class="far fa-address-card"></i> รายชื่อ', 'url' => ['/patient/patient/index']],
                ['label' => '<span style="color:lime"><i class="far fa-circle"></i></span> แยกสี', 'url' => ['/patient/patient/index']],
            ];

            if (!\Yii::$app->user->isGuest) {
                $mnu_items[] = ['label' => '<i class="fas fa-sign-out-alt"></i> USER(' . \Yii::$app->user->identity->username . ')', 'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']];
            } else {
                $mnu_items[] = ['label' => '<i class="far fa-user"></i> เข้าระบบ', 'url' => ['/site/login']];
            }

            echo Nav::widget([
                'options' => [
                    'class' => 'navbar-nav ml-auto',
                ],
                'encodeLabels' => false,
                'items' => $mnu_items
            ]);
            NavBar::end();
            ?>
        </header>

        <main role="main" class="flex-shrink-0">
            <div class="head-area" style="margin-top: 62px"></div>
            <div class="container-fluid">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </main>

        <footer class="footer mt-auto py-1 text-muted" style="height: 28px;font-size: 13px">
            <div class="container-fluid" >
                <p class="float-left">&copy; TEHNPLK <?= date('Y') ?></p>
                <p class="float-right">tehnnn@gmail.com</p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
