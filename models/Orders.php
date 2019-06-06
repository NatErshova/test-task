<?php

namespace app\models;

class Orders extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return "orders";
    }

    public static function findWithLimit($limit)
    {
        return parent::find()
           ->andWhere([
            'type_prize' => 'money',
            'send_status' => 0,
           ])
           ->limit($limit)
           ->all();
    }
}
