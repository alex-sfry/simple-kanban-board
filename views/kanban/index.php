<?php

/** @var yii\web\View $this */
/** @var app\models\ar\Project $currentProject */
/** @var app\models\ar\Task[] $tasks */

$this->title = $currentProject->name;
?>
<div class="row justify-content-center pt-1 px-2">
    <div class="col-sm-6 col-md-5 col-lg-4 col-xl-4 bg-light pt-2 mb-3 rounded-1">
        <h1 class="text-center fs-3"><?= e($this->title) ?></h1>
    </div>
</div>

<div id="kanban-board" class="kanban-board row justify-content-between h-100">
    <?= $this->render('_columns', ['tasks' => $tasks, 'currentProject' => $currentProject]) ?>
</div>
