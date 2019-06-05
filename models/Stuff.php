<?php

namespace app\models;

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
