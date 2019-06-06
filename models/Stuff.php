<?php

namespace app\models;

// Таблица с вещами содержит id приза, название разыгрываемого предмета, количество доступных предметов

class Stuff extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return "stuff";
    }

    public static function findById($ID)
    {
        return parent::find()->andWhere([
            'id' => $ID
        ])->one();
    }
}
