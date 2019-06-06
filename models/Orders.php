<?php

namespace app\models;

// Таблица с выигрышами. Включает в себя имя пользователя, тип приза (денежный, баллы лояльности, вещи),
// описание (счет в банке для денежного приза, почту пользователя для баллов лояльности или адрес для отправки вещей),
// статус отправки (0 или 1) и количество (для денежных призов или баллов)

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
