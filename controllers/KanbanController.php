<?php

namespace app\controllers;

use app\models\ar\Project;
use yii\web\Controller;
use yii\web\Response;
use app\models\ar\Task;
use Yii;
use yii\filters\VerbFilter;

class KanbanController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'updateStatus' => ['post'],
                    'delete' => ['post'],
                    'create' => ['get', 'post'],
                ],
            ],
            'access' => [
                'class' => \yii\filters\AccessControl::class,
                'rules' => [
                    [
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Displays kanban board for selected project.
     *
     * @param int $project_id
     * @return Response|string
     */
    public function actionProject($projectId)
    {
        $userId = Yii::$app->user->id;
        $tasks = Task::find()->where(['user_id' => $userId, 'project_id' => $projectId])->all();
        $currentProject = Project::findOne((int)$projectId);

        if (!$currentProject) {
            Yii::$app->session->setFlash('error', "Project with id $projectId not found in db.");
            return $this->goHome();
        }

        return $this->render('index', ['tasks' => $tasks, 'currentProject' => $currentProject]);
    }

    /**
     * Creates task.
     *
     * @param int $project_id
     * @return Response|string
     */
    public function actionCreate($projectId)
    {
        $model = new Task();
        $model->user_id = Yii::$app->user->id;
        $model->project_id = (int)$projectId;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['kanban/project', 'projectId' => $projectId]);
        }

        return $this->render('create', ['model' => $model]);
    }

    /**
     * Deletes task.
     * 
     * @return string
     */
    public function actionDelete()
    {
        $taskId = Yii::$app->request->post('taskId');
        $task = Task::findOne((int)$taskId);
        $task->delete();
        $tasks = Task::findAll(['user_id' => $task->user_id, 'project_id' => $task->project_id]);
        return $this->renderAjax('_columns', ['tasks' => $tasks]);
    }

    /**
     * Updates task's status.
     *
     * @return string
     */
    public function actionUpdateStatus()
    {
        $post = Yii::$app->request->post();
        $task = Task::findOne((int)$post['taskId']);
        $task->status = $post['status'];
        $task->save();
        $tasks = Task::findAll(['user_id' => $task->user_id, 'project_id' => $task->project_id]);
        $currentProject = Project::findOne($task->project_id);
        Yii::$app->response->format = yii\web\Response::FORMAT_HTML;
        return $this->renderAjax(
            '_columns',
            ['tasks' => $tasks, 'currentProject' => $currentProject]
        );
    }
}
