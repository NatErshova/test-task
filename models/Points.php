<?php

namespace app\models;

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
