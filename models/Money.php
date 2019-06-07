<?php

namespace app\models;

// Таблица с денежными призами включает в себя id приза, денежную сумму, количество таких разыгрываемых сумм

class Money extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return "money";
    }
}
