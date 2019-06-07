<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Money;
use app\models\Points;
use app\models\Stuff;

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
                'only' => ['logout', 'prize', 'win'],
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
                        'actions' => ['win'],
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

    // Главная страница, где предлагаем поучаствовать в лотерее
    public function actionIndex()
    {
        return $this->render('index');
    }

    // Страница, на которой начинается розыгрыш приза
    public function actionPrize()
    {
        return $this->render('prize');
    }

    // Рандомно выбираем тип приза и отображаем результат
    public function actionWin()
    {
        $category = random_int(1, 3);
        switch ($category) {
            case 1:
                $prize = $this->moneyRandom();
                break;
            case 2:
                $prize = $this->pointsRandom();
                break;
            case 3:
                $prize = $this->stuffRandom();
                break;
        }

        return $this->render('win', ['category' => $category, 'prize' => $prize]);
    }

    // Рандомный выбор денежной суммы из имеющихся в наличии
    protected function moneyRandom()
    {
        $moneyCount = Money::find()->count();
        $id = random_int(1, $moneyCount);
        $money = Money::findOne($id);
        if ($money->amt > 0) {
            // уменьшаем количество доступных денежных сумм такой стоимости и сохраняем обновленное количество
            $money->amt = $money->amt - 1;
            $money->save();
        } else {
            // если попалась сумма, которую уже больше не разыгрываем, то ищем новую сумму заново
            $money = $this->moneyRandom();
        }
        return $money;
    }

    // Рандомный выбор баллов лояльности
    protected function pointsRandom()
    {
        $pointsCount = Points::find()->count();
        $id = random_int(1, $pointsCount);
        $points = Points::findOne($id);
        return $points;
    }

    // Рандомный выбор разыгрываемого предмета из имеющихся в наличии
    protected function stuffRandom()
    {
        $stuffCount = Stuff::find()->count();
        $id = random_int(1, $stuffCount);
        $stuff = Stuff::findOne($id);
        if ($stuff->amt > 0) {
            // уменьшаем количество доступных вещей данного типа и сохраняем обновленное количество
            $stuff->amt = $stuff->amt - 1;
            $stuff->save();
        } else {
            // если попался предмет, которого больше нет в наличии, то ищем новый
            $stuff = $this->stuffRandom();
        }
        return $stuff;
    }

    public function actionConvert($val)
    {
        $sum = $val * Yii::$app->params['coefConvert'];
        $category = 2;
        return $this->render('win', ['category' => $category, 'sum' => $sum]);
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
