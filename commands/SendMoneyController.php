<?php

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use app\models\Orders;

// Действие по отправке денежных призов, количество отправляемых призов ограничвается с помощью $size

class SendMoneyController extends Controller
{
    public function actionIndex($size = 10)
    {
        $not_send = Orders::findWithLimit($size);

        if ($not_send) {
            foreach ($not_send as $value) {
                $this->sendToBank($value->description, $value->amt, $value->user_name);
            }
        }
    }

    // Прототип отправки денежных призов
    protected function sendToBank($description, $amt, $user_name) {
        throw new \Exception("Bad connection with bank");
    }
}
