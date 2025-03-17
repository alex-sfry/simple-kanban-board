<?php

namespace app\controllers;

use app\models\ar\Project;
use yii\web\Controller;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Response;

class ProjectController extends Controller
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
                    'index' => ['get'],
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
     * Displays Select or Create project page
     *
     * @return string
     */
    public function actionIndex()
    {
        $query = Project::find()->where(['user_id' => Yii::$app->user->id]);

        return $this->render('index', [
            'models' => $query->orderBy('updated_at')->all()
        ]);
    }

    /**
     * Creates new project
     *
     * @return Response|string
     */
    public function actionCreate()
    {
        $model = new Project();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['kanban/project', 'projectId' => $model->id]);
        }

        return $this->render('create', ['model' => $model, 'userId' => Yii::$app->user->id]);
    }
}
