<?php

namespace app\models;

// Таблица для денежны призов. Включает в себя название банка, информацию для запроса к банку, счет пользователя в банке, имя пользователя, сумму для отправки и статус перевода

class Orders extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return "banks";
    }
}
