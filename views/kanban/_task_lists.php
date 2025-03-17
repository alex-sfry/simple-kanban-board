<?php

/** @var yii\web\View $this */
/** @var app\models\ar\Task[] $tasks */
/** @var array $status */
/** @var array $statuses */
?>
<?php foreach ($tasks as $task) : ?>
    <?php if ($task->status === $status) : ?>
        <div data-id="<?= $task->id ?>"
            class='task d-flex justify-content-between bg-light rounded-1 border shadow-sm p-2 mb-2'
            draggable='true'>
            <span class="text-wrap text-break overflow-x-hidden pe-3">asdsadsadsadsadsadsadsadsadas<?= e($task->title) ?></span>
            <div class="align-self-center">
                <span class="dropdown">
                    <button class="btn btn-sm btn-outline-secondary lh-1"
                        type="button"
                        data-bs-toggle="dropdown"
                        data-bs-auto-close="outside"
                        aria-expanded="false">
                        ...
                    </button>
                    <ul class="task-menu position-fixed dropdown-menu">
                        <li class="dropup">
                            <button class="dropdown-item"
                                type="button"
                                data-bs-toggle="dropdown"
                                data-bs-auto-close="outside"
                                aria-expanded="false">
                                Move to...
                            </button>
                            <ul class="nested-right-dd dropdown-menu">
                                <?php foreach ($statuses as $key => $value): ?>
                                    <li>
                                        <button class="btn-move dropdown-item"
                                            type="button"
                                            <?= $key === $status ? 'disabled' : '' ?>
                                            data-dest="<?= $key ?>"><?= $value ?></button>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </li>
                        <li>
                            <button class="btn-del-task dropdown-item" type="button">
                                Delete
                            </button>
                        </li>
                    </ul>
                </span>
            </div>
        </div>
    <?php endif; ?>
<?php endforeach; ?>