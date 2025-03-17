<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="d-flex flex-column overflow-x-hidden h-100">
    <?php $this->beginBody() ?>

    <header id="header" class="bg-blue-2">
        <?php
        NavBar::begin([
            'brandLabel' => Yii::$app->name,
            'brandUrl' => Yii::$app->homeUrl,
            'brandOptions' => [
                'style' => '--bs-navbar-brand-color: var(--bs-light);--bs-navbar-brand-hover-color: var(--bs-light);',
                'class' => 'fs-28px'
            ],
            'innerContainerOptions' => ['class' => 'container-xxl'],
            'options' => ['class' => 'navbar-expand-md py-2']
        ]);
        ?>
        <div class="container-xxl d-flex flex-column flex-md-row justify-content-between flex-wrap flex-md-nowrap">
            <div class="d-flex justify-content-center justify-content-md-end flex-grow-1">
                <?= Nav::widget([
                    'options' => ['class' => 'navbar-nav'],
                    'items' => [
                        !Yii::$app->user->isGuest
                            ? '<li class="nav-item">'
                            . Html::beginForm(['user/logout'])
                            . Html::submitButton(
                                'Logout (' . Yii::$app->user->identity->username . ')',
                                ['class' => 'btn btn-outline-gray-1']
                            )
                            . Html::endForm()
                            . '</li>'
                            : ''
                    ],
                ]); ?>
            </div>
        </div>

        <?php NavBar::end(); ?>

    </header>

    <main id="main" class="flex-shrink-0 flex-grow-1 bg-blue-1" role="main">
        <div class="container-xxl pt-2">
            <?php if (!empty($this->params['breadcrumbs'])) : ?>
                <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
            <?php endif ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <footer id="footer" class="py-17px bg-blue-2 text-light">
        <div class="container-xxl ">
            <div class="row justify-content-between">
                <div class="col-3 d-flex">
                    <div id="activeTasks"></div>
                    <div id="finishedTasks" class="ms-36px"></div>
                </div>
                <div class="col text-end">Kanban board by AlexT, &#169; <?= date("Y") ?></div>
            </div>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>