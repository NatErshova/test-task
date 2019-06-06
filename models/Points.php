<?php

namespace app\models;

// Таблица с баллами содержит id приза и сумму разыгрываемых баллов

class Points extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return "points";
    }

    public static function findById($ID)
    {
        return parent::find()->andWhere([
            'id' => $ID
        ])->one();
    }
}
