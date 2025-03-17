<?php

use yii\bootstrap5\Html;

/** @var yii\web\View $this */
/** @var app\models\ar\Project[] $models */
?>
<div class="input-group">
    <label for="projectFilter" class="input-group-text bg-light fw-bold rounded-bottom-0">
        Search:
    </label>
    <input type="text"
        name="projectFilter"
        id="projectFilter"
        class="form-control rounded-bottom-0">
</div>
<div style="max-height: 328px;"
    class="list-group list-group-flush bg-light overflow-y-auto rounded-0">
    <?php foreach ($models as $model) :  ?>
        <?= Html::a(
            e($model->name),
            ['kanban/project', 'projectId' => $model->id],
            ['class' => 'list-group-item list-group-item-action']
        )  ?>
    <?php endforeach;  ?>
</div>