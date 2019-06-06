<?php

namespace app\models;

// Таблица с денежными призами включает в себя id приза, денежную сумму, количество таких разыгрываемых сумм и коэф. для перевода в баллы

class Money extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return "money";
    }

    public static function findById($ID)
    {
        return parent::find()->andWhere([
            'id' => $ID
        ])->one();
    }
}
