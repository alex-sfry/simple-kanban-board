$('#form-signup').on('afterValidateAttribute', function (e, attribute, messages, deferreds) {
    attribute.name === 'password_repeat' && $('#signupform-password').trigger('blur');
    return true;
});

function initBoard() {
    const activeTasksQty =
        $("[data-status='todo'] .task").length
        + $("[data-status='ready'] .task").length
        + $("[data-status='in_progress'] .task").length
    const finishedTasksQty = $("[data-status='done'] .task").length;
    $('#activeTasks').text(`Active tasks: ${activeTasksQty}`);
    $('#finishedTasks').text(`Finished tasks: ${finishedTasksQty}`);

    $('.task-menu').on('click', '.btn-del-task', function () {
        const taskId = $(this).closest('.task').data('id');
        $.post('/task/delete/', { taskId: taskId }, function (response) {
            $('#kanban-board').html(response);
            initBoard();
        });
    });

    $('.task-menu').on('click', '.btn-move', function () {
        const taskId = $(this).closest('.task').data('id');
        const newStatus = $(this).data('dest');
        $.post('/task/update-status/', { taskId: taskId, status: newStatus }, function (response) {
            $('#kanban-board').html(response);
            initBoard();
        });
    });

    $('.task').on('dragstart', function (event) {
        event.originalEvent.dataTransfer.setData('task-id', $(this).data('id'));
    });

    $('.kanban-column').on('dragover', function (event) {
        event.preventDefault();
    });

    $('.kanban-column').on('drop', function (event) {
        event.preventDefault();
        const taskId = event.originalEvent.dataTransfer.getData('task-id');
        const newStatus = $(this).data('status');

        $.post('/task/update-status/', { taskId: taskId, status: newStatus }, function (response) {
            $('#kanban-board').html(response);
            initBoard();
        });
    }); 
}

if ($('.kanban-board').length) {
    initBoard();
}
