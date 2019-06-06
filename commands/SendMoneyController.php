<?php

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use app\models\Orders;

class SendMoneyController extends Controller
{
    public function actionIndex($size = 10)
    {
        $not_send = Orders::findWithLimit($size);

        if ($not_send) {
            foreach ($not_send as $value) {
                $this->sendToBank($value->description, $value->amt);
            }
        }
    }

    protected function sendToBank($description, $amt) {
        throw new \Exception("Bad connection with bank");
    }
}
