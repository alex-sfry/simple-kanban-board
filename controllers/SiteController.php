<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\forms\ContactForm;
use app\models\forms\ResendVerificationEmailForm;
use app\models\User;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return Response|string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['user/login'], 302);
        }

        $user = User::findOne(Yii::$app->user->getId());

        switch ($user->status) {
            case User::STATUS_DELETED:
                Yii::$app->user->logout();
                Yii::$app->session->setFlash('User account is deleted. Create new account');
                return $this->redirect(['user/signup'], 302);
            case User::STATUS_INACTIVE:
                return $this->render('user_inactive', ['user' => $user, 'model' => new ResendVerificationEmailForm()]);
            default:
                return $this->redirect(['project/index'], 302);
        }
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
