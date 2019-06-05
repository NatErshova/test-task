<?php

namespace app\models;

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
