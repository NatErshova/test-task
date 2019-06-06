<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\MoneyForm;
use app\models\PointsForm;
use app\models\StuffForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'prize', 'money', 'points', 'stuff'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['prize'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['money'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['points'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['stuff'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

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
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Displays prize-page.
     *
     * @return string
     */
    public function actionPrize()
    {
        return $this->render('prize');
    }

    public function actionMoney($id)
    {
        $model = new MoneyForm();
        return $this->render('money', [
            'model' => $model,
            'id' => $id,
        ]);
    }

    public function actionPoints($id)
    {
        $model = new PointsForm();
        return $this->render('points', [
            'model' => $model,
            'id' => $id,
        ]);
    }

    public function actionStuff($id)
    {
        $model = new StuffForm();
        return $this->render('stuff', [
            'model' => $model,
            'id' => $id,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
