<?php

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use app\models\Banks;

// Действие по отправке денежных призов, количество отправляемых призов ограничвается с помощью $limit

class SendMoneyController extends Controller
{
    public function actionIndex($limit = 10)
    {
        $not_send = Banks::find()
            ->andWhere([
            'send_status' => 0,
            ])
            ->limit($limit)
            ->all();

        if ($not_send) {
            foreach ($not_send as $value) {
                $this->sendMoney($value->route_bank, $value->user_name, $value->user_number, $value->sum);
            }
        }
    }

    // Отправка денежных призов
    protected function sendMoney($route, $name, $number, $sum)
    {
        $data = [
            'name' => $name,
            'number' => $number,
            'sum' => $sum,
        ];
        $url = $this->createUrl($route, $data);
        $responce = $this->connect($url);
        if (!empty($response['error']) {
            throw new \Exception("Bad connection with bank");
        }

    }

    // строим маршрут для отправки денег на счет клиента нужного нам банка
    protected function createUrl($route, $data)
    {
        return 'http://' . $route . '?' . http_build_query($data);
    }

    // выполняем подключение по указанному url
    protected function connect($url)
    {
        // подключаемся к банку, в ответ получаем статус операции, возвращаем статус операции (массив с ошибками, в случае неудачи)
    }
}
