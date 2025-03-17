<?php

use yii\bootstrap5\Html;

/** @var yii\web\View $this */
/** @var app\models\ar\Project $currentProject */
/** @var app\models\ar\Task[] $tasks */

$statuses = [
    'todo' => 'To Do',
    'ready' => 'Ready',
    'in_progress' => 'In Progress',
    'done' => 'Done'
];
?>
<?php foreach ($statuses as $key => $label) : ?>
    <div class="kanban-column col-lg-3 gx-3 mb-3 mb-lg-0 h-100"
        data-status="<?= $key ?>">
        <div class="p-2 bg-light rounded-1">
            <h2 class="border-bottom border-secondary border-2 fs-5"><?= $label ?></h2>
            <div style="max-height: 640px;" class="overflow-y-auto">
                <?= $this->render(
                    '_task_lists',
                    ['tasks' => $tasks, 'status' => $key, 'statuses' => $statuses]
                ) ?>
            </div>
        </div>
        <?php if ($key === 'todo'): ?>
            <?= Html::a(
                'Create Task',
                ['kanban/create', 'projectId' => $currentProject->id],
                ['class' => 'btn btn-success mb-3 mt-lg-3']
            ) ?>
        <?php endif ?>
    </div>
<?php endforeach; ?>