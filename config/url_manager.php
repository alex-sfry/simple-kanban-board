<?php

return[
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'enableStrictParsing' => true,
    'suffix' => '/',
    'rules' => [
        'project/create' => 'project/create',
        'projects' => 'project/index',
        'task/delete' => 'kanban/delete',
        'task/update-status/' => 'kanban/update-status',
        'project/<projectId:\d+>/create-task' => 'kanban/create',
        'project/<projectId:\d+>' => 'kanban/project',
        'user/resend-verification-email' => 'user/resend-verification-email',
        'user/verify-email' => 'user/verify-email',
        'user/reset-password' =>  'user/request-password-reset',
        'user/logout' => 'user/logout',
        'user/signup' => 'user/signup',
        'user/login' => 'user/login',
        '' => 'site/index'
    ],
];
