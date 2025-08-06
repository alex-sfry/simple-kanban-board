<?php

namespace app\controllers;

use app\models\forms\LoginForm;
use app\models\forms\PasswordResetRequestForm;
use app\models\forms\ResendVerificationEmailForm;
use app\models\forms\ResetPasswordForm;
use app\models\forms\SignupForm;
use app\models\forms\VerifyEmailForm;
use InvalidArgumentException;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

class UserController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Login action.
     * @return \yii\web\Response|string
     */
    public function actionLogin(): \yii\web\Response|string
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', ['model' => $model]);
    }

    /**
     * Logout action.
     * @return \yii\web\Response
     */
    public function actionLogout(): \yii\web\Response|string
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    /**
     * Signs user up.
     * @return \yii\web\Response|string
     */
    public function actionSignup(): \yii\web\Response|string
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app
                ->session
                ->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', ['model' => $model]);
    }

    /**
     * Requests password reset.
     * @return \yii\web\Response|string
     */
    public function actionRequestPasswordReset(): \yii\web\Response|string
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            }

            Yii::$app
                ->session
                ->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
        }

        return $this->render('requestPasswordResetToken', ['model' => $model]);
    }

    /**
     * Resets password.
     * @param string $token
     * @return \yii\web\Response|string
     * @throws BadRequestHttpException
     */
    public function actionResetPassword(string $token): \yii\web\Response|string
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if (
            $model->load(Yii::$app->request->post())
            && $model->validate()
            && $model->resetPassword()
        ) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', ['model' => $model]);
    }

    /**
     * Verify email address
     * @param string $token
     * @return \yii\web\Response
     * @throws BadRequestHttpException
     */
    public function actionVerifyEmail(string $token): \yii\web\Response
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if (($user = $model->verifyEmail()) && Yii::$app->user->login($user)) {
            Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
            return $this->goHome();
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     * @return \yii\web\Response|string
     */
    public function actionResendVerificationEmail(): \yii\web\Response|string
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app
                    ->session
                    ->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app
                ->session
                ->setFlash(
                    'error',
                    'Sorry, we are unable to resend verification email for the provided email address.'
                );
        }

        return $this->render('resendVerificationEmail', ['model' => $model]);
    }
}
